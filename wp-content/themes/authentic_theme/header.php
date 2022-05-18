<!DOCTYPE html>
<html class="no-js">

<head>
	<?php

	$social_share_title       = get_field('social_share_title', 'options');
	$social_share_description = get_field('social_share_description', 'options');
	$social_share_image       = get_field('social_share_image', 'options');
	$social_twitter_handle    = get_field('twitter_handle', 'options');
	?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Twitter data -->
	<meta name="twitter:site" content="<?php echo $social_twitter_handle; ?>">
	<meta name="twitter:title" content="<?php echo $social_share_title; ?>">
	<meta name="twitter:description" content="<?php echo $social_share_description; ?>">
	<meta name="twitter:creator" content="<?php echo $social_twitter_handle; ?>">
	<meta name="twitter:image" content="<?php echo $social_share_image; ?>">
	<!-- Open Graph data -->
	<meta property="og:title" content="<?php echo $social_share_title; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $social_share_image; ?>" />
	<meta property="og:description" content="<?php echo $social_share_description; ?>" />
	<meta property="og:site_name" content="<?php echo $social_share_title; ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!-- Adobe fonts and Google Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/uce8hjc.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<?php $post_id = (is_object($post) ? $post->ID : -1); ?>

<body <?php body_class(); ?> data-pageid="<?php echo $post_id; ?>" id="site_body">
	<span class="tooltip-container"></span>
	<div class="hfeed site">
		<header class="site-header" id="top">
			<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'authentic_theme'); ?></a>
			<div class="site-header--top_wrapper">
				<div class="site-header--top">
					<div class="site-header--top_inner">
						<div class="site-header--right">
							<?php

							$nav_class = 'main-nav ';
							$nav_class .= isHome_class();
							?>
							<nav class="<?= $nav_class; ?>" aria-label="Main Navigation" id="js-main_menu">
								<?php
								$main_nav_menu_args = array(
									'theme_location'  => 'primary',
									'fallback_cb'     => false,
									'menu_class'      => 'main-nav--menu sub-menu current',
									'container_class' => 'main-nav--container',
									'container_id'    => 'js-main_menu_container'
								);
								wp_nav_menu($main_nav_menu_args);
								?>
							</nav><!-- #site-navigation -->
						</div>
						<div class="site-header--center">
							<?php
							if (is_front_page()) : ?>
								<h1 class="visually-hidden"><?php echo esc_html(get_bloginfo('name')); ?></h1>
							<?php else : ?>
								<p class="visually-hidden"><?php echo esc_html(get_bloginfo('name')); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->