<?php
/**
 * zero-art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zero-art
 */

$is_development = true;

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( 'COMPONENTS_IMAGE_FOLDER' ) ) {
	// The folder of components.
		define( 'COMPONENTS_IMAGE_FOLDER', get_stylesheet_directory_uri() . '/components/img' );
	}

if ( ! function_exists( 'zero_art_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zero_art_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zero-art, use a find and replace
		 * to change 'zero-art' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zero-art', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'zero-art' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'zero_art_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'zero_art_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zero_art_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zero_art_content_width', 640 );
}
add_action( 'after_setup_theme', 'zero_art_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zero_art_widgets_init() {
	//SIDEBAR (SECONDARY) WIDGETS REGISTRATION
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 1', 'zero-art' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'zero-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	//SIDEBAR (TERTIARY) WIDGETS REGISTRATION
	/* register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'zero-art' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'zero-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	); */
	//FOOTER WIDGETS AREA 1 REGISTRATION
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer widget area 1', 'zero-art' ),
			'id'            => 'footer-widget-area-1',
			'description'   => esc_html__( 'Add widgets here.', 'zero-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	//FOOTER WIDGETS AREA 2 REGISTRATION
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer widget area 2', 'zero-art' ),
			'id'            => 'footer-widget-area-2',
			'description'   => esc_html__( 'Add widgets here.', 'zero-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	//FOOTER WIDGETS AREA 3 REGISTRATION
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer widget area 3', 'zero-art' ),
			'id'            => 'footer-widget-area-3',
			'description'   => esc_html__( 'Add widgets here.', 'zero-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'zero_art_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zero_art_scripts() {
	global $is_development;
	//FONTS
	wp_enqueue_style( 'zero-art-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@400;700&display=swap', array(), _S_VERSION );
	wp_enqueue_style( 'zero-art-optima-font-bold', 'https://db.onlinewebfonts.com/c/8db541c35a4022bde967cf3d8aeab92a?family=Optima+LT+Std', array(), _S_VERSION );
	wp_enqueue_style( 'zero-art-optima-font', 'https://db.onlinewebfonts.com/c/1303f23ac6a9bad6b7d1978d846636d2?family=Optima+LT+Std', array(), _S_VERSION );
	
	//CSS
	wp_enqueue_style( 'zero-art-swiper-bundle', 'https://unpkg.com/swiper/swiper-bundle.css', array(), _S_VERSION );
	wp_enqueue_style( 'zero-art-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'zero-art-style', 'rtl', 'replace' );

	//JS
	if($is_development == true) { 

		include ABSPATH . '/development/development-js.php';
		//include get_template_directory() . '/components/components-js.php';

	}


	wp_enqueue_script( 'zero-art-lib-sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@10', array(), _S_VERSION, false );
	wp_enqueue_script( 'zero-art-site-bundle', get_template_directory_uri() . '/js/site.bundle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'zero-art-woocommerce-bundle', get_template_directory_uri() . '/js/woocommerce.bundle.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'zero_art_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/header-inline-js.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

//APIS
/**
 * GMAP API.
 */
require get_template_directory() . '/inc/gmap-api.php';

//END APIS

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/woocommerce.php';

}
/**
 * Custom rest api endpoint.
 */

require get_template_directory() . '/inc/custom-endpoint.php';

