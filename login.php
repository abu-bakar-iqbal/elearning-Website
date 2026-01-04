<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$error = '';
$success = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
unset($_SESSION['success_message']); // Clear message after showing

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, is_verified FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if ($row['is_verified'] == 1) {
                // Login Success
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                echo "<script>window.location.href='index.php';</script>";
                exit();
            } else {
                $_SESSION['verify_email'] = $email;
                $error = "Please verify your email first. <a href='verify.php'>Verify Now</a>";
            }
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<section class="section-padding mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card p-5">
                    <h2 class="text-white fw-bold text-center mb-4">Welcome Back</h2>
                    
                    <?php if($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Email Address</label>
                            <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Password</label>
                            <input type="password" name="password" class="form-control bg-transparent text-white border-secondary" required>
                        </div>
                        <div class="text-end mb-4">
                            <a href="forgot_password.php" class="text-muted small text-decoration-none">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Login</button>
                    </form>
                    <p class="text-center text-muted mt-4 small">Don't have an account? <a href="register.php" class="text-gold">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
