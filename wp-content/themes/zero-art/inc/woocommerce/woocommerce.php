<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package zero-art
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function zero_art_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6, 
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'zero_art_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function zero_art_woocommerce_scripts() {
	wp_enqueue_style( 'zero-art-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'zero-art-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'zero_art_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function zero_art_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'zero_art_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function zero_art_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'zero_art_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'zero_art_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function zero_art_woocommerce_wrapper_before() {
		?>
			<main id="site-content" class="site-content">
				<section class="section-main section">
				<div class="container">
				<div class="row">
				<div class="site-content__primary col column" id="primary">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'zero_art_woocommerce_wrapper_before' );

if ( ! function_exists( 'zero_art_woocommerce_wrapper_after_primary' ) ) {
	/**
	 * After Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function zero_art_woocommerce_wrapper_after_primary() {
		?>
			</div> <!-- #primary.site-content__primary.column -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'zero_art_woocommerce_wrapper_after_primary' );

if ( ! function_exists( 'zero_art_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content and sidebars.
	 *
	 * Closes the wrapping elements.
	 *
	 * @return void
	 */
	function zero_art_woocommerce_wrapper_after() {
		?>
			
			</div> <!-- .row -->
			</div> <!-- .container -->
			</section> <!-- .section-main -->
			</main><!-- #site-content -->
		<?php
	}
}
add_action( 'woocommerce_sidebar', 'zero_art_woocommerce_wrapper_after', 15 );

//WE WOOCOMMERCE PRODUCT VISUAL AND SUMMARY CONTAINER
//Opens wrapping elements.
if ( ! function_exists( 'zero_art_woocommerce_product_image_and_summary_wrapper_open' ) ) {
	/**
	 * Before single product summary.
	 *
	 * 
	 *
	 * @return void
	 */
	function zero_art_woocommerce_product_image_and_summary_wrapper_open() {
		?>
			<div class="we-woocommerce-product-visual-and-summary">
		<?php
	}
}
add_action( 'woocommerce_before_single_product_summary', 'zero_art_woocommerce_product_image_and_summary_wrapper_open', 5 );
//Closing wrapping elements.
if ( ! function_exists( 'zero_art_woocommerce_product_image_and_summary_wrapper_close' ) ) {
	/**
	 * Before single product summary.
	 *
	 *
	 * @return void
	 */
	function zero_art_woocommerce_product_image_and_summary_wrapper_close() {
		?>
			</div>
		<?php
	}
}
add_action( 'woocommerce_after_single_product_summary', 'zero_art_woocommerce_product_image_and_summary_wrapper_close', 5 );

//CHANGE ORDER OF HOOKED ITEMS 
//PRODUCT PRICE AND EXCERPT SWAP
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
//END PRODUCT PRICE AND EXCERPT SWAP
//END CHANGE ORDER OF HOOKED ITEMS 

//END WE WOOCOMMERCE PRODUCT VISUAL AND SUMMARY CONTAINER

//WOOCOMMERCE ARCHIVE PRODUCTS WRAPPERS
	//OPEN PRODUCTS CONTAINER
	add_action( 'woocommerce_before_shop_loop', 'zero_art_woocommerce_archive_products_container_open', 3 );
	//CLOSE PRODUCTS CONTAINER 
	add_action( 'woocommerce_after_shop_loop', 'zero_art_woocommerce_archive_products_container_close', 3 );
	
	//OPEN FILTER-ORDERING CONTAINER
	add_action( 'woocommerce_before_shop_loop', 'zero_art_woocommerce_archive_products_filter_ordering_container_open', 19 );
	//CLOSE FILTER-ORDERING CONTAINER
	add_action( 'woocommerce_before_shop_loop', 'zero_art_woocommerce_archive_products_filter_ordering_container_close', 31 );


	//FUNCTIONS
	//PRODUCTS CONTAINER 
	function zero_art_woocommerce_archive_products_container_open() { ?>
		<div class="we-woocommerce-products-container">
	<?php }

	function zero_art_woocommerce_archive_products_container_close() { ?>
		</div> <!-- .we-woocommerce-products-container -->
	<?php }

	//FILTER-ORDERING CONTAINER
	function zero_art_woocommerce_archive_products_filter_ordering_container_open() { ?>
		<div class="we-woocommerce-filter-ordering-container">
	<?php }

	function zero_art_woocommerce_archive_products_filter_ordering_container_close() { ?>
		</div> <!-- .we-woocommerce-filter-ordering-container -->
	<?php }
	//END FUNCTIONS
//END WOOCOMMERCE ARCHIVE PRODUCTS WRAPPERS

//WOOCOMMERCE ARCHIVE PRODUCT
	//OPEN PRODUCT INNER
	add_action( 'woocommerce_before_shop_loop_item', 'zero_art_woocommerce_archive_product_inner_open', 3 );
	//CLOSE PRODUCT INNER
	add_action( 'woocommerce_after_shop_loop_item', 'zero_art_woocommerce_archive_product_inner_close', 20 );
	
	//REARANGE ONSALE BADGE PRIORITY FROM 10 TO 5
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 5 );

	//OPEN PRODUCT VISUAL CONTAINER
	add_action( 'woocommerce_before_shop_loop_item_title', 'zero_art_woocommerce_archive_product_visual_container_open', 7 );
	//CLOSE PRODUCT VISUAL CONTAINER
	add_action( 'woocommerce_before_shop_loop_item_title', 'zero_art_woocommerce_archive_product_visual_container_close', 12 );
	
	//OPEN PRODUCT SUMMARY CONTAINER
	add_action( 'woocommerce_shop_loop_item_title', 'zero_art_woocommerce_archive_product_summary_container_open', 3 );
	//CLOSE PRODUCT SUMMARY CONTAINER
	add_action( 'woocommerce_after_shop_loop_item_title', 'zero_art_woocommerce_archive_product_summary_container_close', 20);

	//REARANGE - SWAP ADD TO CART BUTTON AND CLOSING A TAG
	/* remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 5 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 ); */

	//FUNCTIONS
	//PRODUCT INNER
	function zero_art_woocommerce_archive_product_inner_open() { ?>
		<div class="product__inner">
	<?php }

	function zero_art_woocommerce_archive_product_inner_close() { ?>
		</div> <!-- .product__inner -->
	<?php }
	
	//VISUAL CONTAINER
	function zero_art_woocommerce_archive_product_visual_container_open() { ?>
		<div class="product__visual">
	<?php }

	function zero_art_woocommerce_archive_product_visual_container_close() { ?>
		</div> <!-- .product-visual -->
	<?php }

	//PRODUCT SUMMARY CONTAINER
	function zero_art_woocommerce_archive_product_summary_container_open() { ?>
		<div class="product__summary">
	<?php }

	function zero_art_woocommerce_archive_product_summary_container_close() { ?>
		</div> <!-- .product-summary -->
	<?php }
	//END FUNCTIONS
//END WOOCOMMERCE ARCHIVE PRODUCT 

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'zero_art_woocommerce_header_cart' ) ) {
			zero_art_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'zero_art_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function zero_art_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		zero_art_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'zero_art_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'zero_art_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function zero_art_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'zero-art' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'zero-art' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'zero_art_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function zero_art_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php zero_art_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


//AJAX CART QUANTITY REFRESH
add_filter( 'woocommerce_add_to_cart_fragments', 'zero_art_add_to_cart_fragment' );
 
function zero_art_add_to_cart_fragment( $fragments ) {
 
	global $woocommerce;
 
	$fragments['.cart-items-count'] = '<div class="cart-items-count"><span>' . WC()->cart->cart_contents_count . '</span></div>';
 	return $fragments;
 
 } 


 //MAKE CUSTOM POST TYPE ARTS PRODUCTABLE TO BE ABLE TO ADD TO CART
 class IA_Woo_Product extends WC_Product  {

    protected $post_type = 'arts';

    public function get_type() {
        return 'arts';
    }

    public function __construct( $product = 0 ) {
        $this->supports[]   = 'ajax_add_to_cart';

        parent::__construct( $product );


    }
    // maybe overwrite other functions from WC_Product

}

class IA_Data_Store_CPT extends WC_Product_Data_Store_CPT {

    public function read( &$product ) { // this is required
        $product->set_defaults();
        $post_object = get_post( $product->get_id() );

        if ( ! $product->get_id() || ! $post_object || 'arts' !== $post_object->post_type ) {

            throw new Exception( __( 'Invalid product.', 'woocommerce' ) );
        }

        $product->set_props(
            array(
                'name'              => $post_object->post_title,
                'slug'              => $post_object->post_name,
                'date_created'      => 0 < $post_object->post_date_gmt ? wc_string_to_timestamp( $post_object->post_date_gmt ) : null,
                'date_modified'     => 0 < $post_object->post_modified_gmt ? wc_string_to_timestamp( $post_object->post_modified_gmt ) : null,
                'status'            => $post_object->post_status,
                'description'       => $post_object->post_content,
                'short_description' => $post_object->post_excerpt,
                'parent_id'         => $post_object->post_parent,
                'menu_order'        => $post_object->menu_order,
                'reviews_allowed'   => 'open' === $post_object->comment_status,
            )
        );

        $this->read_attributes( $product );
        $this->read_downloads( $product );
        $this->read_visibility( $product );
        $this->read_product_data( $product );
        $this->read_extra_data( $product );
        $product->set_object_read( true );
    }

    // maybe overwrite other functions from WC_Product_Data_Store_CPT

}


class IA_WC_Order_Item_Product extends WC_Order_Item_Product {
    public function set_product_id( $value ) {
        if ( $value > 0 && 'arts' !== get_post_type( absint( $value ) ) ) {
            $this->error( 'order_item_product_invalid_product_id', __( 'Invalid product ID', 'woocommerce' ) );
        }
        $this->set_prop( 'product_id', absint( $value ) );
    }

}




function IA_woocommerce_data_stores( $stores ) {
    // the search is made for product-$post_type so note the required 'product-' in key name
    $stores['product-arts'] = 'IA_Data_Store_CPT';
    return $stores;
}
add_filter( 'woocommerce_data_stores', 'IA_woocommerce_data_stores' , 11, 1 );


function IA_woo_product_class( $class_name ,  $product_type ,  $product_id ) {
    if ($product_type == 'arts')
        $class_name = 'IA_Woo_Product';
    return $class_name; 
}
add_filter('woocommerce_product_class','IA_woo_product_class',25,3 );



// function my_woocommerce_product_get_price( $price, $product ) {
	
//     if ($product->get_type() == 'arts' ) {
//         $price = get_post_meta( $product->id, '_price', true);    
//     }
//     return $price;
// }
// add_filter('woocommerce_get_price','my_woocommerce_product_get_price',20,2);
// add_filter('woocommerce_product_get_price', 'my_woocommerce_product_get_price', 10, 2 );



// required function for allowing posty_type to be added; maybe not the best but it works
function IA_woo_product_type($false,$product_id) { 
    if ($false === false) { // don't know why, but this is how woo does it
        global $post;
        // maybe redo it someday?!
        if (is_object($post) && !empty($post)) { // post is set
            if ($post->post_type == 'arts' && $post->ID == $product_id) 
                return 'arts';
            else {
                $product = get_post( $product_id );
                if (is_object($product) && !is_wp_error($product)) { // post not set but it's a arts
                    if ($product->post_type == 'arts') 
                        return 'arts';
                } // end if 
            }    

        } else if(wp_doing_ajax()) { // has post set (usefull when adding using ajax)
            $product_post = get_post( $product_id );
            if ($product_post->post_type == 'arts') 
                return 'arts';
        } else { 
            $product = get_post( $product_id );
            if (is_object($product) && !is_wp_error($product)) { // post not set but it's a arts
                if ($product->post_type == 'arts') 
                    return 'arts';
            } // end if 

        } // end if  // end if 



    } // end if 
    return false;
}
add_filter('woocommerce_product_type_query','IA_woo_product_type',12,2 );

function IA_woocommerce_checkout_create_order_line_item_object($item, $cart_item_key, $values, $order) {

    $product                    = $values['data'];
    if ($product->get_type() == 'arts') {
        return new IA_WC_Order_Item_Product();
    } // end if 
    return $item ;
}   
add_filter( 'woocommerce_checkout_create_order_line_item_object', 'IA_woocommerce_checkout_create_order_line_item_object', 20, 4 );

function cod_woocommerce_checkout_create_order_line_item($item,$cart_item_key,$values,$order) {
    if ($values['data']->get_type() == 'arts') {
        $item->update_meta_data( '_arts', 'yes' ); // add a way to recognize custom post type in ordered items
        return;
    } // end if 

}
add_action( 'woocommerce_checkout_create_order_line_item', 'cod_woocommerce_checkout_create_order_line_item', 20, 4 );

function IA_woocommerce_get_order_item_classname($classname, $item_type, $id) {
    global $wpdb;
    $is_IA = $wpdb->get_var("SELECT meta_value FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE order_item_id = {$id} AND meta_key = '_arts'");


    if ('yes' === $is_IA) { // load the new class if the item is our custom post
        $classname = 'IA_WC_Order_Item_Product';
    } // end if 
    return $classname;
}
add_filter( 'woocommerce_get_order_item_classname', 'IA_woocommerce_get_order_item_classname', 20, 3 );
//END MAKE CUSTOM POST TYPE ARTS PRODUCTABLE TO BE ABLE TO ADD TO CART



//MAKE AJAX ADD TO CART
function ql_woocommerce_ajax_add_to_cart_js() {
    
       wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . '/js/ajax_add_to_cart.js', array('jquery'),'1.0', true );
    
}
add_action('wp_enqueue_scripts', 'ql_woocommerce_ajax_add_to_cart_js');


//

add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart'); 
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');          
function ql_woocommerce_ajax_add_to_cart() {  
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id); 
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
            if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 
                wc_add_to_cart_message(array($product_id => $quantity), true); 
            } 
            WC_AJAX :: get_refreshed_fragments(); 
            } else { 
                $data = array( 
                    'error' => true,
                    'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                echo wp_send_json($data);
            }
            wp_die();
        }

//MAKE AJAX ADD TO CART
