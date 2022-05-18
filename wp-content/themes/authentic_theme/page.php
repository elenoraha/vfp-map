<?php 

get_header(); 
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'content', 'page' );

			endwhile; // End of the loop.
			?>
	</main><!-- .site_main -->
</section><!-- .content-area-->
<?php get_footer(); ?>

