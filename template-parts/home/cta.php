<section class="space-bottom bg-theme overflow-hidden">
    <div class="d-none container">
        <div class="row gy-80 gx-40 align-items-center">
            <div class="col-xl-6">
                <div class="cta-thumb img-shine" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/cta_1_1-img-mask.png">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/Cayo-Levantado2.jpg" alt="img">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="me-xxl-5 pe-xxl-5">
                    <div class="title-area">
                        <span class="shadow-title">Kontakt</span>
                        <h2 class="sec-title text-white"><?php the_sub_field('naglowek') ?></h2>
                        <p class="sec-text text-white"><?php the_sub_field('subnaglowek') ?></p>
                    </div>
                    <div class="btn-wrap">

                        <?php $link = get_sub_field('link') ?>
                        <a href="<?= esc_url($link['url'] ?? '#'); ?>" class="th-btn btn-mask th-btn-icon" target="<?= esc_attr($link['target'] ?? '_self'); ?>">
                            <?= esc_html($link['title'] ?? 'Domyślny tekst'); ?>
                        </a>
                        <a href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>" class="th-btn btn-mask2 th-btn-icon"><?php echo the_field('numer_telefonu', 'option'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="title-area text-center">
            <span class=" text-white sub-title">Kontakt</span>
            <h2 class=" text-white sec-title text-theme"><?php the_sub_field('naglowek') ?></h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-4 col-lg-6">
                <div class="about-contact-grid style2">
                    <div class="about-contact-icon" style="line-height: 0px;">
                        <img style="width: 70px; height:70px ;" src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-poland-svgrepo-com.svg" alt="Przedstawiciel w Poslce">
                    </div>
                    <div class="about-contact-details">
                        <h6 class="about-contact-details-title">Przedstawiciel w Poslce</h6>
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
                        <p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?> (WhatsApp)</a></p>
                        <p class="about-contact-details-text"><a href="mailto:<?php echo the_field('adres_email_dominikana', 'option'); ?>"><?php echo the_field('adres_email_dominikana', 'option'); ?> </a></p>

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
</section>