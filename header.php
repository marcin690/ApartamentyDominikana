<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marcinpohl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap.min.css">
	<!-- Fontawesome Icon -->


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<?php wp_head(); ?>
</head>

<body class="bg-smoke">

	<!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->


	<div class="th-menu-wrapper onepage-nav">
		<div class="th-menu-area text-center">
			<button class="th-menu-toggle"><i class="fal fa-times"></i></button>
			<div class="mobile-logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php the_field('logo_white', 'option') ?>" alt="<?php bloginfo('name'); ?>">
				</a>
			</div>
			<div class="th-mobile-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu1', // nazwa z funkcji register_nav_menus
						'menu_class'     => 'main-menu', // Klasa dla stylowania menu
						'container'      => 'ul', // Kontener otaczający menu
						'container_class' => 'menu-container', // Klasa dla kontenera menu
						'fallback_cb'    => false, // Opcja domyślna, gdy menu nie jest ustawione
					)
				);
				?>

			</div>
		</div>
	</div><!--==============================
    Sidemenu
============================== -->
	<div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
		<div class="sidemenu-content">
			<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
			<div class="widget  ">
				<div class="th-widget-about">
					<div class="about-logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php the_field('logo_dark', 'option') ?>" alt="<?php bloginfo('name'); ?>"></a>
					</div>
					<p class="about-text"> <?php echo the_field('opis_stopka', 'option'); ?></p>
				</div>
			</div>
			<div class="widget  ">
				<h3 class="widget_title">Kontakt z nami</h3>
				<div class="th-widget-contact">
					<div class="info-box_text">
						<div class="icon"><img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-dominican-republic-svgrepo-com.svg" alt="Przedstawiciel na Dominikanie"></div>
						<div class="details">
							<h6 class="about-contact-details-title">Kontakt Dominikana</h6>
							<p class="about-contact-details-text"><?php echo the_field('przedstawiciel_na_kubie', 'option'); ?></p>
							<p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?></a></p>
						</div>
					</div>
					<div class="info-box_text pt-4">
						<div class="icon">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-poland-svgrepo-com.svg" alt="Przedstawiciel w Polsce">
						</div>
						<div class="details">
							<h6 class="about-contact-details-title">Kontakt Polska</h6>
							<p class="about-contact-details-text"><?php echo the_field('przedstawiciel_w_polsce', 'option'); ?></p>
							<p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>"><?php echo the_field('numer_telefonu', 'option'); ?></a></p>
						</div>
					</div>

				</div>
			</div>
			<div class="widget newsletter-widget  ">

				<div class="th-social style2">
					<?php
					// Sprawdzamy, czy linki do Facebooka i Instagrama są ustawione
					$facebook_link = get_field('facebook', 'option');
					$instagram_link = get_field('instagram', 'option');

					if ($facebook_link) : ?>
						<a target="_blank" href="<?php echo esc_url($facebook_link); ?>">
							<i class="fab fa-facebook-f"></i>
						</a>
					<?php endif; ?>

					<?php if ($instagram_link) : ?>
						<a target="_blank" href="<?php echo esc_url($instagram_link); ?>">
							<i class="fab fa-instagram"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!--==============================
	Header Area
==============================-->
	<header class="th-header header-layout1">
		<div class="sticky-wrapper">
			<!-- Main Menu Area -->
			<div class="menu-area">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-auto">
							<div class="header-logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php the_field('logo_white', 'option') ?>" style="width: auto; height:40px" alt="<?php bloginfo('name'); ?>">
								</a>
							</div>
						</div>
						<div class="col-auto">
							<nav class="main-menu d-none d-lg-inline-block">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu1', // nazwa z funkcji register_nav_menus
										'menu_class'     => 'main-menu', // Klasa dla stylowania menu
										'container'      => 'ul', // Kontener otaczający menu
										'container_class' => 'menu-container', // Klasa dla kontenera menu
										'fallback_cb'    => false, // Opcja domyślna, gdy menu nie jest ustawione
									)
								);
								?>

							</nav>
							<div class="header-button d-flex d-lg-none">
								<button type="button" class="th-menu-toggle sidebar-btn">
									<span class="line"></span>
									<span class="line"></span>
									<span class="line"></span>
								</button>
							</div>
						</div>
						<div class="col-auto d-none d-xl-block">
							<div class="header-button">
								<a href="<?php echo home_url(); ?>/kontakt" class="th-btn btn-mask th-btn-icon">Kontakt z nami</a>
								<button type="button" class="simple-icon sideMenuInfo sidebar-btn">
									<span class="line"></span>
									<span class="line"></span>
									<span class="line"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</header>