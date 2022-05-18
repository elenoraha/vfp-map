<?php
/*
 * Template Name: Map Template
 */
get_header();
$preload_state_id = 'none';
if (isset($_GET['state_id'])) {
	if (ctype_alpha($_GET['state_id']) && (strlen($_GET['state_id']) == 2)) {
		$preload_state_id = $_GET['state_id'];
	}
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('map-page'); ?>>
	<div id="primary" class="content-area news" data-preload-state="<?php echo $preload_state_id; ?>">
		<div class="site-main">
			<?php
			/* Page Hero */
			$topper_settings = get_field('page_topper');
			include('part-topper.php');

			/* Map */
			include('part-mapUSA.php');
			?>
		</div><!-- .site_main -->
	</div><!-- .content-area-->

</article><!-- #post-## -->

<?php
get_footer();
