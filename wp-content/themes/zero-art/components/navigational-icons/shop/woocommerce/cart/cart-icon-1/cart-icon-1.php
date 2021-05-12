<?php 
//WOOCOMMERCE CART ICON
if(defined('WC_VERSION') && get_theme_mod('display_woocommerce_cart_icon', 1)) { //CHECKS IF WOOCOMMERCE IS INSTALED
?>

<div class="navigational-icon cart-icon cart-icon-1 <?php echo esc_html($args['class']); ?>">
<?php $cartCount = WC()->cart->cart_contents_count; // Set variable for cart items count; ?>
<a href="<?php echo wc_get_cart_url(); ?>" class="navigational-icon__link cart-icon__link cart-icon-1__link">
    <div class="navigational-icon__inner cart-icon__inner cart-icon-1__inner">
    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2.71053 0.375H0V1.625H2.23715L5.04951 11.6176L5.17776 12.0732H5.65114H17.0146H17.477L17.6122 11.631L20.1043 3.48205L20.3513 2.67427H19.5066H5.65114V3.92427H18.6619L16.5521 10.8232H6.12452L3.31216 0.830675L3.18391 0.375H2.71053ZM7.42857 14.1964C6.82697 14.1964 6.33928 14.6841 6.33928 15.2857C6.33928 15.8873 6.82697 16.375 7.42857 16.375C8.03016 16.375 8.51785 15.8873 8.51785 15.2857C8.51785 14.6841 8.03016 14.1964 7.42857 14.1964ZM5.08928 15.2857C5.08928 13.9938 6.13661 12.9464 7.42857 12.9464C8.72052 12.9464 9.76785 13.9938 9.76785 15.2857C9.76785 16.5777 8.72052 17.625 7.42857 17.625C6.13661 17.625 5.08928 16.5777 5.08928 15.2857ZM15.4286 14.1964C14.827 14.1964 14.3393 14.6841 14.3393 15.2857C14.3393 15.8873 14.827 16.375 15.4286 16.375C16.0302 16.375 16.5179 15.8873 16.5179 15.2857C16.5179 14.6841 16.0302 14.1964 15.4286 14.1964ZM13.0893 15.2857C13.0893 13.9938 14.1366 12.9464 15.4286 12.9464C16.7205 12.9464 17.7679 13.9938 17.7679 15.2857C17.7679 16.5777 16.7205 17.625 15.4286 17.625C14.1366 17.625 13.0893 16.5777 13.0893 15.2857Z" fill="#161412"/>
</svg>

    </div> <!-- .cart-icon__inner.cart-icon-1__inner -->
    <div class="cart-items-count"><span><?php echo WC()->cart->cart_contents_count; ?></span></div>
</a>
</div> <!-- .cart-icon.cart-icon-1 -->

<?php 
    } //CHECKS IF WOOCOMMERCE IS INSTALED
?>