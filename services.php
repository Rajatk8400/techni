<?php
require_once 'admin/includes/db.php';
$stmt = $pdo->query("SELECT * FROM services WHERE status = 'Active' ORDER BY id DESC");
$services = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="keywords"
		content="agency, app landing, bootstrap 5, business, corporate, creative, doc, documentation, landing page, mobile app, rtl, sass, software, survey, trending">
	<meta name="description"
		content="NexGen Systems - Saas & Software HTML Template for all kinds of agency, app landing, bootstrap 5, business, corporate, creative, doc, documentation, landing page, mobile app, sass, software, survey">
	<title>NexGen Systems - Saas & Software HTML Template</title>
	<meta property="og:site_name" content="NexGen Systems">
	<meta property="og:url" content="">
	<meta property="og:type" content="website">
	<meta property="og:title" content="NexGen Systems - Saas & Software HTML Template">
	<meta name='og:image' content='images/assets/ogg.png'>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#913BFF">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#913BFF">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#913BFF">

	<!-- <link rel="manifest" href="site.webmanifest" /> -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/bootstrap-icons/font-css.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/metisMenu.css">
	<link rel="stylesheet" href="assets/css/aos.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
	<!-- main-page-wrapper start -->
	<div class="main-page-wrapper">
		<!--[if lte IE 9]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif]-->

		<!-- Add your site or application content here -->
		<!-- preloader -->



		<div id="preloader">
			<div class="preloader">
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- preloader end  -->
		<!-- offcanvas start  -->
		<div class="offcanvas offcanvas-top theme-bg" tabindex="-1" id="offcanvasTop">
			<div class="offcanvas-header">
				<a data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fas fa-times search-close" id="search-close"></i>
				</a>
			</div>
			<div class="offcanvas-body">
				<!-- Fullscreen search -->
				<div class="search-wrap">
					<form method="get">
						<input type="search" class="main-search-input" placeholder="Search Your Keyword...">
					</form>
				</div>
				<!-- end fullscreen search -->
			</div>
		</div>
		<!-- offcanvas end  -->

		<!-- slide-bar start -->
		<aside class="slide-bar">
			<div class="close-mobile-menu">
				<a href="javascript:void(0);">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<!-- offset-sidebar start -->
			<div class="offset-sidebar">
				<div class="offset-widget offset-logo mb-30">
					<a href="index.php">
						<img src="assets/img/logo/nexgen_logo.png" alt="logo">
					</a>
				</div>
				<div class="mobile-menu"></div>
				<div class="offset-widget mb-40">
					<div class="info-widget">
						<h4 class="offset-title mb-20">About Us</h4>
						<p class="mb-30">
							But I must explain to you how all this mistaken idea of denouncing pleasure and
							praising pain was born and will give you a complete account of the system and
							expound the actual teachings of the great explore
						</p>
					</div>
				</div>
				<div class="offset-widget mb-30 pr-10">
					<div class="info-widget info-widget2">
						<h4 class="offset-title mb-20">Contact Info</h4>
						<p>
							<i class="fal fa-address-book"></i>
							23/A, Miranda City Likaoli Prikano, Dope</p>
						<p>
							<i class="fal fa-phone"></i>
							+0989 7876 9865 9
						</p>
						<p>
							<i class="fal fa-envelope-open"></i>
							info@example.com
						</p>
					</div>
				</div>
				<!-- <div class="login-btn text-center">
					<a class="ht_btn w-100" href="login.php">Login</a>
				</div> -->
			</div>
			<!-- offset-sidebar end -->

		</aside>
		<div class="body-overlay"></div>
		<!-- slide-bar end -->

		<!--header start  -->

		<header class="theme-main-menu theme-menu-one pt-30 pb-30">
			<div class="main-header-area">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-xxl-2 col-xl-2 col-lg-3 col-6 d-none d-lg-inline-block">
							<div class="logo-area">
								<a class="front" href="index.php"><img src="assets/img/logo/nexgen_logo.png"
										alt="Header-logo"></a>
							</div>
						</div>
						<div class="col-xxl-7 col-xl-7 col-lg-7 col-6 d-flex align-items-center justify-content-center">
							<div class="logo-area d-lg-none d-md-inline-block">
								<a class="front" href="index.php"><img src="assets/img/logo/nexgen_logo.png"
										alt="Header-logo"></a>
							</div>
							<div class="main-menu d-none d-xl-block ps-xxl-5">
								<nav id="mobile-menu">
									<ul class="menu-list ps-0">
										<li>
											<a href="index.php">
												Home
											</a>
											
										</li>
										
										<li>
											<a href="">Services</a>
											
										</li>
										<li>
											<a href="404.php">Our Work</a>
											
										</li>
										<li>
											<a href="blog-grid.php">Blog</a>
											
										</li>
										<li>
											<a href="contact.php">contact</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-3 col-lg-2 col-6">
							<div class="right-nav d-flex align-items-center justify-content-end">
								<div class="search-icon d-none d-xl-inline-block me-4">
									<a href="javascript:void(0);" class="search-trigger">
										<i class="far fa-search" style="font-size: 20px; color: #333;"></i>
									</a>
								</div>
								<div class="quote__btn d-none d-xl-inline-block">
									<div class="custom__btn">
										<a href="contact.php" class="ht_btn" style="background: linear-gradient(135deg, #913BFF 0%, #00D1FF 100%); border: none; border-radius: 50px; padding: 12px 30px; font-weight: 600; color: #fff; display: inline-block;">
											<span>Free Consultation</span>
										</a>
									</div>
								</div>
								
								
								</div>
								<div class="hamburger-menu d-xl-none">
									<a class="round-menu" href="javascript:void(0);">
										<i class="far fa-bars"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.theme-main-menu -->
		</header>
		
		<!--header end  -->

		<main>
			<!-- theme__main__banner start -->
			<section class="theme__main__banner about__banner position-relative mt-140 mt-md-90">
				<div class="about__banner__bg">
					<img src="assets/img/about/about__banner__01.png" alt="" class="">
					<div class="container position-relative">
						<div class="about__content">
							<h2>Our Services</h2>
							<p><a href="index.php">Home</a> - Services</p>
						</div>
					</div>
				</div>
			</section>
			<!-- theme__main__banner end -->

			<!-- offer__section start -->
			<section class="offer__section  offer__section__two pb-100 pb-lg-60 pt-130 pt-lg-60">
				<div class="offer__bg__wrapper">
					<div class="container">
						<div class="row align-items-center mt-50">
							<div class="col-xxl-3 col-xl-6 col-lg-6">
								<div class="single__offer__box shadow">
									<div class="icon">
										<img class="icon-front" src="assets/img/icon/customer__01.svg" alt="icon">
									</div>
									<div class="offer__name mt-20">
										<h4 class="offer__title mb-10">24/7 Customer Support</h4>
									    <p>We provide continuous support for all our services including website development, SEO, and digital marketing.</p>
									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6">
								<div class="single__offer__box shadow">
									<div class="icon icon-two">
										<img class="icon-front" src="assets/img/icon/customer__02.svg" alt="icon">
									</div>
									<div class="offer__name mt-20">
										<h4 class="offer__title mb-10"><a href="services.php">Expert IT  Team</a></h4>
									    <p>Our experienced team delivers high-quality solutions in web development, design, and marketing.</p>
									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6">
								<div class="single__offer__box shadow">
									<div class="icon icon-three">
										<img class="icon-front" src="assets/img/icon/customer__03.svg" alt="icon">
									</div>
									<div class="offer__name mt-20">
										<h4 class="offer__title mb-10"><a href="services.php">Trusted by Clients</a></h4>
									    <p>We are trusted by startups and businesses worldwide for delivering reliable and result-driven solutions.</p>
									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6">
								<div class="single__offer__box shadow">
									<div class="icon icon-four">
										<img class="icon-front" src="assets/img/icon/shield__01.png" alt="icon">
									</div>
									<div class="offer__name mt-20">
										<h4 class="offer__title mb-10"><a href="services.php">Secure Solutions</a></h4>
									    <p>We build secure, scalable, and performance-driven digital solutions for long-term success.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- offer__section end -->

			<!-- service__section__three start -->
			<section class="service__section service__section__three pt-100 pt-lg-100 pb-60 pb-lg-60 mb-130 mb-lg-60">
	<div class="container">

		<div class="section__title">
			<div class="text-start text-lg-center">
				<h5 class="sub__title__two mb-20">Our Services</h5>

				<div class="row">
					<div class="col-xl-6 col-lg-8 m-auto">
						<h2 class="section__title__main">
							Complete IT Solutions for Businesses Worldwide
						</h2>
					</div>
				</div>

			</div>
		</div>

		<div class="row mt-50 d-flex align-items-center">
			<div class="swiper service__slider__three pb-60">
				<div class="swiper-wrapper">

					<!-- 1 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__01.png" alt="Website Development">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">Website Development</a>
										</h4>
										<p>
										We build fast, responsive, and SEO-friendly websites designed to grow your business globally.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 2 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__02.png" alt="App Development">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">Mobile App Development</a>
										</h4>
										<p>
										Custom Android & iOS apps with modern UI and smooth performance for startups and businesses.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 3 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__03.png" alt="UI UX Design">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">UI/UX Design</a>
										</h4>
										<p>
										We design user-friendly and visually engaging interfaces to improve user experience and conversions.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 4 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__04.png" alt="Cloud Services">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">Cloud Solutions</a>
										</h4>
										<p>
										Secure and scalable cloud services for data management, automation, and business growth.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 5 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__05.png" alt="Digital Marketing">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">Digital Marketing</a>
										</h4>
										<p>
										Boost your online presence with SEO, social media marketing, and paid advertising strategies.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 6 -->
					<div class="swiper-slide">
						<div class="service__wrapper mb-30">
							<div class="service__thumb position-relative mb-20">
								<div class="service__icon__wrapper">
									<div class="service__icon mb-20">
										<img src="assets/img/icon/service__06.png" alt="SEO Services">
									</div>
									<div class="service__content">
										<h4 class="service__title mb-20">
											<a href="#">SEO Services</a>
										</h4>
										<p>
										Improve your website ranking on Google and drive organic traffic with advanced SEO strategies.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="swiper-pagination mt-30"></div>
			</div>
		</div>

	</div>
</section>
			<!-- service__section__three end -->

			<!-- offer__section start -->
			<section class="service__section service__section__two pt-130 pt-lg-100">
	<div class="container">

		<div class="section__title">
			<div class="text-start text-lg-center">
				<h5 class="sub__title__two mb-20">Our Core Services</h5>

				<div class="row">
					<div class="col-xl-6 col-lg-8 m-auto">
						<h2 class="section__title__main">
							End-to-End IT & Digital Solutions for Global Businesses
						</h2>
					</div>
				</div>

			</div>
		</div>

		<div class="row mt-50 d-flex align-items-center">
			<?php foreach ($services as $srv): ?>
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="<?php echo $srv['icon_image']; ?>" alt="<?php echo $srv['title']; ?>" style="width: 64px; height: 64px; object-fit: contain;">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20"><?php echo $srv['title']; ?></h4>
								<p><?php echo $srv['short_description']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
            <div style="display:none;">

			<!-- 1 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__01.png" alt="Website Development">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Website Development</h4>
								<p>
								Custom, responsive, and SEO-friendly websites designed to grow your business globally.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 2 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__02.png" alt="App Development">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">App Development</h4>
								<p>
								We build high-performance Android & iOS apps with modern UI and seamless experience.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 3 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__03.png" alt="Digital Marketing">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Digital Marketing</h4>
								<p>
								Grow your brand with SEO, social media marketing, and performance-driven campaigns.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 4 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__04.png" alt="SEO Services">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">SEO Services</h4>
								<p>
								Improve your Google rankings and drive organic traffic with advanced SEO strategies.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 5 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__05.png" alt="Email Marketing">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Email Marketing</h4>
								<p>
								Targeted email campaigns to engage customers and increase conversions effectively.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 6 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__06.png" alt="Graphic Design">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Graphic Design</h4>
								<p>
								Creative designs including logos, banners, and branding materials for business identity.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 7 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__07.png" alt="Content Creation">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Content Creation</h4>
								<p>
								Engaging and SEO-friendly content that attracts users and builds brand authority.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 8 -->
			<div class="col-xxl-3 col-xl-4 col-lg-6">
				<div class="service__wrapper mb-30">
					<div class="service__thumb position-relative mb-20">
						<div class="service__icon__wrapper">
							<div class="service__icon mb-20">
								<img src="assets/img/icon/service__08.png" alt="Google Ads Meta Ads">
							</div>
							<div class="service__content">
								<h4 class="service__title mb-20">Google & Meta Ads</h4>
								<p>
								Run high-converting ad campaigns on Google, Facebook, and Instagram to generate leads.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			</div>
		</div>

	</div>
</section>
			<!-- offer__section end -->

			<!-- about__section start-->
			<section class="about__section__three position-relative pt-130 pt-lg-60 pb-130 pb-lg-60">
	<div class="container">

		<div class="section__title mb-50">
			<div class="text-start text-lg-center">

				<h5 class="sub__title__two mb-20">Our Working Process</h5>

				<div class="row">
					<div class="col-xxl-6 m-auto">
						<h2 class="section__title__main">
							Our Proven Process to Deliver High-Quality IT Solutions Worldwide
						</h2>
					</div>
				</div>

			</div>
		</div>

		<div class="row d-flex">

			<!-- STEP 1 -->
			<div class="col-xxl-4">
				<div class="about__content__wrapper pb-lg-30">
					<div class="about__type d-flex align-items-center">

						<div class="icon">
							<img src="assets/img/icon/about__two__icon__01.png" alt="Research Strategy">
						</div>

						<div class="about__type_text">
							<h5>01. Research & Strategy</h5>
							<p>
								We analyze your business goals, competitors, and target audience to create a 
								result-driven strategy for website development and digital marketing success.
							</p>
						</div>

					</div>
				</div>
			</div>

			<!-- STEP 2 -->
			<div class="col-xxl-4">
				<div class="about__content__wrapper pb-lg-30">
					<div class="about__type d-flex align-items-center">

						<div class="icon">
							<img src="assets/img/icon/about__two__icon__02.png" alt="Design Development">
						</div>

						<div class="about__type_text">
							<h5>02. Design & Development</h5>
							<p>
								We design modern, responsive, and user-friendly websites and applications 
								with high performance and seamless user experience.
							</p>
						</div>

					</div>
				</div>
			</div>

			<!-- STEP 3 -->
			<div class="col-xxl-4">
				<div class="about__content__wrapper pb-lg-30">
					<div class="about__type d-flex align-items-center">

						<div class="icon">
							<img src="assets/img/icon/about__two__icon__03.png" alt="Launch Growth">
						</div>

						<div class="about__type_text">
							<h5>03. Launch & Growth</h5>
							<p>
								After launch, we implement SEO, Google Ads, and marketing strategies 
								to drive traffic, generate leads, and scale your business globally.
							</p>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>
</section>
			<!-- about__section end -->
		</main>

		<!--footer-area start-->
		<footer class="footer-area">
	<div class="footer__bg__one">

		<div class="footer__wrapper__one pt-60 pb-20">
			<div class="container">

				<div class="row px-0 pb-80 pb-md-40">

					<!-- LOGO + NEWSLETTER -->
					<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 me-auto">
						<div class="footer__widget mb-30">

							<a href="index.php" class="footer-logo d-inline-block mb-30">
								<img src="assets/img/logo/nexgen_logo.png" alt="IT Company Logo">
							</a>

							<h3>
								Get Free IT Insights & Marketing Updates
							</h3>

							<p>
								Subscribe to receive updates on website development, SEO strategies, 
								digital marketing trends, and business growth tips.
							</p>

							<form class="subscribe__form position-relative mt-30" action="mail.php" method="POST">
								<input type="email" placeholder="Enter Your Email Address" required>
								<button type="submit" class="ht_btn submit-btn">Subscribe</button>
							</form>

						</div>
					</div>

					<!-- QUICK LINKS -->
					<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 ms-auto">
						<div class="footer__widget mt-20">
							<h4 class="widget__title mb-30">Quick Links</h4>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About Us</a></li>
								<li><a href="services.php">Services</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- SERVICES -->
					<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 ms-auto">
						<div class="footer__widget mt-20">
							<h4 class="widget__title mb-30">Our Services</h4>
							<ul>
								<li><a href="#">Website Development</a></li>
								<li><a href="#">App Development</a></li>
								<li><a href="#">SEO Services</a></li>
								<li><a href="#">Digital Marketing</a></li>
								<li><a href="#">Google & Meta Ads</a></li>
							</ul>
						</div>
					</div>

					<!-- CONTACT -->
					<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 ms-auto">
						<div class="footer__widget footer__contact mt-20">

							<h4 class="widget__title mb-30">Get In Touch</h4>

							<p>
								Looking for reliable IT services? Contact us for website development, SEO, 
								and digital marketing solutions worldwide.
							</p>

							<ul>
								<li><a href="#">info@yourcompany.com</a></li>
								<li><a href="#">+91 9876543210</a></li>
								<li><a href="#">India | Serving Worldwide Clients</a></li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="devider__line"></div>

		<!-- COPYRIGHT -->
		<div class="copyright__area pt-70 pb-70 pt-md-40 pb-md-40">
			<div class="container">
				<div class="row d-flex align-items-center">

					<div class="col-lg-6 mb-md-40">
						<div class="text-start">
							<div class="copyright__text">
								<p>
									© 2025 Your Company Name | Global IT Services & Digital Solutions Provider
								</p>
							</div>
						</div>
					</div>

					<!-- SOCIAL -->
					<div class="col-lg-5 ms-auto">
						<div class="text-lg-end">
							<div class="social_media">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</footer>
		<!--footer-area end-->


	</div>
	<!-- main-page-wrapper end -->



	<!-- JS here -->

	<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/popper.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/jquery.meanmenu.js"></script>
	<script src="assets/js/swiper-bundle.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/jquery.easypiechart.min.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/aos.js"></script>
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/plugins.js"></script>


	<!--Custom JS here -->
	<script src="assets/js/main.js"></script>


</body>

</html>



