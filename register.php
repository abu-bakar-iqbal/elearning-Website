<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($pass !== $confirm_pass) {
        $error = "Passwords do not match!";
    } else {
        // Check if email exists
        $check = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            // Generate Code
            $code = rand(100000, 999999);
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Insert User
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $user, $email, $hashed_password, $code);

            if ($stmt->execute()) {
                // Send Email (Simulated for Localhost)
                $subject = "Verify Your Elearn Account";
                $message = "Your verification code is: " . $code;
                $headers = "From: no-reply@elearn.com";

                // Try sending mail (might fail on local without SMTP)
                @mail($email, $subject, $message, $headers);

                // Log code to file for testing purposes
                $log_entry = date('Y-m-d H:i:s') . " - Email: $email - Code: $code" . PHP_EOL;
                file_put_contents('email_log.txt', $log_entry, FILE_APPEND);

                $_SESSION['verify_email'] = $email;
                echo "<script>window.location.href='verify.php';</script>";
                exit();
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}
?>

<section class="section-padding mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card p-5">
                    <h2 class="text-white fw-bold text-center mb-4">Create Account</h2>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Full Name</label>
                            <input type="text" name="username" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Email Address</label>
                            <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Password</label>
                            <input type="password" name="password" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Sign Up</button>
                    </form>
                    <p class="text-center text-muted mt-4 small">Already have an account? <a href="login.php" class="text-gold">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
