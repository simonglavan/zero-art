<section class="section-main section">
    <div class="container-fluid">
        <div class="row">
            <div class="site-content__primary col column text-left" id="primary">

                <?php
                do_action('primary-inner-before');
                do_action('primary-post_type-inner-before');
                get_template_part( 'template-parts/loop-single', get_post_type()); 

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                do_action('primary-inner-after');
                do_action('primary-post_type-inner-after');
                ?>

                </div> <!-- #primary.site-content__primary.column -->

                <?php 
                //SIDEBAR
                //get_sidebar(); 
                ?>
    
        </div> <!-- .row -->
    </div> <!-- .container -->
</section> <!-- .section-main -->