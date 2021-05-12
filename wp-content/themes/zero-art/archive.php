<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zero-art
 */

get_header();
?>

	<main id="site-content" class="site-content">
	<?php do_action('main_inner_before'); ?>
		<?php
		//SECTIONS
		get_template_part( 'template-parts/content/archive/section-archive-main');
		?>
	<?php do_action('main_inner_after'); ?>	
	</main><!-- #site-content -->

<?php
//get_sidebar();
get_footer();
