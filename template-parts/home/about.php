<div class="overflow-hidden space bg-smoke" id="about-sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <div class="title-area">
                    <span class="shadow-title style2">O nas</span>
                    <h2 class="sec-title "><?php the_sub_field('naglowek') ?></h2>
                    <p class="sec-text "><?php the_sub_field('opis') ?></p>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="sec-btn">

                    <?php if ($link = get_sub_field('link')): ?>
                        <a class="th-btn btn-mask th-btn-icon" href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target'] ?: '_self'); ?>">
                            <?= esc_html($link['title']); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="img-box1">
                    <div class="img1 img-shine" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/about-1-mask.png">
                        <a class="popup-video" href="<?php echo home_url(); ?>/wp-content/uploads/2024/10/Willa-w-Marabelli-wykonczenie-wnetrza-przez-Aldom-Company.mp4">
                            <video muted loop autoplay>
                                <source src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/Willa-w-Marabelli-wykonczenie-wnetrza-przez-Aldom-Company.mp4" type="video/mp4">
                                Twoja przeglądarka nie obsługuje wideo.
                            </video>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img-box1">
                    <div class="img1 img-shine" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/about-1-mask.png">
                        <a class="popup-video" href="<?php echo home_url(); ?>/wp-content/uploads/2024/10/Aldom-Company-Poznaj-nasza-firme.mp4">
                            <video muted loop autoplay>
                                <source src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/Aldom-Company-Poznaj-nasza-firme.mp4" type="video/mp4">
                                Twoja przeglądarka nie obsługuje wideo.
                            </video>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="mt-60">
            <div class="row gy-40 flex-row-reverse">
                <div class="col-xl-3 text-xl-end">
                    <div class="slider-area client-slider1">
                        <div class="swiper " id="clientSlider2" data-slider-options='{
  "autoplay": {"delay": 1500}, 
  "loop": true,
  "breakpoints": {
    "640": {
      "slidesPerView": 2,
      "spaceBetween": 10
    },
    "768": {
      "slidesPerView": 2,
      "spaceBetween": 20
    },
    "1024": {
      "slidesPerView": 1,
      "spaceBetween": 30
    }
  }
}'>
                            <div class="swiper-wrapper ">

                                <?php
                                // Pobieramy obrazy z pola galerii ACF
                                $gallery_images = get_field('certyfikaty', 'option'); // 'certyfikaty' to identyfikator pola ACF

                                if ($gallery_images) : ?>
                                    <?php foreach ($gallery_images as $image) : ?>
                                        <div class="swiper-slide  d-flex justify-content-center align-items-center ">
                                            <div class="client-card fade d-flex justify-content-center align-items-center">
                                                <img class="p-3 w-100" src="<?php echo esc_url($image['url']); ?>" style="width:auto; max-width: 220px" alt="<?php echo esc_attr($image['alt']); ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>Nie znaleziono żadnych obrazów w galerii.</p>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="about-wrap1">
                        <p class="text-dark about-text "><?php the_sub_field('subnaglowek') ?></p>
                        <div class="btn-wrap pt-4">
                            <a class="th-btn btn-mask th-btn-icon" href="<?php echo home_url(); ?>/o-nas/" target="_self">
                                Więcej o nas </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<section class="service-area-1 overflow-hidden space-bottom bg-theme pt-80 " id="service-sec">
    <div class="container">
        <div class="row gy-40">


            <?php if (have_rows('elements_kopia')) : ?>
                <?php while (have_rows('elements_kopia')) : the_row(); ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <div class="service-card-icon">
                                <div class="icon">
                                    <img src="<?php the_sub_field('zdjecie') ?>" alt="<?php the_sub_field('naglowek') ?>">
                                </div>
                            </div>
                            <div class="box-content">
                                <h3 class=" box-title text-white"> <?php the_sub_field('naglowek') ?></h3>
                                <p class=" box-text"> <?php the_sub_field('subnaglowek') ?></p>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>