<?php 
//WOOCOMMERCE CART ICON
if(defined('WC_VERSION') && get_theme_mod('display_woocommerce_cart_icon', 1)) { //CHECKS IF WOOCOMMERCE IS INSTALED
?>

<div class="navigational-icon cart-icon cart-icon-2">
<?php $cartCount = WC()->cart->cart_contents_count; // Set variable for cart items count; ?>
<a href="<?php echo wc_get_cart_url(); ?>" class="navigational-icon__link cart-icon__link cart-icon-2__link">
    <div class="navigational-icon__inner cart-icon__inner cart-icon-2__inner">
    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.92577 0.708252H0.666992V1.95825H2.45239L4.77465 10.2094L4.9029 10.6651H5.37627H14.8458H15.3082L15.4435 10.2229L17.5202 3.43209L17.7672 2.62431H16.9225H5.37627V3.87431H16.0778L14.3834 9.41512H5.84965L3.52739 1.16393L3.39915 0.708252H2.92577ZM6.85746 12.4344C6.41366 12.4344 6.05389 12.7942 6.05389 13.238C6.05389 13.6818 6.41366 14.0416 6.85746 14.0416C7.30126 14.0416 7.66103 13.6818 7.66103 13.238C7.66103 12.7942 7.30126 12.4344 6.85746 12.4344ZM4.80389 13.238C4.80389 12.1039 5.72331 11.1844 6.85746 11.1844C7.99162 11.1844 8.91103 12.1039 8.91103 13.238C8.91103 14.3722 7.99162 15.2916 6.85746 15.2916C5.72331 15.2916 4.80389 14.3722 4.80389 13.238ZM13.5241 12.4344C13.0803 12.4344 12.7206 12.7942 12.7206 13.238C12.7206 13.6818 13.0803 14.0416 13.5241 14.0416C13.9679 14.0416 14.3277 13.6818 14.3277 13.238C14.3277 12.7942 13.9679 12.4344 13.5241 12.4344ZM11.4706 13.238C11.4706 12.1039 12.39 11.1844 13.5241 11.1844C14.6583 11.1844 15.5777 12.1039 15.5777 13.238C15.5777 14.3722 14.6583 15.2916 13.5241 15.2916C12.39 15.2916 11.4706 14.3722 11.4706 13.238Z" fill="white"/>
    </svg>
    </div> <!-- .cart-icon__inner.cart-icon-2__inner -->
    <div class="cart-items-count"><span><?php echo $cartCount; ?></span></div>
</a>
</div> <!-- .cart-icon.cart-icon-2 -->

<?php 

    } //CHECKS IF WOOCOMMERCE IS INSTALED
?>