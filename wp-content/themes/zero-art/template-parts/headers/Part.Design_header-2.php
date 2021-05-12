
<header id="masthead" class="site-header header-2 isFixed">
 <?php do_action('site_header_inner_before'); ?>
    <div class="main-row h-100">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-6 col-lg-6  d-flex align-items-center column column-1">
                    <div class="branding d-flex align-items-end">
                        
                        <div class="logo branding__logo mr-0">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-zero-art.svg' ?>" alt="zero art logo"  width="43" height="36.61">
                        </div> <!-- .logo --> 
                        
    
                        <div class="d-flex flex-column justify-content-center site-title-and-description branding__site-title-and-description">
                            <?php
                        if ( is_front_page() && is_home() ) :
                        ?>
                            <h1 class="site-title branding__site-title mb-5 my-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                        else :
                        ?>
                            <p class="site-title branding__site-title mb-5"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    rel="home"><?php bloginfo( 'name' ); ?></a></p> 
                            <?php
                        endif;
                        ?>
                        
                            
    
                        </div> <!-- .site-title-and-description"-->
    
                    </div> <!-- .branding -->
                </div> <!-- .column-1 -->
                <div class="col-6 col-lg-6 d-flex flex-column align-content-end column column-2">
                <nav class="d-flex justify-content-end navigational-icons">
    
                        <?php 
                        get_template_part('components/navigational-icons/search-icon/search-icon-1/search-icon-1'); 
                        get_template_part('components/navigational-icons/shop/woocommerce/cart/cart-icon-1/cart-icon-1'); 
                        ?>
                        
                    </nav> <!-- #navigational-icons --> 
    
                    
    
                </div> <!-- .column-2 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .main-row -->


    <?php do_action('site_header_inner_after'); ?>
</header><!-- #masthead -->

