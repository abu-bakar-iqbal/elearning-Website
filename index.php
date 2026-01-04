<?php
include 'includes/data.php';
include 'includes/header.php';

// Get first 3 courses for popular section
$popular_courses = array_slice($courses_data, 0, 3);
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-glow" style="top: 20%; left: 10%;"></div>
    <div class="hero-glow" style="bottom: 20%; right: 10%; background: #00bcd4;"></div>

    <div class="container position-relative py-5 mt-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                <span class="text-gold fw-bold text-uppercase letter-spacing-2 mb-3 d-block">The Future of
                    Learning</span>
                <h1 class="display-3 fw-bold mb-4 text-white lh-base">Master <span class="text-gradient">Artificial
                        Intelligence</span> with <span class="text-gold">e</span>learn</h1>
                <p class="lead text-muted mb-5">Unlock the power of AI with our premium courses. From Python foundations
                    to advanced Deep Learning, build the skills that define tomorrow.</p>
                <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                    <a href="courses.php" class="btn btn-gold btn-lg rounded-pill px-5">Start Learning</a>
                    <a href="about.php" class="btn btn-outline-gold btn-lg rounded-pill px-5">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative d-inline-block">
                    <div class="p-5 glass-card position-relative z-2">
                        <i class="bi bi-cpu display-1 text-gold"></i>
                    </div>
                    <!-- Decorative rings -->
                    <div
                        class="position-absolute top-50 start-50 translate-middle border border-light opacity-10 rounded-circle hero-ring-inner">
                    </div>
                    <div
                        class="position-absolute top-50 start-50 translate-middle border border-gold opacity-20 rounded-circle hero-ring-outer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 border-bottom border-secondary border-opacity-10">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-white display-5">50k+</h2>
                <p class="text-muted mb-0">Active Students</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-white display-5">100+</h2>
                <p class="text-muted mb-0">Countries</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-white display-5">4.9</h2>
                <p class="text-muted mb-0">Average Rating</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-white display-5">90%</h2>
                <p class="text-muted mb-0">Career Switch Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Courses Section -->
<section class="section-padding bg-dark">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold mb-2">Popular <span class="text-gradient">Courses</span></h2>
                <p class="text-muted">Join thousands of students learning AI.</p>
            </div>
            <a href="courses.php" class="btn btn-outline-gold d-none d-md-block">View All Courses</a>
        </div>

        <div class="row g-4">
            <?php foreach ($popular_courses as $course): ?>
            <div class="col-md-4">
                <div class="glass-card h-100 p-0 overflow-hidden">
                    <div class="position-relative" style="height: 200px;">
                        <img src="<?php echo $course['image']; ?>" class="w-100 h-100 object-fit-cover"
                            alt="<?php echo $course['title']; ?>">
                        <div class="position-absolute bottom-0 start-0 p-3 w-100 bg-gradient-to-t">
                            <?php 
                            // Display only the first tag
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
                        <a href="course_detail.php?id=<?php echo $course['id']; ?>"
                            class="text-gold text-decoration-none fw-bold">View Course <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4 d-md-none">
            <a href="courses.php" class="btn btn-outline-gold">View All Courses</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section-padding bg-light-blue">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Why Learn With <span class="text-gold">e</span>learn?</h2>
            <p class="text-muted">Bridging the gap between complex theory and practical application.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="glass-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-terminal"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Python & AI</h4>
                    <p class="text-muted small">Master the language of AI. From basic syntax to advanced libraries like
                        NumPy and Pandas.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-database"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Machine Learning</h4>
                    <p class="text-muted small">Learn algorithms that learn from data. Supervised, unsupervised, and
                        reinforcement learning.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Deep Learning</h4>
                    <p class="text-muted small">Build neural networks with TensorFlow and PyTorch. Master the
                        architecture of the brain.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-robot"></i>
                    </div>
                    <h4 class="fw-bold mb-3">AI Agents</h4>
                    <p class="text-muted small">Create autonomous agents that can reason, plan, and execute tasks in
                        dynamic environments.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Student <span class="text-gradient">Success Stories</span></h2>
            <p class="text-muted">Hear from those who transformed their careers with <span
                    class="text-gold">e</span>learn.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex text-gold mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted mb-4">"The MLOps course was a game changer. I implemented a full pipeline at
                        work the next week. Highly recommended!"</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-3"
                            style="width: 48px; height: 48px;">JS</div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">John Smith</h6>
                            <small class="text-muted">Data Engineer at TechCorp</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex text-gold mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted mb-4">"I finally understand Transformers. The explanation of Attention
                        mechanisms was crystal clear. Best investment I've made."</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-3"
                            style="width: 48px; height: 48px;">AL</div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Ada Lovelace</h6>
                            <small class="text-muted">AI Researcher</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex text-gold mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    </div>
                    <p class="text-muted mb-4">"<span class="text-gold">e</span>learn isn't just theory. The projects
                        are real-world and challenging. I built a portfolio that got me hired."</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-3"
                            style="width: 48px; height: 48px;">MA</div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Mike Altmann</h6>
                            <small class="text-muted">Junior Developer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light-blue">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-2">Frequently Asked <span class="text-gradient">Questions</span></h2>
                </div>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed glass-card text-white fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq1">
                                Are there prerequisites for the courses?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Some advanced courses require Python knowledge, but our "Python for AI Mastery" course
                                is designed for absolute beginners to get you started.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed glass-card text-white fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do I get a certificate upon completion?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes! Every course completion comes with a verified digital certificate that you can add
                                to your LinkedIn profile or resume.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed glass-card text-white fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq3">
                                Is the content updated regularly?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Absolutely. AI moves fast, and so do we. We update our curriculum monthly to reflect the
                                latest tools like GPT-4, Gemini, and Llama 3.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding text-center">
    <div class="container">
        <div class="glass-card p-5">
            <h2 class="display-5 fw-bold mb-4">Ready to Start Your Journey?</h2>
            <p class="text-muted mb-5 lead">Join 50,000+ students and start building the future today.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="d-flex flex-column flex-md-row gap-2">
                        <input type="email"
                            class="form-control form-control-lg bg-transparent text-white border-secondary"
                            placeholder="Enter your email">
                        <button class="btn btn-gold btn-lg">Subscribe</button>
                    </form>
                    <p class="text-muted small mt-3">Get free weekly AI tips. No spam, ever.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
