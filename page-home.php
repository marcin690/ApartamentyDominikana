<?php /* Template Name: Strona główna */ ?>
<?php get_header(); ?>


<!--==============================
Hero Area
==============================-->

<?php if (have_rows('moduly')): ?>
    <?php while (have_rows('moduly')) : the_row(); ?>

        <?php if (get_row_layout() == 'slider'): ?>

            <?php get_template_part('template-parts/home/slider'); ?>
            <!-- Kod dla layout1 -->


        <?php elseif (get_row_layout() == 'o_nas'): ?>
            <!-- Kod dla layout2 -->
            <?php get_template_part('template-parts/home/about'); ?>

        <?php elseif (get_row_layout() == 'dlaczego_dominikana'): ?>
            <!-- Kod dla layout2 -->
            <?php get_template_part('template-parts/home/why_dominicana'); ?>

        <?php elseif (get_row_layout() == 'featured_property'): ?>
            <!-- Kod dla layout2 -->
            <?php get_template_part('template-parts/home/featured_property'); ?>

        <?php elseif (get_row_layout() == 'region'): ?>
            <!-- Kod dla layout2 -->
            <?php get_template_part('template-parts/home/region'); ?>

        <?php elseif (get_row_layout() == 'cta'): ?>
            <!-- Kod dla layout2 -->
            <?php get_template_part('template-parts/home/cta'); ?>




        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>