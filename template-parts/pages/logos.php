<div class="client-area-1 space">
    <div class="container">
        <div class="slider-area client-slider1">
            <div class="swiper th-slider has-shadow" id="clientSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper d-flex justify-content-center align-items-center ">

                    <?php
                    // Pobieramy obrazy z pola galerii ACF
                    $gallery_images = get_field('certyfikaty', 'option'); // 'galeria' to identyfikator pola ACF

                    if ($gallery_images) : ?>
                        <?php foreach ($gallery_images as $image) : ?>


                            <div class="swiper-slide">
                                <div class="client-card">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
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
</div>