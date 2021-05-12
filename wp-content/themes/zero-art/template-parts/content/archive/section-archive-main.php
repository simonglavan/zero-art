<?php if ( have_posts() ) : ?>

<section class="section-main section">
<div class="container">
    <header class="archive-header">
        <?php
        the_archive_title('<h1 class="archive-title title">', '</h1>');
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </header><!-- .archive-header -->
    
    <div class="row">
    <div class="site-content__primary excerpt-list col column" id="primary">
    <div class="row site-content__primary-inner excerpt-list__inner">
        <?php
        do_action('primary-inner-before');
        do_action('primary-archive-inner-before');
            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/loop-excerpt' );    
            do_action('primary-archive-inner-after-excerpt-list');
        ?>
    </div> <!-- .row.site-content__primary-inner.excerpt-list__inner -->
    
    <?php
    the_posts_navigation();
    do_action('primary-inner-after');
    do_action('primary-archive-inner-after-pagination');
    
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