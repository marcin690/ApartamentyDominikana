<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package marcinpohl
 */

get_header();
get_template_part('template-parts/breadcrumb');
$location = get_field('adres'); // Zmień 'nazwa_pola_google_maps' na właściwą nazwę swojego pola ACF
?>


<style>
	.wpcf7-form-control.wpcf7-acceptance.optional label {

		color: #949494;
		user-select: none;
		font-size: 13px;
		line-height: 16px;
		/* Zapobiega zaznaczaniu tekstu podczas klikania */
	}

	.wpcf7-form-control.wpcf7-acceptance.optional a {

		color: #949494;


	}

	.property-slider-img img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* zapewnia, że obraz zostanie przycięty odpowiednio do kontenera */
	}
</style>
<section class="space-top space-extra-bottom">
	<div class="container">
		<div class="slider-area property-slider1">
			<div class="swiper th-slider mb-4" id="propertySlider" data-slider-options='{"effect":"fade","loop":true,"thumbs":{"swiper":".property-thumb-slider"},"autoplayDisableOnInteraction":"true"}'>
				<div class="swiper-wrapper">
					<?php
					// Wyświetlenie miniatury posta jako pierwszego obrazu
					if (has_post_thumbnail()) {
						// Pobierz miniaturę w rozmiarze 'galeria'
						$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'galeria');
						// Pobierz większy obraz dla Lightboxa w rozmiarze 'large'
						$large_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
						echo '<div class="swiper-slide">
                    <div class="property-slider-img">
                        <a href="' . esc_url($large_url) . '" class="popup-link">
                            <img src="' . esc_url($thumbnail_url) . '" alt="Thumbnail" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>';
					}

					// Pobranie obrazów z pola ACF 'galeria'
					$gallery = get_field('galeria'); // 'galeria' to nazwa pola ACF

					// Sprawdzenie, czy galeria nie jest pusta
					if ($gallery) {
						foreach ($gallery as $image) {
							// Pobierz URL obrazu w rozmiarze 'galeria'
							$image_url = wp_get_attachment_image_src($image['ID'], 'galeria')[0];
							// Pobierz większy obraz dla Lightboxa w rozmiarze 'large'
							$large_image_url = wp_get_attachment_image_src($image['ID'], 'large')[0];
							echo '<div class="swiper-slide">
                        <div class="property-slider-img">
                            <a href="' . esc_url($large_image_url) . '" class="popup-link">
                                <img src="' . esc_url($image_url) . '" alt="Gallery Image" style="width: 100%; height: auto;">
                            </a>
                        </div>
                    </div>';
						}
					}
					?>
				</div>
			</div>

			<div class="swiper th-slider property-thumb-slider" data-slider-options='{"effect":"slide","loop":true,"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":3},"992":{"slidesPerView":3},"1200":{"slidesPerView":4}},"autoplayDisableOnInteraction":"true"}'>
				<div class="swiper-wrapper">
					<?php
					// Ponowne wyświetlenie miniatury i obrazów w sliderze z miniaturami
					if (has_post_thumbnail()) {
						$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'galeria'); // Pobierz miniaturę w rozmiarze 'galeria'
						echo '<div class="swiper-slide">
                    <div class="property-slider-img">
                        <img src="' . esc_url($thumbnail_url) . '" alt="Thumbnail" style="width: 100%; height: auto;">
                    </div>
                </div>';
					}

					if ($gallery) {
						foreach ($gallery as $image) {
							// Pobierz URL obrazu w rozmiarze 'galeria' dla miniatur
							$image_url = wp_get_attachment_image_src($image['ID'], 'galeria')[0];
							echo '<div class="swiper-slide">
                        <div class="property-slider-img">
                            <img src="' . esc_url($image_url) . '" alt="Gallery Image" style="width: 100%; height: auto;">
                        </div>
                    </div>';
						}
					}
					?>
				</div>
			</div>

			<button data-slider-prev="#propertySlider" class="slider-arrow style3 slider-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-left.svg" alt="icon"></button>
			<button data-slider-next="#propertySlider" class="slider-arrow style3 slider-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-right.svg" alt="icon"></button>
		</div>



		<div class="row gx-30">
			<div class="col-xxl-8 col-lg-7">
				<div class="property-page-single">
					<div class="page-content">

						<h2 class="page-title">Dowiedz się więcej o nieruchomości</h2>
						<p class="mb-30"><?php the_field('krotki_opis') ?></p>
						<p class="mb-30"><?php the_content() ?></p>
						<h2 class="page-title mb-20">Przegląd</h2>
						<ul class="property-grid-list">
							<li>
								<div class="property-grid-list-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-single-icon1-1.svg" alt="img">
								</div>
								<div class="property-grid-list-details">
									<h4 class="property-grid-list-title">Numer ogłoszenia</h4>
									<p class="property-grid-list-text"><?php echo get_the_id() ?></p>
								</div>
							</li>
							<li>
								<div class="property-grid-list-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-single-icon1-2.svg" alt="img">
								</div>
								<div class="property-grid-list-details">
									<h4 class="property-grid-list-title">Typ</h4>
									<p class="property-grid-list-text"> <?php
																		// Pobierz wszystkie taksonomie przypisane do posta
																		$taxonomies = get_object_taxonomies(get_post_type(), 'objects');

																		if (! empty($taxonomies)) {
																			foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
																				// Pobierz terminy przypisane do posta w tej taksonomii
																				$terms = get_the_terms(get_the_ID(), $taxonomy_slug);

																				if (! empty($terms) && ! is_wp_error($terms)) {
																					foreach ($terms as $term) {
																						$term_link = get_term_link($term);
																						if (! is_wp_error($term_link)) {
																							echo '<a class="text-white" href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
																						}
																					}
																				} else {
																					echo 'Nieokreślony';
																				}
																			}
																		} else {
																			echo 'Brak przypisanych taksonomii.';
																		}
																		?></p>
								</div>
							</li>
							<li>
								<div class="property-grid-list-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-single-icon1-3.svg" alt="img">
								</div>
								<div class="property-grid-list-details">
									<h4 class="property-grid-list-title">Pokoje</h4>
									<p class="property-grid-list-text"><?php the_field('ilosc_pokoi') ?></p>
								</div>
							</li>

							<li>
								<div class="property-grid-list-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-single-icon1-5.svg" alt="img">
								</div>
								<div class="property-grid-list-details">
									<h4 class="property-grid-list-title">Łazienki</h4>
									<p class="property-grid-list-text"><?php the_field('ilosc_lazienek') ?></p>
								</div>
							</li>

							<li>
								<div class="property-grid-list-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-single-icon1-7.svg" alt="img">
								</div>
								<div class="property-grid-list-details">
									<h4 class="property-grid-list-title">Ilość metrów</h4>
									<p class="property-grid-list-text"><?php the_field('powierzchnia') ?> m2</p>
								</div>
							</li>


						</ul>

						<h3 class="page-title mt-50 mb-25">Co wyróżnia inwestycję? </h3>

						<div class="checklist">
							<ul>

								<?php
								// Pobranie zaznaczonych wartości z pola ACF
								$selected_choices = get_field('cechy'); // 'wybory' to nazwa pola ACF

								// Sprawdzenie, czy pole nie jest puste
								if ($selected_choices) {
									echo '<ul class="selected-choices">'; // Możesz dodać własną klasę CSS

									// Iteracja przez zaznaczone wybory
									foreach ($selected_choices as $choice) {
										echo '<li><i class="far fa-square-check"></i>' . esc_html($choice) . '</li>'; // Wyświetlanie każdego zaznaczonego wyboru
									}

									echo '</ul>';
								} else {
									echo '<p>Brak zaznaczonych opcji.</p>'; // Informacja, gdy brak zaznaczeń
								}
								?>
							</ul>


						</div>

						<h3 class="page-title mt-45 mb-30">Lokalizacja</h3>
						<div class="location-map">
							<div class="contact-map">
								<?php
								$map_code = get_field('mapa');
								if ($map_code) {
									echo $map_code;
								}
								?>
							</div>
							<div class="location-map-address">
								<div class="thumb">
									<?php echo get_the_post_thumbnail(); ?>
								</div>
								<div class="media-body">
									<h4 class="title">Adres</h4>
									<p class="text"> <?php the_field('adres') ?></p>

								</div>
							</div>
						</div>

						<?php if (get_field('rzut_mieszkania')): ?>
							<div class="row align-items-center justify-content-between">
								<div class="col-lg-auto">
									<h3 class="page-title mt-50 mb-30">Układ mieszkania</h3>
									<div class="property-grid-plan " style="max-width: 100%;">
										<div class="property-grid-thumb" style="max-width: 100%;">
											<a class=" popup-video" href="<?php the_field('rzut_mieszkania') ?>"> <img src="<?php the_field('rzut_mieszkania') ?>" class="imf-fluid" alt="Układ nieruchomości"></a>

										</div>

									</div>
								</div>

							</div>
						<?php endif; ?>

						<?php if (get_field('video')): ?>
							<h3 class="page-title mt-50 mb-30">Zaobacz film</h3>
							<div class="video-box2 mb-30">
								<?php the_field('video') ?>
							</div>
						<?php endif; ?>


					</div>
				</div>
			</div>
			<div class="col-xxl-4 col-lg-5">
				<aside class="sidebar-area">
					<div class="widget widget-property-contact">
						<h4 class="widget_subtitle"><?php
													// Pobierz wszystkie taksonomie przypisane do posta
													$taxonomies = get_object_taxonomies(get_post_type(), 'objects');

													if (! empty($taxonomies)) {
														foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
															// Pobierz terminy przypisane do posta w tej taksonomii
															$terms = get_the_terms(get_the_ID(), $taxonomy_slug);

															if (! empty($terms) && ! is_wp_error($terms)) {
																foreach ($terms as $term) {
																	$term_link = get_term_link($term);
																	if (! is_wp_error($term_link)) {
																		echo '<a class="text-white" href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
																	}
																}
															} else {
																echo 'Nieokreślony';
															}
														}
													} else {
														echo 'Brak przypisanych taksonomii.';
													}
													?></h4>
						<h4 class="widget_price">
							<?php echo get_field('cena') ?  the_field('cena') : "Indywiudalna wycena"; ?>

						</h4>
						<p class="widget_text">Zapytaj o nieruchomość</p>
						<?php echo do_shortcode('[contact-form-7 id="a381ec1" title="Formularz 1"]') ?>
					</div>
					<div class="widget">
						<h3 class="widget_title">Pozostałe oferty</h3>
						<div class="recent-post-wrap">
							<?php
							// Definiujemy argumenty do zapytania
							$args = array(
								'post_type'      => 'nieruchomosci', // Typ postu
								'posts_per_page' => 4, // Liczba wpisów do wyświetlenia
								'post_status'    => 'publish', // Tylko opublikowane posty
								'orderby'        => 'date', // Sortowanie po dacie
								'order'          => 'DESC', // Od najnowszych
							);

							// Tworzymy nowe zapytanie WP_Query
							$query = new WP_Query($args);

							// Sprawdzamy, czy są dostępne wpisy
							if ($query->have_posts()) :
								// Pętla po wpisach
								while ($query->have_posts()) : $query->the_post(); ?>
									<div class="recent-post">
										<div class="media-img">
											<a href="<?php the_permalink(); ?>">
												<?php if (has_post_thumbnail()) : ?>
													<?php the_post_thumbnail('thumbnail'); // Wyświetla miniaturę wpisu 
													?>
												<?php else : ?>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/recent-post-1-1.jpg" alt="Domyślny obrazek">
												<?php endif; ?>
											</a>
										</div>
										<div class="media-body">
											<h4 class="post-title">
												<a class="text-inherit" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h4>
											<div class="recent-post-meta">
												<a href="<?php the_permalink(); ?>"><i class="fa-sharp fa-light fa-arrows-maximize"></i> <?php the_field('powierzchnia')  ?> m², <?php the_field('ilosc_pokoi')  ?> pokoje</a>
											</div>
										</div>
									</div>
								<?php endwhile;
								wp_reset_postdata(); // Resetujemy dane zapytania
							else : ?>
								<p>Brak podobnych ofert.</p>
							<?php endif; ?>
						</div>
					</div>

					<div class="widget widget_banner  " data-bg-src="<?php echo home_url(); ?>/wp-content/uploads/2024/09/dominikana2.jpg">
						<div class="widget-banner text-center">
							<h3 class="title">Masz pytania?</h3>
							<div class="logo"><img src="<?php echo the_field('logo_dark', 'option'); ?>" width="120px" alt="<?php echo get_bloginfo('name'); ?>"></div>
							<h4 class="subtitle pb-3">Zadzwoń do nas</h4>
							<h5 class="link"><a href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>"><?php echo the_field('numer_telefonu', 'option'); ?> <img width="20px" src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-poland-svgrepo-com.svg" alt="Przedstawiciel w Polsce"> </h5>
							<h5 class="link"><a href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?></a>
								<img width="20px" src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-dominican-republic-svgrepo-com.svg" alt="Przedstawiciel na Dominikanie"> <br> <span class="text-white"> (WhatsApp) </span>
							</h5>

							<a href="<?php echo home_url(); ?>/kontakt" class="th-btn style-border th-btn-icon">Kontakt</a>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>

<script>
	$(document).ready(function() {
		$('.popup-link').magnificPopup({
			type: 'image'
		});
	});
</script>