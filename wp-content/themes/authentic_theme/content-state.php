<article <?php post_class(); ?>>
	<?php
	$topper_settings = get_field('page_topper');

	/* If the fields are empty then use generic text */
	if ($topper_settings['headline'] == '' && $topper_settings['sub_headline'] == '') {
		$home_id = get_option('page_on_front');
		$home_topper = get_field('page_topper', $home_id);
		$home_image = $home_topper['image'];
		$topper_settings = array(
			'sub_headline' => 'Senate Race',
			'headline' => get_field('state_name'),
			'image' => $home_image
		);
	}
	include('part-topper.php');
	$page_blocks_class = 'flexible_components';
	?>
	<div class="state">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="map-usa--title-wrapper">
						<h2 class="map-usa--state-title"><?php the_field('state_name'); ?></h2>
					</div>
				</div>
				<div class="col-6">
					<div class="state--map">
							<?php 
						if (get_field('state_image')) : ?>
								<?php
							echo wp_get_attachment_image(
								get_field('state_image'),
								'half',
								false,
								array('class' => 'state--img')
							);
								?>
							<?php 
						else : ?>
							<img src="<?php echo get_template_directory_uri() . '/images/states/state--' . get_field('state_abbreviation') . '.png'; ?>" alt="<?php the_field('state_name'); ?>" class="state--img">
							<?php 
						endif; 
						$link_map_page = get_permalink(2231);
						if (function_exists('pll_get_post')) {
							$link_map_page = get_permalink(pll_get_post(2231));
						}
						?>
						<a class="button_link state--map-link" href="<?php echo $link_map_page; ?>"><?php _e('Back to map', 'authentic_theme'); ?></a>
					</div>
				</div>
				<div class="col-6">
					<div class="state--description">
						<?php the_field('description'); ?>
					</div>
				</div>
			</div>
			<div class="row row-candidates" data-has-candidates="<?php echo have_rows('candidates') ? 'true' : 'false'; ?>">
				<div class="col-6 col-current-senators">
					<h3 class="state--candidates-title fs-28"><?php _e('Current Senators', 'authentic_theme'); ?></h3>
					<div class="state--current-senators">
						<?php if (have_rows('current_senators')) : ?>
							<?php while (have_rows('current_senators')) :
								the_row();
								include('map-parts/candidate-card.php');
							endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-6 col-candidates">
					<h3 class="state--candidates-title fs-28"><?php _e(' Democratic Candidates', 'authentic_theme'); ?></h3>
					<div class="state--candidates">
						<?php if (have_rows('candidates')) : ?>
							<?php while (have_rows('candidates')) :
								the_row();
								include('map-parts/candidate-card.php');
							endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->