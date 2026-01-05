<?php
include_once 'mail_config.php';
include_once 'SMTP.php';

function send_email($to, $subject, $message) {
    // Basic body layout
    $html_message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
            .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
            .header { border-bottom: 2px solid #ffd700; padding-bottom: 10px; margin-bottom: 20px; }
            .header h2 { color: #333; margin: 0; }
            .footer { margin-top: 30px; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 10px; }
            .btn { background-color: #ffd700; color: #000; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>elearn Verification</h2>
            </div>
            <p>Hello,</p>
            <p>$message</p>
            <div class='footer'>
                &copy; " . date('Y') . " elearn. All rights reserved.
            </div>
        </div>
    </body>
    </html>
    ";

    try {
        $smtp = new SMTP(SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS);
        $result = $smtp->send($to, $subject, $html_message, SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        
        if (!$result) {
            $log_entry = date('Y-m-d H:i:s') . " - SMTP FAILED TO: $to" . PHP_EOL;
            file_put_contents('email_error.log', $log_entry, FILE_APPEND);
            return false;
        }
        return true;
    } catch (Exception $e) {
        $log_entry = date('Y-m-d H:i:s') . " - SMTP EXCEPTION: " . $e->getMessage() . PHP_EOL;
        file_put_contents('email_error.log', $log_entry, FILE_APPEND);
        return false;
    }
}
?>
