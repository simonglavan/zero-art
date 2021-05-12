<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package zero-art
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$zero_art_unique_id = wp_unique_id( 'search-form-' );

$zero_art_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $zero_art_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form__label" for="<?php echo esc_attr( $zero_art_unique_id ); ?>"><?php _e( 'Search&hellip;', 'zero_art' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
	<input type="search" id="<?php echo esc_attr( $zero_art_unique_id ); ?>" class="search-field search-form__field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Search site...', 'zero-art' ); ?>" />
	<input type="submit" class="search-submit search-form__submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'zero_art' ); ?>" />
</form>
