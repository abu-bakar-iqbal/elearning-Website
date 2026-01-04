<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$email = isset($_SESSION['reset_email']) ? $_SESSION['reset_email'] : '';
if (!$email) {
    header("Location: forgot_password.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($pass !== $confirm_pass) {
        $error = "Passwords do not match!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND verification_code = ?");
        $stmt->bind_param("ss", $email, $code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            
            // Update password and clear code
            $update = $conn->prepare("UPDATE users SET password = ?, verification_code = NULL WHERE email = ?");
            $update->bind_param("ss", $hashed_password, $email);
            
            if ($update->execute()) {
                $_SESSION['success_message'] = "Password reset successful! Please login.";
                unset($_SESSION['reset_email']);
                echo "<script>window.location.href='login.php';</script>";
                exit();
            }
        } else {
            $error = "Invalid reset code!";
        }
    }
}
?>

<section class="section-padding mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card p-5">
                    <h2 class="text-white fw-bold text-center mb-4">Reset Password</h2>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="alert alert-info small">
                        Check <code>email_log.txt</code> for the reset code.
                    </div>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Reset Code</label>
                            <input type="text" name="code" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">New Password</label>
                            <input type="password" name="password" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
