<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zero-art
 */

?>
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	if(has_post_thumbnail()){
        $thumb_url = get_the_post_thumbnail_url(); 
    }
?>

<div class="col-12 col-md-6 col-lg-4 pb-25 column">
	<article class="search-excerpt excerpt">
	    <a href="<?php the_permalink(); ?>">
	        <div class="search-excerpt__image-container excerpt__image-container">
	            <img class="search-excerpt__image excerpt__image" src="<?php echo $thumb_url; ?>" alt="Image">
	        </div> <!-- .search-excerpt__image-container.excerpt__image-container -->
	        <header class="excerpt__header search-excerpt__header">
				<h3 class="search-excerpt__title excerpt__title title">
					<?php the_title(); ?>
				</h3> <!-- .search-excerpt__title excerpt__title -->
			</header>
	        <div class="search-excerpt__readmore excerpt__readmore" ><?php _e('READ MORE') ?></div>
	    </a>
		
	</article> <!-- .search-excerpt -->
</div>
<?php
endwhile; // End of the loop.
?>