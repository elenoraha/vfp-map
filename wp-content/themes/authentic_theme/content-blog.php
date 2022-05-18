<?php
	$categories = get_the_category();
	$link = get_the_permalink();
?>
<div class="blog-articles--content_left">
	<a  class="blog-articles--image" href="<?php echo $link; ?>">
		<figure><?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?></figure>
	</a>
</div>
<div class="blog-articles--content_right">
	<?php authentic_theme_posted_on(); ?>
	<h3 class="blog-articles--headline">
		<a href="<?php echo $link; ?>">
			<?php echo get_the_title(); ?>
		</a>
	</h3>
	<div class="blog-articles--desc">
		<?php echo authentic_theme_first_paragraph(); ?>
		<div class="blog-articles--readmore">
			<a href="<?php echo $link; ?>">Read more<span class="arrow right"></span></a> 
		</div>
	</div>
</div>