<div class="hero-1" id="hero">
    <div class="swiper th-slider hero-slider1" id="heroSlide1" data-slider-options='{"effect":"fade", "autoHeight": "true"}'>
        <div class="swiper-wrapper">


            <?php while (have_rows('elements_kopia2')) : the_row(); ?>
                <div class="swiper-slide">
                    <div class="hero-inner" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero_1_bg_mask.png">
                        <div class="th-hero-bg" data-bg-src="<?php the_sub_field('zdjecie') ?>"></div>
                        <div class="hero-big-text">Dominikana</div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="hero-style1">
                                        <h2 class="hero-title text-white">
                                            <span class="title1" data-ani="slideindown" data-ani-delay="0.3s">
                                                <?php the_sub_field('naglowek') ?>
                                            </span>
                                        </h2>
                                        <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s"><?php the_sub_field('opis') ?></p>

                                        <?php $link = get_sub_field('przycisk') ?>
                                        <a href="<?= esc_url($link['url'] ?? '#'); ?>" class="th-btn btn-mask th-btn-icon" data-ani="slideinup" data-ani-delay="0.6s" target="<?= esc_attr($link['target'] ?? '_self'); ?>">
                                            <?= esc_html($link['title'] ?? 'Domyślny tekst'); ?>
                                        </a>


                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="hero-video-wrap text-center" data-ani="slideinright" data-ani-delay="0.4s">

                                        <a href="<?php the_field('link_do_yt') ?>" class="play-btn style2 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php endwhile; ?>

        </div>
        <div class="slider-pagination"></div>
    </div>
    <div class="hero-social-link">
        <div class="social-wrap">

            <?php
            $facebook_link = get_field('facebook', 'option');
            $instagram_link = get_field('instagram', 'option');

            if ($facebook_link) : ?>
                <a target="_blank" href="<?php echo esc_url($facebook_link); ?>">FACEBOOK</a>
            <?php endif; ?>

            <?php if ($instagram_link) : ?>
                <a target="_blank" href="<?php echo esc_url($instagram_link); ?>">INSTAGRAM</a>
            <?php endif; ?>


        </div>
        <div class="scroll-down">
            <a href="#about-sec" class="hero-scroll-wrap"><i class="fal fa-long-arrow-left"></i>Przewiń</a>
        </div>
    </div>
</div>