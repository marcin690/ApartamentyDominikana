<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marcinpohl
 */
if (is_front_page()) {
    get_template_part('template-parts/footer/footerHome');
} else {
    get_template_part('template-parts/footer/footerPages');
}
?>


<!--********************************
			Code End  Here 
	******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>

<!--==============================
    All Js File
============================== -->
<!-- Jquery -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.7.1.min.js"></script>
<!-- Swiper Js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-bundle.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Counter Up -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.counterup.min.js"></script>
<!-- Range Slider -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-ui.min.js"></script>
<!-- Isotope Filter -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js"></script>
<!-- Gsap -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/gsap.min.js"></script>

<!-- Main Js File -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

<?php wp_footer(); ?>

<?php if (is_front_page()) : ?>
    <script>
        jQuery(document).ready(function($) {
            // AJAX call when modal is triggered
            $('.icon-btn, .portfolio-img').on('click', function() {
                var postId = $(this).data('post-id');

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'get_post_details',
                        post_id: postId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update modal with response data
                            $('#modal-post-image').attr('src', response.data.image);
                            $('#modal-post-title').text(response.data.title);
                            $('#modal-post-content').html(response.data.content);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error); // Możesz pozostawić tę linię, aby zobaczyć błędy w konsoli
                    }
                });
            });

            // Usunięcie zawartości po zamknięciu modalu
            $('#portfolioModal').on('hidden.bs.modal', function() {
                $('#modal-post-image').attr('src', ''); // Resetuj obraz
                $('#modal-post-title').text(''); // Resetuj tytuł
                $('#modal-post-content').html(''); // Resetuj zawartość
            });
        });

        const swiper = new Swiper('#clientSlider2', {
            autoplay: {
                delay: 1100,
                disableOnInteraction: false, // Umożliwia kontynuację autoplay po interakcji
            },
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            // Opcja, która zatrzymuje autoplay podczas najechania
            pauseOnMouseEnter: false, // Wyłącza pauzowanie autoplay na najeżdżanie
        });

        // Pobieramy element z klasą .bookly-left
        var booklyLeft = document.querySelector('.bookly-left');

        // Tworzymy nowy element div dla komunikatu
        var confirmationText = document.createElement('div');
        confirmationText.innerHTML = 'Potwierdzam, że zapoznałem się i akceptuję <a href="/polityka-prywatnosci">Politykę Ochrony Danych Osobowych.</a>';

        // Dodajemy styl dla lepszego wyglądu (opcjonalnie)
        confirmationText.style.marginBottom = '10px';

        // Dodajemy nowy element jako pierwszy element wewnątrz .bookly-left
        if (booklyLeft) {
            booklyLeft.insertBefore(confirmationText, booklyLeft.firstChild);
        }
    </script>
    <style>
        .client-card {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            /* Ustaw szerokość na 300px */
            height: auto;
            /* Możesz ustawić stałą wysokość, jeśli potrzebujesz */
            opacity: 0;
            transition: opacity 0.5s ease;
            /* Efekt fade */
        }

        .swiper-slide-active .client-card {
            opacity: 1;
            /* Aktywny slajd jest widoczny */
        }
    </style>
<?php endif; ?>

</body>

</html>