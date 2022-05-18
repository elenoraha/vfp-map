<?php
$image = $topper_settings['image'];
$headline = $topper_settings['headline'];
$subHeadline = $topper_settings['sub_headline'];
?>
<div class="topper topper-inner">
		<?php
	echo wp_get_attachment_image(
		$image,
		'half',
		false,
		array('class' => 'topper--image')
	);
		?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="topper--title">
					<p class="topper--sub_headline"><?php echo $subHeadline; ?></p>
					<?php if (is_singular('news')) : ?>
						<p class="topper--headline"><?php echo $headline; ?></p>
					<?php else : ?>
						<h1 class="topper--headline"><?php echo $headline; ?></h1>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>