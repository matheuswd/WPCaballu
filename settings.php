<?php

// Register Custom Post Type
function wpcaballu() {

	$labels = array(
		'name'                  => _x( 'Horses', 'Post Type General Name', 'wpcaballu' ),
		'singular_name'         => _x( 'Horse', 'Post Type Singular Name', 'wpcaballu' ),
		'menu_name'             => __( 'Horses', 'wpcaballu' ),
		'name_admin_bar'        => __( 'Horses', 'wpcaballu' ),
		'archives'              => __( 'Item Archives', 'wpcaballu' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wpcaballu' ),
		'all_items'             => __( 'All Horses', 'wpcaballu' ),
		'add_new_item'          => __( 'Add New Horse', 'wpcaballu' ),
		'add_new'               => __( 'Add New', 'wpcaballu' ),
		'new_item'              => __( 'New Item', 'wpcaballu' ),
		'edit_item'             => __( 'Edit Item', 'wpcaballu' ),
		'update_item'           => __( 'Update Item', 'wpcaballu' ),
		'view_item'             => __( 'View Item', 'wpcaballu' ),
		'search_items'          => __( 'Search Item', 'wpcaballu' ),
		'not_found'             => __( 'Not found', 'wpcaballu' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpcaballu' ),
		'featured_image'        => __( 'Featured Image', 'wpcaballu' ),
		'set_featured_image'    => __( 'Set featured image', 'wpcaballu' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpcaballu' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpcaballu' ),
		'insert_into_item'      => __( 'Insert into item', 'wpcaballu' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpcaballu' ),
		'items_list'            => __( 'Items list', 'wpcaballu' ),
		'items_list_navigation' => __( 'Items list navigation', 'wpcaballu' ),
		'filter_items_list'     => __( 'Filter items list', 'wpcaballu' ),
	);
	$args = array(
		'label'                 => __( 'Horse', 'wpcaballu' ),
		'description'           => __( 'The post type where you can create your horses and it\'s genealogy', 'wpcaballu' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'wpcaballu', $args );

}
add_action( 'init', 'wpcaballu', 0 );