<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>elearn | The Future of Learning</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="static/css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-cpu text-gold"></i> <span class="text-gold">e</span>learn
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list text-white fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    
                    <?php if (isset($_SESSION['user_id'])): 
                        // Use UI Avatars for dynamic profile image based on username
                        $username_encoded = urlencode($_SESSION['username']);
                        $avatar_url = "https://ui-avatars.com/api/?name=" . $username_encoded . "&background=ffd700&color=000&bold=true";
                    ?>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $avatar_url; ?>" alt="Avatar" class="rounded-circle border border-gold" width="35" height="35">
                                <span class="text-white d-none d-lg-block"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary shadow-lg">
                                <li>
                                    <div class="px-3 py-2 border-bottom border-secondary mb-2">
                                        <p class="mb-0 text-white fw-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                                        <small class="text-muted d-block text-truncate" style="max-width: 150px;"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Student'; ?></small>
                                    </div>
                                </li>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                    <li><a class="dropdown-item text-gold fw-bold h-effect" href="admin/dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Admin Panel</a></li>
                                    <li><hr class="dropdown-divider bg-secondary"></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item text-white h-effect" href="profile.php"><i class="bi bi-person-fill me-2 text-gold"></i> My Profile</a></li>
                                <li><a class="dropdown-item text-white h-effect" href="#"><i class="bi bi-gear-fill me-2 text-gold"></i> Settings</a></li>
                                <li><a class="dropdown-item text-white h-effect" href="#"><i class="bi bi-question-circle-fill me-2 text-gold"></i> Help Center</a></li>
                                <li><hr class="dropdown-divider bg-secondary"></li>
                                <li><a class="dropdown-item text-danger h-effect" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-2"><a class="nav-link" href="login.php">Login</a></li>
                         <li class="nav-item ms-lg-2">
                            <a href="register.php" class="btn btn-outline-gold px-4 rounded-pill">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main>
