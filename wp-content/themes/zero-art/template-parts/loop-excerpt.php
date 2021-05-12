<?php
/**
 * Template part for displaying posts
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
	<article class="archive-excerpt excerpt">
	    <a href="<?php the_permalink(); ?>">
	        <div class="archive-excerpt__image-container excerpt__image-container">
	            <img class="archive-excerpt__image excerpt__image" src="<?php echo $thumb_url; ?>" alt="Image">
	        </div> <!-- .archive-excerpt__image-container.excerpt__image-container -->
	        <header class="excerpt__header archive-excerpt__header">
				<h3 class="archive-excerpt__title excerpt__title title">
					<?php the_title(); ?>
				</h3> <!-- .archive-excerpt__title excerpt__title -->
			</header>
	        <div class="archive-excerpt__readmore excerpt__readmore" ><?php _e('READ MORE') ?></div>
	    </a>
		
	</article> <!-- .archive-excerpt -->
</div>
<?php
endwhile; // End of the loop.
?>
    