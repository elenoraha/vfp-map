<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-articles--content_left">
		<a  class="blog-articles--image" href="<?php echo $link; ?>">
			<figure><?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?></figure>
		</a>
	</div>
	<?php authentic_theme_posted_on(); ?>
	<h3 class="blog-articles--headline">
		<?php echo get_the_title(); ?>
	</h3>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'authentic_theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'authentic_theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
