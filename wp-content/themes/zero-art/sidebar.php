<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zero-art
 */


?>

<aside id="secondary" class="site-content__secondary aside aside-secondary site-content__aside site-content__aside-secondary col-12 col-lg-3">
	<div class="site-content__secondary-inner aside__inner aside-secondary__inner">
		<?php 
			do_action('aside-inner-before'); 
			if ( is_active_sidebar( 'sidebar-1' ) ) {
		?>
			<div class="widget-area aside__widget-area aside-secondary__widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div> <!-- .widget-area -->
		<?php 
		}
			do_action('aside-inner-after'); 
		?>
	</div> <!-- .aside__inner -->
</aside><!-- #secondary -->

