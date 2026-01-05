<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/mail_config.php';
include 'includes/SMTP.php';

echo "<h2>SMTP Diagnostics</h2>";
echo "<p>Host: " . SMTP_HOST . "</p>";
echo "<p>Port: " . SMTP_PORT . "</p>";
echo "<p>User: " . SMTP_USER . "</p>";

echo "<h3>Attempting to send test email...</h3>";

try {
    $smtp = new SMTP(SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS);
    
    // Test Email
    $to = 'info@elearn.fit'; // Sending details to itself to test connection
    $subject = 'SMTP Test ' . date('Y-m-d H:i:s');
    $body = 'This is a test email to verify SMTP configuration.';
    
    echo "<pre>";
    if ($smtp->send($to, $subject, $body, SMTP_FROM_EMAIL, SMTP_FROM_NAME)) {
        echo "<h3 style='color:green'>SUCCESS: Email sent successfully!</h3>";
    } else {
        echo "<h3 style='color:red'>FAILURE: Email could not be sent.</h3>";
        echo "Check 'smtp_debug.log' or 'email_error.log' for details.<br>";
        
        if (file_exists('smtp_debug.log')) {
            echo "<h4>SMTP Debug Log:</h4>";
            echo nl2br(file_get_contents('smtp_debug.log'));
        }
    }
    echo "</pre>";

} catch (Exception $e) {
    echo "<h3 style='color:red'>EXCEPTION: " . $e->getMessage() . "</h3>";
}
?>
