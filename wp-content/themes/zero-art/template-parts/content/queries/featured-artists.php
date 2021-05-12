<?php

// Query Args
$args = array(
   'post_type'         => 'artists',
   'post_status'       => 'publish',
   'posts_per_page' => 12,
   'tax_query'         => array(
    array(
    'taxonomy'  => 'category',
    'field'     => 'slug',
    'terms'     => 'featured',
    ),
    ),
   //'meta_key'			=> 'meta_field_name',
   //'orderby'			=> 'meta_value',
   'order'				=> 'ASC'
   );

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) { 
    $loopNum = 1;
    ?>

    

   <section class="section featured-artists py-55">
    <div class="container">
    <h2 class="featured-artists__title">
    <?php echo get_theme_mod('sections__featured-artists-title') ?>
    </h2>
    <div class="row">
   <?php
   while ( $the_query->have_posts() ) {
       $the_query->the_post();

        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $post_thumbnail_alt_text = get_post_meta($post_thumbnail_id , '_wp_attachment_image_alt', true);

       ?>
       
    
        <div class="col-12 col-md-6 col-lg-4 mb-15 d-flex column column-<?php echo $loopNum ?>">
            <div class="featured-artists__image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            <div class="featured-artists__textual pl-25 w-100 d-flex align-items-center">
            <div class="featured-artists__textual-inner">
                <h3 class="featured-artists__name mb-5"><?php echo get_the_title(); ?></h3>
                <p class="featured-artists__occupation-and-place mb-0">
                <span class="featured-artists__occupation"><?php the_field('occupation') ?></span>,
                <span class="featured-artists__place"><?php the_field('place'); ?></span>
                </p>
            </div>
            </div>
        </div> <!-- column.column-<?php echo $loopNum ?> -->

    <?php
    $loopNum++;
   }
   ?>
    </div> <!-- .row -->
    </div> <!-- .container --> 
    </section> <!-- .featured-artists -->
   <?php
} else {
   echo '<p>No arts published</p>';
}
/* Restore original Post Data */
wp_reset_postdata();

?>