<?php
class SMTP {
    private $host;
    private $port;
    private $username;
    private $password;
    private $socket;
    private $timeout = 30;
    private $debug = true; // Enabled for debugging

    public function __construct($host, $port, $username, $password) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    private function log($message) {
        if ($this->debug) {
            file_put_contents('smtp_debug.log', date('Y-m-d H:i:s') . " - $message" . PHP_EOL, FILE_APPEND);
        }
    }

    private function getResponse() {
        $response = "";
        while ($str = fgets($this->socket, 515)) {
            $response .= $str;
            if (substr($str, 3, 1) == " ") {
                break;
            }
        }
        $this->log("SERVER: $response");
        return $response;
    }

    private function sendCommand($command) {
        $this->log("CLIENT: $command");
        fputs($this->socket, $command . "\r\n");
        return $this->getResponse();
    }

    public function send($to, $subject, $body, $fromEmail, $fromName) {
        // Connect with SSL Context Options to allow self-signed certs (Localhost fix)
        $ctx = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

        // Try connecting
        $this->socket = stream_socket_client("tcp://{$this->host}:{$this->port}", $errno, $errstr, $this->timeout, STREAM_CLIENT_CONNECT, $ctx);
        
        if (!$this->socket) {
            $this->log("Connection failed: $errno - $errstr");
            return false;
        }
        $this->getResponse(); // Initial greeting

        // Handshake
        $serverName = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost';
        $this->sendCommand("EHLO " . $serverName);
        
        // STARTTLS if port 587
        if ($this->port == 587) {
            $this->sendCommand("STARTTLS");
            // Enable crypto with the loose context
            stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            $this->sendCommand("EHLO " . $serverName);
        }

        // Auth
        $this->sendCommand("AUTH LOGIN");
        $this->sendCommand(base64_encode($this->username));
        $this->sendCommand(base64_encode($this->password));

        // Mail
        $this->sendCommand("MAIL FROM: <$this->username>");
        $this->sendCommand("RCPT TO: <$to>");

        // Data
        $this->sendCommand("DATA");
        
        // Headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Date: " . date('r') . "\r\n";
        $headers .= "Message-ID: <" . uniqid() . "@" . $serverName . ">\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $fromName <$fromEmail>\r\n";
        $headers .= "To: <$to>\r\n";
        $headers .= "Subject: $subject\r\n";
        
        $email_content = "$headers\r\n$body\r\n.";
        $response = $this->sendCommand($email_content);

        // Quit
        $this->sendCommand("QUIT");
        fclose($this->socket);

        return strpos($response, '250') !== false;
    }
}
?>
