<section class="section-main section">
    <div class="container">
        <div class="row">
            <div class="site-content__primary col-12 col-lg-12 column text-left" id="primary">

                <?php
                do_action('primary-inner-before');
                do_action('primary-page_type-inner-before');
                get_template_part( 'template-parts/loop', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                /* if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif; */
                do_action('primary-inner-after');
                do_action('primary-page_type-inner-after');
                ?>

                </div><!-- #primary.site-content__primary.column -->

    
        </div> <!-- .row -->
    </div> <!-- .container -->
</section> <!-- .section-main -->