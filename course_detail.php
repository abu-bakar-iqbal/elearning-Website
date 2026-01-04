<?php
include 'includes/data.php';

// Get course ID from URL query parameter
$course_id = isset($_GET['id']) ? $_GET['id'] : null;
$course = null;

// Find the course by ID
if ($course_id) {
    foreach ($courses_data as $c) {
        if ($c['id'] === $course_id) {
            $course = $c;
            break;
        }
    }
}

// Redirect to courses page if course not found (simple error handling)
if (!$course) {
    header("Location: courses.php");
    exit();
}

include 'includes/header.php';
?>

<section class="section-padding mt-5 pt-5">
    <div class="container pt-5">
        <a href="courses.php" class="text-muted text-decoration-none mb-4 d-inline-block"><i class="bi bi-arrow-left"></i> Back to Courses</a>
        
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-3"><?php echo $course['title']; ?></h1>
                <div class="d-flex gap-3 mb-4 text-gold">
                    <span><i class="bi bi-bar-chart-fill"></i> <?php echo $course['level']; ?></span>
                    <span><i class="bi bi-star-fill"></i> <?php echo $course['rating']; ?> (1.2k reviews)</span>
                </div>
                <p class="lead text-muted mb-5"><?php echo $course['description']; ?></p>
                <div class="d-flex gap-3">
                    <button class="btn btn-gold btn-lg rounded-pill px-5">Enroll Now</button>
                    <button class="btn btn-outline-gold btn-lg rounded-pill px-5">Syllabus</button>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="position-relative">
                    <img src="<?php echo $course['image']; ?>" class="w-100 rounded-4 shadow-lg border border-secondary border-opacity-25" alt="<?php echo $course['title']; ?>">
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge bg-gold text-dark fs-6">Best Seller</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Curriculum / Roadmap -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="fw-bold text-white mb-5 text-center">Course <span class="text-gradient">Roadmap</span></h3>
                
                <div class="roadmap-container position-relative">
                    <!-- Vertical Line -->
                    <div class="position-absolute start-0 top-0 bottom-0 border-start border-gold opacity-25 ms-3 d-none d-md-block" style="left: 50%;"></div>

                    <div class="row g-4">
                        <?php foreach ($course['roadmap'] as $index => $step): ?>
                            <?php if ($index % 2 == 0): ?>
                                <!-- Left Side Item -->
                                <div class="col-md-6 pe-md-5 text-md-end">
                                    <div class="glass-card position-relative">
                                        <span class="badge bg-gold text-dark mb-2">Step <?php echo $index + 1; ?></span>
                                        <h4 class="fw-bold text-white"><?php echo $step['title']; ?></h4>
                                        <p class="text-muted small mb-0"><?php echo $step['desc']; ?></p>
                                        <!-- Dot -->
                                        <div class="position-absolute top-50 start-100 translate-middle p-2 bg-gold rounded-circle d-none d-md-block" style="right: -3rem !important; left: auto;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            <?php else: ?>
                                <!-- Right Side Item -->
                                <div class="col-md-6"></div>
                                <div class="col-md-6 ps-md-5">
                                    <div class="glass-card position-relative">
                                        <span class="badge bg-gold text-dark mb-2">Step <?php echo $index + 1; ?></span>
                                        <h4 class="fw-bold text-white"><?php echo $step['title']; ?></h4>
                                        <p class="text-muted small mb-0"><?php echo $step['desc']; ?></p>
                                         <!-- Dot -->
                                         <div class="position-absolute top-50 start-0 translate-middle p-2 bg-gold rounded-circle d-none d-md-block" style="left: -3rem !important;"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
