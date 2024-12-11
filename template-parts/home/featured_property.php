<section class="space bg-theme" id="nieruchomości">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-9">
                <div class="title-area">
                    <span class="shadow-title">Sprawdź</span>
                    <h2 class="sec-title text-white"> <?php the_sub_field('naglowek') ?></h2>
                    <p class="sec-text text-white"> <?php the_sub_field('subnaglowek') ?></p>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn">
                    <?php echo '<a class="th-btn btn-mask th-btn-icon"  href="' . get_post_type_archive_link('nieruchomosci') . '">Zobacz wszystkie</a>'; ?>
                </div>
            </div>
        </div>

        <?php

        $counter = 1;
        $args = array(
            'post_type' => 'nieruchomosci',
            'posts_per_page' => 4,
        );

        $query = new WP_Query($args); // Poprawiona nazwa klasy na WP_Query

        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post(); ?>

                <div class="property-card-wrap">
                    <div class="property-thumb img-shine" data-mask-src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/property-card1-img-mask.png">
                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('galeria1', array('alt' => get_the_title(), 'class' => '')); ?></a>

                    </div>
                    <div class="property-card">
                        <div class="property-card-number">
                            <?php echo $counter ?> </div>
                        <div class="property-card-details">
                            <span class="property-card-subtitle">Apartment</span>
                            <h4 class="property-card-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                            <p class="property-card-text"> <?php the_field('krotki_opis') ?></p>
                            <div class="property-card-price-meta">
                                <h5 class="property-card-price"><?php echo get_field('cena') ?  the_field('cena') : "Zapytaj o szczegóły"; ?></h5>

                            </div>
                            <div class="property-card-meta">
                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-icon1-1.svg" alt="img"> <?php the_field('ilosc_pokoi') ?></span>
                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-icon1-2.svg" alt="img"> <?php the_field('ilosc_lazienek') ?> </span>
                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/property-icon1-3.svg" alt="img"> <?php the_field('powierzchnia') ?> m²</span>
                            </div>
                            <div class="property-btn-wrap">

                                <a href="<?php the_permalink(); ?>" class="th-btn btn-mask2 th-btn-icon">Szczegóły</a>
                            </div>
                        </div>
                    </div>
                </div>

        <?php $counter++;
            endwhile;

            wp_reset_postdata();
        else : echo "Brak danych";
        endif; ?>




    </div>
</section>