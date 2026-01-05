<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email, created_at, profile_image, bio, job_title FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Prepare fallback data if columns don't exist yet (graceful degradation)
$bio = isset($user['bio']) ? $user['bio'] : 'No bio added yet.';
$job_title = isset($user['job_title']) ? $user['job_title'] : 'Student';
$joined_date = date("F Y", strtotime($user['created_at']));
$avatar_url = "https://ui-avatars.com/api/?name=" . urlencode($user['username']) . "&background=ffd700&color=000&size=128&bold=true";

// Mock Data for statistics
$courses_completed = 3;
$hours_learned = 42;
$certificates = 2;
?>

<section class="section-padding mt-5">
    <div class="container">
        <!-- Profile Header -->
        <div class="glass-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center text-md-start">
                    <img src="<?php echo $avatar_url; ?>" alt="Profile" class="rounded-circle border border-2 border-gold img-fluid shadow-lg mb-3 mb-md-0">
                </div>
                <div class="col-md-7 text-center text-md-start">
                    <h2 class="fw-bold text-white mb-1"><?php echo htmlspecialchars($user['username']); ?></h2>
                    <p class="text-gold mb-2"><i class="bi bi-briefcase me-2"></i><?php echo htmlspecialchars($job_title); ?></p>
                    <p class="text-muted small mb-0"><i class="bi bi-calendar-check me-2"></i>Joined <?php echo $joined_date; ?></p>
                </div>
                <div class="col-md-3 text-center text-md-end">
                    <button class="btn btn-outline-gold rounded-pill px-4">Edit Profile</button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="glass-card h-100 p-4">
                    <h5 class="fw-bold text-white mb-3">About Me</h5>
                    <p class="text-muted text-justify"><?php echo nl2br(htmlspecialchars($bio)); ?></p>
                    
                    <hr class="border-secondary my-4">
                    
                    <h5 class="fw-bold text-white mb-3">Contact Info</h5>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="bi bi-envelope me-2 text-gold"></i> <?php echo htmlspecialchars($user['email']); ?></li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2 text-gold"></i> Remote</li>
                        <li class="mb-2"><i class="bi bi-globe me-2 text-gold"></i> elearn.fit/u/<?php echo strtolower($user['username']); ?></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <!-- Stats Row -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-bold text-gold display-6 mb-0"><?php echo $courses_completed; ?></h3>
                            <small class="text-muted">Courses</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-bold text-gold display-6 mb-0"><?php echo $hours_learned; ?>h</h3>
                            <small class="text-muted">Learning Time</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-bold text-gold display-6 mb-0"><?php echo $certificates; ?></h3>
                            <small class="text-muted">Certificates</small>
                        </div>
                    </div>
                </div>

                <!-- Enrolled Courses -->
                <h5 class="fw-bold text-white mb-3">Continue Learning</h5>
                <div class="glass-card p-0 overflow-hidden mb-4">
                    <div class="list-group list-group-flush bg-transparent">
                        <!-- Mock Course Item -->
                        <div class="list-group-item bg-transparent text-white border-secondary p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-dark rounded p-2 text-gold fs-4"><i class="bi bi-braces"></i></div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 fw-bold">Python for AI Mastery</h6>
                                    <div class="progress bg-secondary" style="height: 5px;">
                                        <div class="progress-bar bg-gold" role="progressbar" style="width: 75%"></div>
                                    </div>
                                    <small class="text-muted">75% Complete</small>
                                </div>
                                <div class="ms-3">
                                    <a href="#" class="btn btn-sm btn-gold rounded-pill">Resume</a>
                                </div>
                            </div>
                        </div>
                         <!-- Mock Course Item -->
                         <div class="list-group-item bg-transparent text-white border-secondary p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-dark rounded p-2 text-gold fs-4"><i class="bi bi-cpu"></i></div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 fw-bold">Deep Learning Bootcamp</h6>
                                    <div class="progress bg-secondary" style="height: 5px;">
                                        <div class="progress-bar bg-gold" role="progressbar" style="width: 15%"></div>
                                    </div>
                                    <small class="text-muted">15% Complete</small>
                                </div>
                                <div class="ms-3">
                                    <a href="#" class="btn btn-sm btn-gold rounded-pill">Resume</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
