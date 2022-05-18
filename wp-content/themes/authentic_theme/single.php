<?php
get_header();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main blog-articles">

		<?php

		/* Start the Loop */
		while (have_posts()) :
			the_post();
			if (is_singular('states')) :
				get_template_part('content', 'state');
			else :
				get_template_part('content', 'single');
			endif;

			if (is_singular('attachment')) {
				// Parent post navigation.
				the_post_navigation(
					array(
						/* translators: %s: parent post link */
						'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'authentic_theme'), '%title'),
					)
				);
			} elseif (is_singular('post')) {
				// Previous/next post navigation.
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next Post', 'authentic_theme') . '</span> ' .
							'<span class="screen-reader-text">' . __('Next post:', 'authentic_theme') . '</span> <br/>' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous Post', 'authentic_theme') . '</span> ' .
							'<span class="screen-reader-text">' . __('Previous post:', 'authentic_theme') . '</span> <br/>' .
							'<span class="post-title">%title</span>',
					)
				);
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
