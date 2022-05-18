<?php

/**
 * Theme functions and definitions
 *
 * @package AuthenticTheme
 */
/*-------------------------------------------------------------------
- ● Basic WP functions
❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */

$theme_directory = get_template_directory();
// apply style to editor
function add_editor_style_function() {
	add_editor_style('style.css');
}
add_action('init', 'add_editor_style_function');

/*
 * Make the template name available everywhere
 */
function define_current_theme_file($template) {
	$GLOBALS['current_theme_template'] = basename($template);

	return $template;
}
add_action('template_include', 'define_current_theme_file', 1000);

$images_directory = get_template_directory() . '/images/';

/**
 * Enqueue scripts and styles.
 */
function authentic_theme_scripts() {

	$stylePath = get_stylesheet_directory() . '/style.css';
	wp_enqueue_style(
		'authentic_theme-style',
		get_stylesheet_uri(),
		'',
		filemtime($stylePath)
	);

	$template_directory = get_bloginfo('template_directory');
	$bower_uri = $template_directory . '/bower_components';
	wp_register_script(
		'productionMin',
		$template_directory . '/js/production.min.js',
		array('jquery'),
		false,
		true
	);
	wp_register_script(
		'production',
		$template_directory . '/js/production.js',
		array('jquery'),
		false,
		true
	);
	wp_localize_script('productionMin', 'ajax_posts', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'noposts' => __('No older posts found', 'authentic_theme'),
	));
	$dataForMainScripts = array(
		'themeUrl' => get_stylesheet_directory_uri(),
		'siteUrl' => home_url('/'),
	);
	wp_localize_script('productionMin', 'phpVariables', $dataForMainScripts);
	wp_enqueue_script('productionMin');

	add_image_size('small', 396, 396);
	add_image_size('half', 1260, 1260);
	add_image_size('third', 800, 800);
	add_image_size('full', 2000, 2000);
	add_image_size('topper', 1200, 1200);
	add_image_size('tiny', 75, 75);
}
add_action('wp_enqueue_scripts', 'authentic_theme_scripts');
add_theme_support('post-thumbnails');
register_nav_menus(array(
	'primary' => __('Primary Menu', 'authentic_theme'),
	'footer' => __('Footer Menu', 'authentic_theme'),
));


/**
 * Add ACF Options Page
 */
if (function_exists('acf_add_options_page')) {

	$settings_page = acf_add_options_page(array(
		'page_title' => 'Site Options',
		'menu_title' => 'Site Options',
		'menu_slug'  => 'site-options',
		'capability' => 'manage_options',
		'redirect'   => true
	));

}
/**
 * Include CPT
 */
require $theme_directory . '/functions-cpt.php';



/*-------------------------------------------------------------------
- ● AJAX MAP
❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */

function load_candidates() {

	$idState = (isset($_POST["idState"])) ? $_POST["idState"] : 2;
	$idState = str_replace('link-state--', '', $idState);

	$out = array();

	//Header WP Query
	$args = array(
		'post_type'      => 'states',
		'posts_per_page' => 1,
		'meta_key'       => 'state_abbreviation',
		'meta_value'     => $idState
	);

	$querypost = new WP_Query($args);


	if ($querypost->have_posts()) :
		while ($querypost->have_posts()) : $querypost->the_post();

			$out['name'] = get_field('state_name');
			$out['link'] = get_permalink();
			$out['has_active_election'] = false;

			//START content html
			ob_start();

			if (have_rows('current_senators')) :
				while (have_rows('current_senators')) :
					the_row();

					if (get_sub_field('election_year') == date('Y')) {
						$out['has_active_election'] = true;
					}

					include('map-parts/candidate-card.php');

				endwhile;
			endif;

			// END content HTML
			$out['candidates'] = ob_get_clean();

		endwhile;
		wp_reset_postdata();
	elseif ($idState == "none") :
	//nothing is done
	else :
		$out['name'] = __('Without Information', 'authentic_theme');
		$out['candidates'] = "-";
		$out['has_active_election'] = false;

	endif;
	wp_send_json($out);
}

add_action('wp_ajax_nopriv_load_candidates', 'load_candidates');
add_action('wp_ajax_load_candidates', 'load_candidates');

/*-------------------------------------------------------------------
- ● ACF FUNCTIONS
❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */

function fill_select_year($field) {

	$currentYear = date('Y');

	// Create choices array
	$field['choices'] = array();
	// Add blank first selection; remove if unnecessary
	$field['choices'][''] = ' ';

	// Loop through a range of years and add to field 'choices'. Change range as needed.
	foreach (range($currentYear - 1, $currentYear + 8) as $year) {

		$field['choices'][$year] = $year;
	}

	// Return the field
	return $field;
}

add_filter('acf/load_field/name=election_year', 'fill_select_year');

/*-------------------------------------------------------------------
- ● HELPERS
❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */

/**
 * Truncates the given string at the specified length.
 *
 * @param string $str The input string.
 * @param int $width The number of chars at which the string will be truncated.
 * @return string
 */
function truncate($str, $width) {
	return strtok(wordwrap($str, $width, "...\n"), "\n");
}

if (!function_exists('acf_generate_link')) {

	/**
	 * Generate link from the information of the "Field: Link"
	 *
	 * @param  array  $arrayLink The input array from "Field: Link".
	 * @param  string $classCSS  CSS classes. Optional.
	 * @return string Generated HTML link.
	 */
	function acf_generate_link($arrayLink, $classCSS = 'button') {

		if ($link = $arrayLink['link']) {

			if ($link) {
				$link_url    = $link['url'];
				$link_title  = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			}

			$adaText = '';

			if ($arrayLink['ada_toggle']) {
				$adaText = "aria-label=\"{$arrayLink['ada_label']}\"";
			}

			return "<a class=\"{$classCSS}\" href=\"{$link_url}\" {$adaText} target=\"{$link_target}\">{$link_title}</a>";
		} else {
			return NULL;
		}
	}
}


function isHome_class() {
	$isHome = '';
	if (is_front_page()) {
		$isHome = 'is-home';
	}

	return $isHome;
}


if (!function_exists('get_title_ada')) {
	function get_title_ada($array_title_ada) {

		if ($array_title_ada['add_title_ada']) {
			return '<h' . $array_title_ada['h_level'] . ' class="visually-hidden">' . $array_title_ada['title_ada'] . '</h' . $array_title_ada['h_level'] . '>';
		}

		return false;
	}
}

