<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $code = rand(100000, 999999);
        
        // Update user with reset code
        $update = $conn->prepare("UPDATE users SET verification_code = ? WHERE email = ?");
        $update->bind_param("ss", $code, $email);
        
        if ($update->execute()) {
             // Send Email (Simulated)
             $subject = "Reset Your Password - Elearn";
             $message = "Your password reset code is: " . $code;
             $headers = "From: no-reply@elearn.com";
             @mail($email, $subject, $message, $headers);
             
             // Log code
             $log_entry = date('Y-m-d H:i:s') . " - RESET PASS - Email: $email - Code: $code" . PHP_EOL;
             file_put_contents('email_log.txt', $log_entry, FILE_APPEND);

             $_SESSION['reset_email'] = $email;
             echo "<script>window.location.href='reset_password.php';</script>";
             exit();
        }
    } else {
        $error = "Email not found in our records.";
    }
}
?>

<section class="section-padding mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card p-5">
                    <h2 class="text-white fw-bold text-center mb-4">Forgot Password</h2>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Enter your registered email</label>
                            <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Send Code</button>
                    </form>
                    <p class="text-center text-muted mt-4 small"><a href="login.php" class="text-gold">Back to Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
