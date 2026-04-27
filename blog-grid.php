<?php
require_once 'admin/includes/db.php';
$stmt = $pdo->query("SELECT * FROM blogs WHERE status='Published' ORDER BY id DESC");
$blogs = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blogs - NexGen Systems IT Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons/font-css.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="main-page-wrapper">
        <header class="theme-main-menu theme-menu-one pt-30 pb-30">
            <div class="main-headerArea">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3 col-6">
                            <div class="logo-area">
                                <a href="index.php"><img src="assets/img/logo/nexgen_logo.png" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul class="menu-list ps-0 d-flex justify-content-center list-unstyled gap-4">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="services.php">Services</a></li>
                                        <li><a href="blog-grid.php">Blog</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-6 text-end">
                            <a href="contact.php" class="ht_btn"><span>Get Started</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="theme__main__banner about__banner position-relative mt-140 mt-md-90">
                <div class="about__banner__bg">
                    <img src="assets/img/about/about__banner__01.png" alt="" class="w-100" style="height: 400px; object-fit: cover;">
                    <div class="container position-relative">
                        <div class="about__content">
                            <h2>Our Blogs</h2>
                            <p><a href="index.php">Home</a> - Blogs</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blog__section pt-100 pb-120">
                <div class="container">
                    <div class="section__title text-center mb-60">
                        <h2 class="section__title__main">Latest Insights & News</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($blogs as $blog): ?>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog__style__one mb-40 shadow-sm rounded overflow-hidden">
                                <a class="blog__thumb" href="blog-details.php?slug=<?php echo $blog['slug']; ?>">
                                    <img src="<?php echo $blog['featured_image']; ?>" alt="<?php echo $blog['title']; ?>" class="w-100" style="height: 250px; object-fit: cover;">
                                </a>
                                <div class="blog__content p-4">
                                    <div class="blog__meta mb-15">
                                        <span class="text-primary fw-bold"><?php echo $blog['category']; ?></span> • 
                                        <span class="text-muted"><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span>
                                    </div>
                                    <h4 class="blog__title mb-20">
                                        <a href="blog-details.php?slug=<?php echo $blog['slug']; ?>"><?php echo $blog['title']; ?></a>
                                    </h4>
                                    <p class="text-muted"><?php echo substr(strip_tags($blog['content']), 0, 100); ?>...</p>
                                    <a href="blog-details.php?slug=<?php echo $blog['slug']; ?>" class="read__more text-primary fw-bold mt-2 d-inline-block">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(empty($blogs)): ?>
                            <div class="col-12 text-center"><h3>No blogs found.</h3></div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer-area bg-dark text-white pt-80 pb-40">
            <div class="container text-center">
                <img src="assets/img/logo/nexgen_logo.png" alt="Logo" class="mb-4" width="150">
                <p class="mb-4">© 2025 NexGen Systems IT Solutions. All Rights Reserved.</p>
                <div class="social-links gap-3 d-flex justify-content-center">
                    <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
</body>
</html>



