<?php
include 'includes/data.php';
include 'includes/header.php';
?>

<section class="section-padding mt-5 pt-5">
    <div class="container pt-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-3">Explore Our <span class="text-gradient">Curriculum</span></h1>
            <p class="text-muted lead">Comprehensive courses designed to take you from novice to expert.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($courses_data as $course): ?>
            <div class="col-md-4">
                <div class="glass-card h-100 p-0 overflow-hidden">
                    <div class="position-relative" style="height: 200px;">
                        <img src="<?php echo $course['image']; ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo $course['title']; ?>">
                        <div class="position-absolute bottom-0 start-0 p-3 w-100 bg-gradient-to-t">
                            <?php 
                            $first_tag = $course['tags'][0]; 
                            ?>
                            <span class="badge bg-gold text-dark"><?php echo $first_tag; ?></span>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-2 small text-gold">
                            <span><?php echo $course['level']; ?></span>
                            <span><i class="bi bi-star-fill"></i> <?php echo $course['rating']; ?></span>
                        </div>
                        <h4 class="fw-bold text-white mb-2"><?php echo $course['title']; ?></h4>
                        <!-- Truncate description -->
                        <p class="text-muted small mb-4"><?php echo substr($course['description'], 0, 80); ?>...</p>
                        <a href="course_detail.php?id=<?php echo $course['id']; ?>"
                            class="text-gold text-decoration-none fw-bold">View Course <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
