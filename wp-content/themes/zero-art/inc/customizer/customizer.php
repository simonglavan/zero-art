<?php
/**
 * KIRKI CUSTOMIZER FRAMEWORK
 */
require get_template_directory() . '/inc/customizer/kirki/kirki.php'; 
/**
 * zero-art Theme Customizer
 *
 * @package zero-art
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zero_art_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'zero_art_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'zero_art_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'zero_art_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zero_art_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zero_art_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zero_art_customize_preview_js() {
	wp_enqueue_script( 'zero-art-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'zero_art_customize_preview_js' );


//KIRKI CONFIG
Kirki::add_config( 'zero_art_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
//END KIRKI CONFIG


//HOMEPAGE SLIDER
include(ABSPATH . 'wp-content/themes/zero-art/inc/customizer/customizer-segments/section-arts.php');
include(ABSPATH . 'wp-content/themes/zero-art/inc/customizer/customizer-segments/section-artists.php');

function customizerStyles() { ?>

<style type="text/css" data-cst-css>



</style>

<?php
}

add_action('wp_head', 'customizerStyles');
