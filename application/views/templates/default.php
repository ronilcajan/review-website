<?php
$current_page = $this->uri->segment(1);
$current_page1 = $this->uri->segment(2);
$user = $this->ion_auth->user()->row();
$query = $this->db->query("SELECT * FROM systems WHERE id=1");
$sys = $query->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $title ?> | <?= $sys->system_name ?></title>

	<!-- Favicons -->
	<link href="<?= site_url('assets/uploads/') . $sys->system_logo ?>" rel="icon">
	<link href="<?= site_url('assets/uploads/') . $sys->system_logo ?>" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= site_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= site_url() ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/css/custom.css" rel="stylesheet">
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-center border-bottom">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="logo">
				<!-- <h1><a href="<?= site_url() ?>">Vesperr</a></h1> -->
				<!-- Uncomment below if you prefer to use an image logo -->
				<a href="<?= site_url() ?>"><img src="<?= site_url('assets/uploads/') . $sys->system_logo ?>" alt="" class="img-fluid"> <span style="font-weight: bold; color:black"><?= $sys->system_name ?></span></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link <?= $current_page == '' ? 'active' : null ?>" href="<?= site_url() ?>">Home</a></li>
					<li><a class="nav-link <?= $current_page == 'about' ? 'active' : null ?>" href="<?= site_url('about') ?>">About Us</a></li>
					<li><a class="nav-link <?= $current_page == 'category' ? 'active' : null ?>" href="<?= site_url('category') ?>">Category</a></li>
					<li><a class="nav-link <?= $current_page == 'contact' ? 'active' : null ?>" href="<?= site_url('contact') ?>">Contact Us</a></li>
					<?php if ($this->ion_auth->logged_in()) : ?>
						<?php if ($this->ion_auth->is_admin()) : ?>
							<li class="dropdown"><a href="#" class="<?= $current_page1 == 'edit_user' ? 'active' : null ?>">
									<span>
										<?php if (empty($user->avatar)) : ?>
											<img src="<?= site_url() ?>assets/img/person.png" alt="" class="img-fluid" width="25" height="25">
										<?php else : ?>
											<img alt="preview" src="<?= preg_match('/data:image/i', $user->avatar) ? $user->avatar : site_url() . 'assets/uploads/' . $user->avatar ?>" class="img-fluid" width="25" height="25" />
										<?php endif ?>
										<?= $user->first_name . ' ' . $user->last_name ?>
									</span>
									<i class="bi bi-chevron-down"></i></a>
								<ul>
									<li><a href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
									<li><a href="<?= site_url('listing') ?>" class="<?= $current_page == 'listing' ? 'active' : null ?>">My Listing</a></li>
									<li><a href="<?= site_url('my_review') ?>" class="<?= $current_page == 'review' ? 'active' : null ?>">My Review</a></li>
									<li><a class="text-danger" href="<?= site_url('auth/logout') ?>">Logout</a></li>
								</ul>
							</li>
						<?php else : ?>
							<li class="dropdown"><a href="#" class="<?= $current_page1 == 'edit_user' ? 'active' : null ?>">
									<span>
										<?php if (empty($user->avatar)) : ?>
											<img src="<?= site_url() ?>assets/img/person.png" alt="" class="img-fluid rounded-circle" width="25" height="25">
										<?php else : ?>
											<img src="<?= site_url('assets/uploads/') . $user->avatar ?>" alt="" class="img-fluid rounded-circle" width="25" height="25">
										<?php endif ?>
										<?= $user->first_name . ' ' . $user->last_name ?>
									</span>
									<i class="bi bi-chevron-down"></i></a>
								<ul>
									<li><a href="<?= site_url('auth/edit_user/') . $user->id ?>" class="<?= $current_page1 == 'edit_user' ? 'active' : null ?>">Profile</a></li>
									<li><a href="<?= site_url('listing') ?>" class="<?= $current_page == 'listing' ? 'active' : null ?>">My Listing</a></li>
									<li><a href="<?= site_url('my_review') ?>" class="<?= $current_page == 'review' ? 'active' : null ?>">My Review</a></li>
									<li><a class="text-danger" href="<?= site_url('auth/logout') ?>">Logout</a></li>
								</ul>
							</li>
						<?php endif ?>

					<?php else : ?>
						<li><a class="nav-link <?= $current_page1 == 'login' ? 'active' : null ?>" href="<?= site_url('auth/login') ?>">Login</a></li>
						<li><a class="getstarted" href="<?= site_url('auth/register') ?>">Register</a></li>
					<?php endif ?>

				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->

	<?= $content ?>
	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact text-white" style="background-color: #54318B;">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-6 text-white" data-aos="fade-up" data-aos-delay="100">
					<div class="contact-about">
						<h3 class="text-white"><?= $sys->system_name ?></h3>
						<p class="text-white">Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
						<div class="social-links">
							<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
							<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
							<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
							<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
					<div class="info">
						<div>
							<i class="ri-map-pin-line"></i>
							<p class="text-white">A108 Adam Street<br>New York, NY 535022</p>
						</div>

						<div>
							<i class="ri-mail-send-line"></i>
							<p class="text-white">info@example.com</p>
						</div>

						<div>
							<i class="ri-phone-line"></i>
							<p class="text-white">+1 5589 55488 55s</p>
						</div>

					</div>
				</div>

			</div>

		</div>
	</section><!-- End Contact Section -->
	<!-- ======= Footer ======= -->
	<footer id="footer" class="bg-dark text-light">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-12 text-lg-left text-center">
					<div class="copyright">
						2021 &copy; Copyright <strong><?= $sys->system_name ?></strong>. All Rights Reserved
					</div>
					<div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
					</div>
				</div>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= site_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/aos/aos.js"></script>
	<script src="<?= site_url() ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/purecounter/purecounter.js"></script>
	<script src="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

	<!-- Template Main JS File -->
	<script>
		var SITE_URL = "<?= site_url() ?>";
	</script>
	<script src="<?= site_url() ?>assets/js/main.js"></script>
	<script src="<?= site_url() ?>assets/js/custom.js"></script>
	<script src="<?= site_url() ?>assets/js/customScript.js"></script>

</body>

</html>