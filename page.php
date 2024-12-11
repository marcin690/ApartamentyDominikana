<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marcinpohl
 */

get_header();
get_template_part('template-parts/breadcrumb');
?>

<?php if (get_the_content()) : ?>
	<section class="th-blog-wrapper blog-details overflow-hidden space-top space-extra-bottom">
		<div class="container">
			<div class=" d-flex justify-content-center align-items-center">
				<div class="col-lg-9 th-blog blog-single mb-0 ">
					<div class="blog-img">
						<?php the_post_thumbnail('single', array('alt' => get_the_title(), 'class' => '')); ?>
					</div>
					<?php the_content() ?>
				</div>
			</div>

		</div>

	</section>
<?php endif; ?>
<?php if (have_rows('moduly')): ?>
	<?php while (have_rows('moduly')) : the_row(); ?>

		<?php if (get_row_layout() == 'slider'): ?>
			<!-- Kod dla layout1 -->
			<div><?php get_template_part('template-parts/pages/textAndImages'); ?></div>

		<?php elseif (get_row_layout() == 'cechy'): ?>
			<!-- Kod dla layout2 -->
			<div><?php get_template_part('template-parts/pages/features'); ?></div>

		<?php elseif (get_row_layout() == 'certyfikaty'): ?>
			<!-- Kod dla layout2 -->
			<div><?php get_template_part('template-parts/pages/logos'); ?></div>

		<?php elseif (get_row_layout() == 'faq'): ?>
			<!-- Kod dla layout2 -->
			<div><?php get_template_part('template-parts/pages/faq'); ?></div>

		<?php endif; ?>




	<?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
