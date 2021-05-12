<?php

// Query Args
$args = array(
   'post_type'         => 'arts',
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
   echo '<div id="featured-arts-slider" class="featured-arts__slider swiper-container">';
   echo '<div class="swiper-wrapper">';
   
   while ( $the_query->have_posts() ) {
       $the_query->the_post();

        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $post_thumbnail_alt_text = get_post_meta($post_thumbnail_id , '_wp_attachment_image_alt', true);

       ?>
       
       <div class="swiper-slide featured-arts__slide art featured-arts__art d-flex align-items-center justify-content-center">

        <div class="featured-arts__slide-inner art-inner featured-arts__art-inner px-40 pb-30 mt-100 w-100">
            <a href="<?php the_permalink(); ?>">
                <div class="featured-arts__image-container mb-15 mt-40 text-center">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_thumbnail_alt_text; ?>" class="featured-arts__image">
                </div>
                <div class="featured-arts__textual-container">
                <h3 class="featured-arts__title mb-5"><?php echo get_the_title(); ?></h3>
                <?php $artist = get_field('_artist'); ?>
                <p class="featured-arts__artist-name mb-5"><?php print_r($artist[0]->post_title) ?></p>
                <p class="featured-arts__type-and-year mb-5"><?php the_field('painting_technique'); ?>, <?php the_field('year'); ?></p>
                <p class="featured-arts__dimensions mb-5"><?php the_field('dimensions'); ?></p>
                </div>
            </a>

            <footer class="featured-arts__footer mt-45">
            <div class="row justify-content-center justify-content-sm-between">
                <div class="featured-arts__price col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start">
                <span class="featured-arts__price-currency-sign pr-5">
                    <?php echo get_woocommerce_currency_symbol(); ?>
                </span>
                <span class="featured-arts__price-number">
                    <?php the_field('_price'); ?>
                </span>
                </div>
                <div class="featured-arts__icons col-12 col-sm-6 d-flex justify-content-center justify-content-sm-end">
                    
                    <?php get_template_part('components/navigational-icons/share-icon/share-icon-1/share-icon-1'); ?>   
                    <?php get_template_part('components/navigational-icons/cart-icon/cart-icon-2/cart-icon-2'); ?>
                
                </div>
            </div>

            </footer>
        </div> <!-- .featured-arts__slide-inner.art-inner.featured-arts__art-inner -->

       </div> <!-- .featured-arts__slide art.featured-arts__art -->

       <?php
   }
   echo '<div class="swiper-pagination"></div>';
   echo '</div>';
   echo '</div>';
} else {
   echo '<p>No arts published</p>';
}
/* Restore original Post Data */
wp_reset_postdata();

?>