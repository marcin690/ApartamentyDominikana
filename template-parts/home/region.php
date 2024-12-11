    <section class="test1 space overflow-hidden">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="title-area text-center">
                        <span class="shadow-title style2">Region</span>
                        <h2 class="sec-title"> <?php the_sub_field('naglowek') ?></h2>
                        <p class="sec-text text-title"> <?php the_sub_field('subnaglowek') ?></p>
                    </div>
                </div>
            </div>
            <div class="swiper th-slider aminities-slider" id="aminitiesSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"375":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper">



                    <?php if (have_rows('elements_kopia')) : ?>
                        <?php while (have_rows('elements_kopia')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="aminities-card" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/theme-img/aminities-shape1.png">
                                    <div class="aminities-card-img">
                                        <img src="<?php echo wp_get_attachment_image_src(get_sub_field('zdjecie'), 'wyroznik')[0]; ?>" alt="<?php the_sub_field('naglowek'); ?>" alt="<?php the_sub_field('naglowek') ?>">
                                    </div>
                                    <div class="aminities-content">
                                        <div class="aminities-card-icon">
                                            <img style="width: 50px; height: 50px;" src="<?php the_sub_field('ikona') ?>" alt="<?php the_sub_field('naglowek') ?>">
                                        </div>
                                        <h3 class="box-title"><?php the_sub_field('naglowek') ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>



                </div>
                <div class="slider-pagination"></div>
                <button data-slider-prev="#aminitiesSlider1" class="slider-arrow slider-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-left.svg" alt="icon"></button>
                <button data-slider-next="#aminitiesSlider1" class="slider-arrow slider-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-right.svg" alt="icon"></button>
            </div>

        </div>
    </section>

    <div class="test2 container">
        <div class="video-area-1 ">
            <div class="video-wrap1">
                <div class="video-box1">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/region2.jpg" alt="img">
                    <a href="<?php the_field('link_do_yt') ?>" class="play-btn style3 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                </div>
                <div class="video-wrap-details">
                    <div class="title-area mb-45">
                        <h2 class="sec-title"> <?php the_sub_field('naglowek_2') ?></h2>
                        <p class="sec-text text-title"> <?php the_sub_field('opis') ?></p>
                    </div>
                    <div class="btn-wrap mb-55">

                        <?php echo '<a class="th-btn style2 btn-mask th-btn-icon"  href="' . get_post_type_archive_link('nieruchomoci') . '">Zobacz nieruchomości</a>'; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="team-area-1 space-bottom">
        <div class="container z-index-common">

        </div>
    </section>