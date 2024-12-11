<div class="why-sec-1 overflow-hidden space bg-theme">
    <div class="sec-bg-shape2-1 text-white spin shape-mockup d-xl-block d-none" data-bottom="15%" data-left="12%">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/section_shape_2_1.jpg" alt="img">
    </div>
    <div class="sec-bg-shape2-3 text-white jump shape-mockup d-xl-block d-none" data-bottom="0%" data-right="7%">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/section_shape_2_3.jpg" alt="img">
    </div>
    <div class="container">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-lg-6">
                <div class="title-area">
                    <h2 class="sec-title text-white"><?php the_sub_field('nazwa') ?></h2>
                    <div class="text-light"><?php the_sub_field('nazwa') ?></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn">


                    <?php if ($link = get_sub_field('przycisk')): ?>
                        <a class="th-btn style-border th-btn-icon" href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target'] ?: '_self'); ?>">
                            <?= esc_html($link['title']); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="swiper th-slider" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
            <div class="swiper-wrapper">


                <?php if (have_rows('lista_elementow')) : ?>
                    <?php while (have_rows('lista_elementow')) : the_row(); ?>

                        <div class="swiper-slide">
                            <div class="service-card style4">
                                <div class="service-card-icon">
                                    <img width="40px" src="<?php the_sub_field('ikona') ?>" alt="<?php the_sub_field('element') ?>">
                                </div>
                                <h3 class="box-title text-white"><?php the_sub_field('element') ?></h3>
                                <p class="box-text  text-white" style="height: 80px;"><?php the_sub_field('opis') ?></p>
                                <div class="service-img img-shine">
                                    <img src="<?php echo wp_get_attachment_image_src(get_sub_field('obrazek'), 'galeria1')[0]; ?>" alt="">


                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>