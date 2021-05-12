<?php if ( have_posts() ) : ?>

<section class="section-main section">
<div class="container">
    <header class="search-result-header">
        <h1 class="search-result-title title">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search Results for: %s', 'zero_art' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
    </header><!-- .search-result-header -->
    
    <div class="row">
    <div class="site-content__primary excerpt-list col column" id="primary">
    <div class="row site-content__primary-inner excerpt-list__inner">
    <?php
    do_action('primary-inner-before');
    do_action('primary-search-result-inner-before');
        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
        get_template_part( 'template-parts/loop-search-excerpt' ); 
        do_action('primary-search-result-inner-after-excerpt-list');
    ?>
    </div> <!-- .row.site-content__primary-inner.excerpt-list__inner -->
    
    <?php
    
    the_posts_navigation();
    do_action('primary-inner-after');
    do_action('primary-search-result-inner-after-pagination');
    
    else :
    
    get_template_part( 'template-parts/content', 'none' );
    
    endif;
    ?>
    </div> <!-- #primary.site-content__primary.excerpt-list.column -->

    <?php 
        //SIDEBAR
        get_sidebar();
    ?>
    </div> <!-- .row -->
</div> <!-- .container -->
</section> <!-- .section-main -->