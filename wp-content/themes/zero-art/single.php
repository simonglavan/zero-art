<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zero-art
 */

get_header();
?>

<main id="site-content" class="site-content">
<?php do_action('main_inner_before'); ?>
	<?php
	get_template_part('template-parts/content/single/section-main');
	?>
	<?php do_action('main_inner_after'); ?>
</main> <!-- #site-content.site-content -->

<?php

get_footer();
