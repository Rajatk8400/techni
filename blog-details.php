<?php
require_once 'admin/includes/db.php';

if (!isset($_GET['slug'])) {
    header("Location: blog-grid.php");
    exit();
}

$slug = $_GET['slug'];
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ?");
$stmt->execute([$slug]);
$blog = $stmt->fetch();

if (!$blog) {
    header("Location: blog-grid.php");
    exit();
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo !empty($blog['meta_title']) ? $blog['meta_title'] : $blog['title']; ?> - NexGen Systems</title>
    <meta name="description" content="<?php echo $blog['meta_description']; ?>">
    <?php if(!empty($blog['canonical_url'])): ?>
    <link rel="canonical" href="<?php echo $blog['canonical_url']; ?>" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons/font-css.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .blog-details-content img { max-width: 100%; height: auto; border-radius: 15px; margin: 20px 0; }
        .blog-details-content p { font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 25px; }
        .blog-header { background: #f8f9fa; padding: 60px 0; margin-bottom: 50px; }
    </style>
</head>
<body>
    <div class="main-page-wrapper">
        <header class="theme-main-menu theme-menu-one pt-30 pb-30">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-6">
                        <div class="logo-area"><a href="index.php"><img src="assets/img/logo/nexgen_logo.png" alt="Logo"></a></div>
                    </div>
                    <div class="col-xl-7 d-none d-lg-block text-center">
                        <nav><ul class="list-unstyled d-flex justify-content-center gap-4 mb-0">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="blog-grid.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul></nav>
                    </div>
                    <div class="col-xl-3 col-lg-2 col-6 text-end">
                        <a href="contact.php" class="ht_btn"><span>Get Started</span></a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="blog-header text-center">
                <div class="container">
                    <span class="badge bg-primary px-3 py-2 mb-3"><?php echo $blog['category']; ?></span>
                    <h1 class="display-4 fw-bold mb-4"><?php echo $blog['title']; ?></h1>
                    <p class="text-muted">Published on <?php echo date('M d, Y', strtotime($blog['created_at'])); ?> • By Admin</p>
                </div>
            </div>

            <div class="container mb-120">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="blog-featured-img mb-50">
                            <img src="<?php echo $blog['featured_image']; ?>" alt="<?php echo $blog['title']; ?>" class="w-100 rounded shadow-lg" style="max-height: 500px; object-fit: cover;">
                        </div>
                        <div class="blog-details-content">
                            <?php echo nl2br($blog['content']); ?>
                        </div>
                        <?php if(!empty($blog['tags'])): ?>
                        <div class="blog-tags mt-4">
                            <strong>Tags:</strong>
                            <?php 
                            $tags = explode(',', $blog['tags']);
                            foreach($tags as $tag): ?>
                                <span class="badge border text-dark me-1"><?php echo trim($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <hr class="my-5">
                        <div class="share-post d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Share this post:</h5>
                            <div class="social-links gap-3 d-flex">
                                <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="btn btn-outline-info btn-sm"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer-area bg-dark text-white pt-80 pb-40">
            <div class="container text-center">
                <img src="assets/img/logo/nexgen_logo.png" alt="Logo" class="mb-4" width="150">
                <p>© 2025 NexGen Systems IT Solutions. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
</body>
</html>



