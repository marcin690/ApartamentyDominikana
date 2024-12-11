<section class="project-area-1 space overflow-hidden" data-bg-src="<?php echo home_url(); ?>/wp-content/uploads/2024/10/trees-water-sky-sea-outdoor-sand.jpg" data-opacity="5" data-overlay="title">
    <div class="container">
        <div class="project-wrap1">
            <div class="project-number-pagination" data-slider-tab="#projectSlider1">
                <?php
                // Pobierz posty z custom post type region_features
                $args = array(
                    'post_type' => 'region_features',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'region_features_cat',
                            'terms' => 2,
                        ),
                    ),
                );
                $query = new WP_Query($args);
                $counter = 1;

                // Wyświetl numery nawigacji
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="tab-btn <?php echo ($counter === 1) ? 'active' : ''; ?>">
                        <span><?php echo str_pad($counter++, 2, '0', STR_PAD_LEFT); ?></span>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <div class="row gy-40 justify-content-between align-items-center">
                <div class="col-xl-6">
                    <div class="project-title-wrap1">
                        <div class="title-area mb-40">
                            <span class="shadow-title"></span>
                            <h2 class="sec-title text-white"><?php the_sub_field('naglowek'); ?></h2>
                            <p class="sec-text text-white mt-15"><?php the_sub_field('subnaglowek'); ?></p>
                        </div>
                        <div class="btn-wrap">
                            <?php if ($link = get_sub_field('link')): ?>
                                <a class="th-btn btn-mask th-btn-icon" href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target'] ?: '_self'); ?>">
                                    <?= esc_html($link['title']); ?>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="slider-area project-slider1">
                        <div class="swiper th-slider" id="projectSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                            <div class="swiper-wrapper">
                                <?php
                                // Ponownie pobierz posty dla slidera
                                $query = new WP_Query($args);
                                while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="portfolio-card">
                                            <p class="text-white text-center h3 fw-bold"><?php the_title() ?></p>
                                            <div class="portfolio-img img-shine" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/project-card1-img-mask.png" data-bs-toggle="modal" data-bs-target="#portfolioModal" data-post-id="<?php echo get_the_ID(); ?>">


                                                <?php echo get_the_post_thumbnail(null, 'galeria', array('class' => 'custom-class', 'alt' => 'Opis obrazka')); ?>

                                                <!-- <div class="portfolio-card-shape d-flex algin-item-center justify-content-center" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/project-card1-img-mask.png">
                                                    <p class="text-white text-center h3 fw-bold"><?php the_title() ?></p>
                                                </div> -->

                                            </div>
                                            <div class="portfolio-content">
                                                <a href="#portfolioModal" data-bs-toggle="modal" data-bs-target="#portfolioModal" class="icon-btn" data-post-id="<?php echo get_the_ID(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-right.svg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="slider-pagination d-sm-block d-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="th-modal modal fade" id="portfolioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="container">
                <button type="button" class="icon-btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
                <div class="page-single bg-theme">

                    <div class="row gy-30 gx-40 align-items-center">
                        <div class="col-xl-6">
                            <div class="page-img mb-0">
                                <img id="modal-post-image" src="" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <h4 id="modal-post-title" class="box-title text-white fw-medium"></h4>
                            <div class="text-white">
                                <div id="modal-post-content"></div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>