<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marcinpohl
 */

get_header();
get_template_part('template-parts/breadcrumb');
?>


<section class="space-top space-extra-bottom">
	<div class="container">



		<div class="row gy-40">

			<?php if (have_posts()) : ?>


			<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
					get_template_part('template-parts/content', get_post_type());

				endwhile;

				custom_pagination();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>

		</div>


	</div>
</section>


<?php
get_footer();
?>