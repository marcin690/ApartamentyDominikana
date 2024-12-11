<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marcinpohl
 */

?>

<div class="col-md-6 col-xl-4">
	<div class="property-card2">
		<div class="property-card-thumb img-shine">
			<?php the_post_thumbnail('galeria1', array('alt' => get_the_title(), 'class' => '')); ?>
		</div>
		<div class="property-card-details">
			<div class="media-left">
				<h4 class="property-card-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
				<h5 class="property-card-price"><?php echo get_field('cena') ? the_field('cena') . ' zł' : "Indywiudalna wycena"; ?></h5>
				<p class="property-card-location"><?php the_field('krotki_opis') ?></p>
			</div>
			<div class="btn-wrap">
				<a href="<?php the_permalink(); ?>" class="th-btn style-border2 th-btn-icon">Szczegóły </a>
			</div>
		</div>
	</div>
</div>