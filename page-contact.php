<?php

/**
 * Template name: Kontakt
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marcinpohl
 */

get_header();
get_template_part('template-parts/breadcrumb');
?>

<div class="space">
    <div class="container">

        <div class="row gy-4 justify-content-center">
            <div class="col-xl-4 col-lg-6">
                <div class="about-contact-grid style2">
                    <div class="about-contact-icon" style="line-height: 0px;">
                        <img style="width: 70px; height:70px ;" src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-poland-svgrepo-com.svg" alt="Przedstawiciel w Poslce">
                    </div>
                    <div class="about-contact-details">
                        <h6 class="about-contact-details-title">Przedstawiciel w Polsce</h6>
                        <p class="about-contact-details-text"><?php echo the_field('przedstawiciel_w_polsce', 'option'); ?></p>
                        <p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>"><?php echo the_field('numer_telefonu', 'option'); ?></a></p>
                        <p class="about-contact-details-text"><a href="mailto:<?php echo the_field('adres_email', 'option'); ?>"><?php echo the_field('adres_email', 'option'); ?></a></p>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="about-contact-grid style2">
                    <div class="about-contact-icon" style="line-height: 0px;">
                        <img style="width: 70px; height:70px ;" src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-dominican-republic-svgrepo-com.svg" alt="Przedstawiciel na Dominikanie">
                    </div>
                    <div class="about-contact-details">
                        <h6 class="about-contact-details-title">Przedstawiciel na Dominikanie</h6>
                        <p class="about-contact-details-text"><?php echo the_field('przedstawiciel_na_kubie', 'option'); ?></p>
                        <p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?></a></p>
                        <p class="about-contact-details-text"><a href="mailto:<?php echo the_field('adres_email_dominikana', 'option'); ?>"><?php echo the_field('adres_email_dominikana', 'option'); ?></a></p>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="about-contact-grid style2">
                    <div class="about-contact-icon">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="about-contact-details">
                        <h6 class="about-contact-details-title">Aldom Company</h6>
                        <p class="about-contact-details-text">NIP: <?php echo the_field('nip', 'option'); ?></p>
                        <p class="about-contact-details-text"><?php echo the_field('adres', 'option'); ?></p>

                    </div>
                </div>
            </div>


        </div>


        <div class="pt-5 ">
            <div class=" appointment-wrap2 bg-white ">
                <h2 class="text-dark pb-2">Wyślij wiadomość</h2>
                <?php echo do_shortcode('[contact-form-7 id="c7bed95" title="Zapytaj o nieruchomość_copy"]') ?>
            </div>

        </div>
    </div>
</div>

<?php
get_footer();
