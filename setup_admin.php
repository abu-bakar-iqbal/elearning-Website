<?php
include 'includes/db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Check if user exists
    $check = $conn->prepare("SELECT id, role FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();
    
    if ($result->num_rows > 0) {
        $update = $conn->prepare("UPDATE users SET role = 'admin' WHERE email = ?");
        $update->bind_param("s", $email);
        if ($update->execute()) {
            $message = "<div class='alert alert-success'>Success! User <strong>$email</strong> is now an Admin. Please Logout and Login again.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Database Error: " . $conn->error . "</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>User not found. Please register first.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Setup Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm" style="max-width: 500px; margin: auto;">
            <div class="card-body p-4">
                <h3 class="mb-3">Promote to Admin</h3>
                <p class="text-muted small">Use this tool if you cannot access PHPMyAdmin to change your role.</p>
                
                <?php echo $message; ?>
                
                <form method="POST">
                    <div class="mb-3">
                        <label>Enter Registered Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="user@example.com">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Make Admin</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
