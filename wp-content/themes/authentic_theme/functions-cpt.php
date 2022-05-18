<?php
//Creating 'States' custom post type
//Registering the database fields for the cms
function States_post_type() {

	$labels = array(
		'name'                  => _x('States', 'Post Type General Name', 'authentic_theme'),
		'singular_name'         => _x('State', 'Post Type Singular Name', 'authentic_theme'),
		'menu_name'             => __('States', 'authentic_theme'),
		'name_admin_bar'        => __('States', 'authentic_theme'),
		'archives'              => __('States Archives', 'authentic_theme'),
		'attributes'            => __('Item Attributes', 'authentic_theme'),
		'parent_item_colon'     => __('Parent States:', 'authentic_theme'),
		'all_items'             => __('All States', 'authentic_theme'),
		'add_new_item'          => __('Add State', 'authentic_theme'),
		'add_new'               => __('Add State', 'authentic_theme'),
		'new_item'              => __('New State', 'authentic_theme'),
		'edit_item'             => __('Edit State', 'authentic_theme'),
		'update_item'           => __('Update Item', 'authentic_theme'),
		'view_item'             => __('View States', 'authentic_theme'),
		'view_items'            => __('View States', 'authentic_theme'),
		'search_items'          => __('Search States', 'authentic_theme'),
		'not_found'             => __('Not found', 'authentic_theme'),
		'not_found_in_trash'    => __('Not found in Trash', 'authentic_theme'),
		'featured_image'        => __('Featured Image', 'authentic_theme'),
		'set_featured_image'    => __('Set featured image', 'authentic_theme'),
		'remove_featured_image' => __('Remove featured image', 'authentic_theme'),
		'use_featured_image'    => __('Use as featured image', 'authentic_theme'),
		'insert_into_item'      => __('Insert into issue', 'authentic_theme'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'authentic_theme'),
		'items_list'            => __('States list', 'authentic_theme'),
		'items_list_navigation' => __('States list navigation', 'authentic_theme'),
		'filter_items_list'     => __('Filter States list', 'authentic_theme'),
	);
	$args = array(
		'label'                 => __('States', 'authentic_theme'),
		'description'           => __('States Post Type', 'authentic_theme'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'has_archive' 			=> false,
	);
	register_post_type('states', $args);
}
add_action('init', 'states_post_type', 0);
