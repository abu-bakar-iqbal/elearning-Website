<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';
include_once 'includes/mailer.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $code = rand(100000, 999999);
        // Store this code temporarily in verification_code column (or separate reset column)
        // For simplicity reusing verification_code but ideally should use a reset_token table
        $update = $conn->prepare("UPDATE users SET verification_code = ? WHERE email = ?");
        $update->bind_param("s", $code, $email);
        
        if ($update->execute()) {
            $subject = "Reset Your Password";
            $message_body = "You requested a password reset. <br>Your code is: <strong>" . $code . "</strong>";

            if (send_email($email, $subject, $message_body)) {
                $_SESSION['reset_email'] = $email;
                $_SESSION['success_message'] = "Reset code sent to your email.";
                echo "<script>window.location.href='reset_password.php';</script>";
                exit();
            } else {
                $error = "Failed to send email. Please try again.";
            }
        }
    } else {
        $error = "Email not found!";
    }
}
?>

<section class="section-padding mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card p-5">
                    <h2 class="text-white fw-bold text-center mb-4">Forgot Password</h2>
                    
                    <?php if($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Enter your registered email</label>
                            <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Send Reset Code</button>
                    </form>
                    <div class="text-center mt-3">
                         <a href="login.php" class="text-muted text-decoration-none small">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
