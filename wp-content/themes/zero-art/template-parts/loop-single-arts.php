<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zero-art
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-art'); ?>>
	<div class="row">

		<div class="col-12 col-lg-6 mb-30 mb-lg-0 d-flex align-items-center justify-content-center column column-1">
			<div class="column-inner column-1 inner">
			<?php zero_art_post_thumbnail(); ?>
			</div> <!-- .column-inner -->
		</div> <!-- .column -->

		<div class="col-12 col-lg-6 d-flex justify-content-start column column-2">
			<div class="column__inner column-2__inner ml-lg-95">
				<header class="entry-header single-art__header">
					<?php the_title('<h1 class="single-art__title">', '</h1>');
					$artist = get_field('_artist');
					?>
					<h2 class="single-art__artist"><?php echo $artist[0]->post_title ?></h2>
				</header><!-- .entry-header -->

				<div class="single-art__general-info">
				<p class="single-art__type-and-year mb-0"><?php the_field('painting_technique'); ?>, <?php the_field('year'); ?></p>
				<p class="single-art__canvas mb-0"><?php the_field('canvas'); ?></p>
				<p class="single-art__size mb-0"><?php the_field('dimensions'); ?></p>
				</div> <!-- .single-art__general-info -->

				<div class="single-art__description mt-25 mb-30">
					<p><?php the_field('description') ?></p>
				</div> <!-- .single-art__description -->

				<div class="single-art__product-info pt-25">

				<div class="single-art__price mb-15">
					<span class="single-art__price-currency-sign pr-5">
						<?php echo get_woocommerce_currency_symbol(); ?>
					</span>
					<span class="single-art__price-number">
						<?php the_field('_price'); ?>
					</span>
				</div> <!-- .single-art__price -->

				<div class="single-art__shipping-info">

					<?php 
					$item_location = get_field('item_location');
					?>

					<p class="single-art__shipping-from mb-10">
						<?php _e('Ships from' . ' ' . $item_location['city'] . ', ' . $item_location['state_short'] . ', ' . $item_location['country']) ?>
					</p>
					<p class="single-art__shipping-time">
						<?php _e('Estimated to ship in 3 - 7 days within USA') ?>
					</p> 

					<form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
					<button type="submit" name="add-to-cart" value="<?php echo get_the_ID() ?>" class="single_add_to_cart_button button alt mb-20">Add to cart</button>
					</form>


					<p class="single-art__taxes-shipping-fees-info">
						<?php _e('Taxes and shipping fees will apply upon checkout') ?>
					</p>

				</div> <!-- .single-art__shipping-info --> 

				</div> <!-- .single-art__product-info -->

			</div> <!-- .column-inner -->
		</div> <!-- .column -->

	</div> <!-- .row -->

	<footer class="entry-footer">
		<?php zero_art_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
