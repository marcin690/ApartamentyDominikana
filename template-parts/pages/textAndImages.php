<div class="overflow-hidden space">
    <div class="sec-bg-shape2-1 spin shape-mockup d-xl-block d-none" data-bottom="25%" data-right="12%">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/section_shape_2_1.jpg" alt="img">
    </div>
    <div class="sec-bg-shape2-1 jump shape-mockup d-xl-block d-none" data-bottom="0%" data-left="5%">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/section_shape_2_3.jpg" alt="img">
    </div>
    <div class="container">
        <div class="about-page-wrap">
            <div class="row gy-40 justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="title-area mb-0">
                        <h2 class="sec-title text-theme mb-2"><?php the_sub_field('naglowek') ?></h2>
                        <div class="mb-0 text-theme"> <?php the_sub_field('opis_1') ?> </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="img-box3">
                        <div class="img1">
                            <img src="<?php the_sub_field('zdjecie') ?>" alt="<?php the_sub_field('naglowek') ?>">
                        </div>
                        <div class="about-tag p-0">




                            <a href="<?php the_field('link_do_yt', 7) ?>" class="play-btn popup-video"><i style="color:black" class="fa-sharp fa-solid fa-play"></i></a>



                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="img-box3">
                        <div class="img1">
                            <img src="<?php the_sub_field('zdjecie_2') ?>" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-0 text-theme"> <?php the_sub_field('opis_2') ?> </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-theme"> <?php the_sub_field('opis_3') ?> </div>
                    <div class="about-wrap2 style-theme mt-50">
                        <div class="checklist style4">
                            <ul>
                                <?php while (have_rows('lista_elementow')) : the_row(); ?>

                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/checkmark.svg" alt="img"><?php the_sub_field('element') ?></li>
                                <?php endwhile; ?>


                            </ul>
                        </div>
                        <div class="call-btn   ">
                            <div class="d-none d-lg-block icon-btn bg-theme">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/phone.svg" alt="img">
                            </div>
                            <div class="row btn-content">
                                <div class="col-lg-12 col-6">
                                    <h6 class="btn-title text-theme">Kontakt Polska</h6>
                                    <span class="btn-text"><a class="text-theme" href="tel:<?php echo the_field('numer_telefonu', 'option'); ?>"><?php echo the_field('numer_telefonu', 'option'); ?></a></span>

                                </div>
                                <div class="pt-lg-3 col-lg-12 col-6">
                                    <h6 class="btn-title text-theme">Kontakt Dominikana</h6>
                                    <span class="btn-text"><a class="text-theme" href="tel:<?php echo the_field('numer_telefonu_kopia', 'option'); ?>"><?php echo the_field('numer_telefonu_kopia', 'option'); ?></a></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-box3">
                        <div class="img1">
                            <img src="<?php the_sub_field('zdjecie_') ?>" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>