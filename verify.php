<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$email = isset($_SESSION['verify_email']) ? $_SESSION['verify_email'] : '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_code = $_POST['code'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT verification_code FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['verification_code'] === $entered_code) {
            // Update user to verified
            $update = $conn->prepare("UPDATE users SET is_verified = 1, verification_code = NULL WHERE email = ?");
            $update->bind_param("s", $email);
            
            if ($update->execute()) {
                $_SESSION['success_message'] = "Account verified! You can now login.";
                echo "<script>window.location.href='login.php';</script>";
                exit();
            }
        } else {
            $error = "Invalid verification code!";
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
                    <h2 class="text-white fw-bold text-center mb-2">Verify Email</h2>
                    <p class="text-muted text-center small mb-4">We sent a code to <strong><?php echo htmlspecialchars($email); ?></strong></p>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="alert alert-info small">
                        Testing? Check <code>email_log.txt</code> in the project folder for the code.
                    </div>

                    <form method="POST" action="">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <div class="mb-4">
                            <label class="text-muted small mb-1">Enter Code</label>
                            <input type="text" name="code" class="form-control bg-transparent text-white border-secondary text-center letter-spacing-2 fs-4" maxlength="6" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Verify Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
