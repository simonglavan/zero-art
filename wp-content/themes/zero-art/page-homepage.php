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
 * @package zero-art
 */

get_header(); 

?>
	<main id="site-content" class="site-content">
	<?php do_action('main_inner_before'); ?>
	<?php 
	
	get_template_part('template-parts/content/sections/section_featured-arts');
	get_template_part('template-parts/content/sections/section_featured-artists');
	
	?> 	
	<?php do_action('main_inner_after'); ?>
	</main> <!-- #site-content -->   
<?php
get_footer();
