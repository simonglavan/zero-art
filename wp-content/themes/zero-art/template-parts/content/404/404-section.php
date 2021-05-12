<section class="error-404 not-found text-center">
	<div class="container">
		<header class="error-404-header">
			<h1 class="error-404-title title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zero-art' ); ?></h1>
		</header><!-- .error-404-header -->
	
		<div class="404-page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'zero-art' ); ?>
			</p>
			<p><?php esc_html_e( 'Go to', 'zero-art' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOMEPAGE</a></p> 
			<?php
				//get_search_form();

				//the_widget( 'WP_Widget_Recent_Posts' );
			?>

		</div><!-- .404-page-content -->
	</div> <!-- .container -->
</section><!-- .error-404 -->