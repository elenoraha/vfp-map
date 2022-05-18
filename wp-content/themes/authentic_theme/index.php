<?php 
get_header();
?>
<section id="primary" class="content-area">
	<main class="site-main blog-page">
		<div id="page-blocks">
			<div class="co-flex_row--row co-row">
				<div class="blog-articles">
					<?php
					if ( have_posts() ) :
						echo '<ul class="blog-articles--cols">';
						while ( have_posts() ) : the_post();
							echo '<li class="blog-articles--col '. $col_class .' ">';
							get_template_part( 'content', 'blog' );
							echo '</li>';
						endwhile;
						echo '</ul>';
					else :
						get_template_part( 'content', 'none' );
					endif;
					?>
				</div>
			</div>
		</div>
	</main><!-- .site_main -->
</section><!-- .content-area -->
<?php get_footer(); ?>
