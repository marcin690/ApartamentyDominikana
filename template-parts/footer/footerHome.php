<footer class="footer-wrapper footer-layout1 bg-theme">
    <div class="footer-wrap bg-smoke" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/footer-bg-mask.png">
        <div class="widget-area space">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-4">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="<?php echo home_url(); ?>"><img src="<?php echo the_field('logo_dark', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
                                </div>
                                <p class="about-text">
                                    <?php echo the_field('opis_stopka', 'option'); ?></p>
                                <div class="th-social style3">
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
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Kontakt</h3>
                            <div class="th-widget-contact">
                                <div class="info-box_text">
                                    <div class="icon"><img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-dominican-republic-svgrepo-com.svg" alt="Przedstawiciel na Dominikanie"></div>
                                    <div class="details">
                                        <h6 class="about-contact-details-title">Kontakt w Dominikanie </h6>
                                        <p class="about-contact-details-text"><?php echo the_field('przedstawiciel_na_kubie', 'option'); ?></p>
                                        <p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?> (WhatsApp)</a></p>
                                    </div>
                                </div>
                                <div class="info-box_text pt-4">
                                    <div class="icon">
                                        <img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/flag-for-poland-svgrepo-com.svg" alt="Przedstawiciel w Polsce">
                                    </div>
                                    <div class="details">
                                        <h6 class="about-contact-details-title">Kontakt w Polsce</h6>
                                        <p class="about-contact-details-text"><?php echo the_field('przedstawiciel_w_polsce', 'option'); ?></p>
                                        <p class="about-contact-details-text"><a href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>"><?php echo the_field('numer_telefonu', 'option'); ?></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Wyróżnione oferty</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php


                                    $args = array(
                                        'post_type' => 'nieruchomosci',
                                        'posts_per_page' => 4,
                                    );

                                    $query = new WP_Query($args); // Poprawiona nazwa klasy na WP_Query

                                    if ($query->have_posts()) :

                                        while ($query->have_posts()) : $query->the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>


                                    <?php
                                        endwhile;

                                        wp_reset_postdata();
                                    else : echo "Brak danych";
                                    endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Nawigacja</h3>
                            <div class="menu-all-pages-container">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu-1',
                                ));
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-lg-6">
                        <p class="copyright-text">
                            Copyright <i class="fal fa-copyright"></i> <?php echo date('Y') ?> All rights reserved. | <a taeget="_blank" href="https://marcinpohl.pl/">Realizcja MP</a></p>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="footer-links">
                            <ul>
                                <li><a href="<?php echo home_url(); ?>/polityka-prywatnosci/">Polityka prywatności</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>