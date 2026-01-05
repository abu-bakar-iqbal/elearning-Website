<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$email = isset($_SESSION['reset_email']) ? $_SESSION['reset_email'] : '';
$error = '';
$success = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
unset($_SESSION['success_message']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($new_pass !== $confirm_pass) {
        $error = "Passwords do not match!";
    } else {
        $stmt = $conn->prepare("SELECT verification_code FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['verification_code'] === $code) {
                // Update Password
                $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
                $update = $conn->prepare("UPDATE users SET password = ?, verification_code = NULL WHERE email = ?");
                $update->bind_param("ss", $hashed, $email);
                
                if ($update->execute()) {
                    $_SESSION['success_message'] = "Password reset successful! Please login.";
                    echo "<script>window.location.href='login.php';</script>";
                    exit();
                }
            } else {
                $error = "Invalid reset code!";
            }
        } else {
            $error = "User not found (Session expired).";
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
                    
                    <?php if($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Enter Code from Email</label>
                            <input type="text" name="code" class="form-control bg-transparent text-white border-secondary text-center letter-spacing-2" maxlength="6" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">New Password</label>
                            <input type="password" name="new_password" class="form-control bg-transparent text-white border-secondary" required>
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
