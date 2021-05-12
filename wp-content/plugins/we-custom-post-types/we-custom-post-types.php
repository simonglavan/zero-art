<?php
/*
Plugin Name: Custom Post Types
Plugin URI: https://zeromolecule.com
Description: Custom Post Types
Version: 1.0
Author: Sime Glavan
Author URI: https://zeromolecule.com
Text Domain: zacpt
Domain Path: /languages
*/

if ( ! function_exists('za_custom_post_types') ) {

    // Register Custom Post Type
    function za_custom_post_types() {
    
        require 'post-types/arts.php';  
        require 'post-types/artists.php';  

    }
        
    add_action( 'init', 'za_custom_post_types', 0 );
    
}

//CUSTOM MENU ORDER
function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'upload.php', // Media
        'separator1', // First separator
        'edit.php', // Posts
        'separator2', // Second separator
        'edit.php?post_type=projects', // Projects
        'edit.php?post_type=homes', // Homes
        'edit.php?post_type=work_places', // Work places
        'edit.php?post_type=academies', // Academies
        'edit.php?post_type=communities', // Communities
        'edit.php?post_type=cities', // Cities
        'edit.php?post_type=regions', // Regions
        'edit.php?post_type=countries', // Countries
        'separator3', // Third separator
        'link-manager.php', // Links
        'edit.php?post_type=page', // Pages
        'edit-comments.php', // Comments
        'separator4', // Forth separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );