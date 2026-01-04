<?php
include 'includes/data.php';
include 'includes/header.php';
?>

<section class="section-padding mt-5 pt-5">
    <div class="container pt-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-3">Community <span class="text-gradient">Insights</span></h1>
            <p class="text-muted lead">The latest rankings, trends, and tools in AI.</p>
        </div>

        <div class="row g-5">
            <?php foreach ($blog_posts as $post): ?>
            <div class="col-lg-12">
                <div class="glass-card p-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $post['image']; ?>" class="w-100 h-100 object-fit-cover" style="min-height: 300px;"
                                alt="<?php echo $post['title']; ?>">
                        </div>
                        <div class="col-md-8 p-5">
                            <h2 class="fw-bold text-white mb-3"><?php echo $post['title']; ?></h2>
                            <p class="lead text-muted mb-4"><?php echo $post['excerpt']; ?></p>

                            <div class="bg-dark p-4 rounded-3 border border-secondary border-opacity-25">
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($post['content'] as $item): ?>
                                    <li class="mb-2 text-gold font-monospace">
                                        <?php echo $item; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
