<?php

/**
 * Plugin Name:       We Boilerplate Highlights
 * Plugin URI:        https://webevolvement.com
 * Description:       Highlights general elements of WE themes with background color.
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      5.2
 * Author:            Simon Glavan
 * Author URI:        https://webevolvement.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       we-boilerplate-highlights
 * Domain Path:       /languages
 */

 function we_boilerplate_highlights_style() {
    wp_register_style('we_boilerplate_style', plugins_url('css/we-boilerplate-highlights.css', __FILE__));
    wp_enqueue_style('we_boilerplate_style');
 }

 add_action('wp_enqueue_scripts', 'we_boilerplate_highlights_style');