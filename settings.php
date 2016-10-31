<?php

// Register Custom Post Type
function wpcaballu_cpt() {

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
		'taxonomies'            => array( 'wpcaballu_taxonomy' ),
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
		'capability_type'       => 'post',
	);
	register_post_type( 'wpcaballu_cpt', $args );

}
add_action( 'init', 'wpcaballu_cpt', 0 );

// Register Custom Taxonomy
function wpcaballu_horse_breeds() {

	$labels = array(
		'name'                       => _x( 'Horse Breeds', 'Taxonomy General Name', 'wpcaballu' ),
		'singular_name'              => _x( 'Horse Breed', 'Taxonomy Singular Name', 'wpcaballu' ),
		'menu_name'                  => __( 'Breed', 'wpcaballu' ),
		'all_items'                  => __( 'All Breeds', 'wpcaballu' ),
		'parent_item'                => __( 'Parent Item', 'wpcaballu' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wpcaballu' ),
		'new_item_name'              => __( 'New Breed', 'wpcaballu' ),
		'add_new_item'               => __( 'Add New Breed', 'wpcaballu' ),
		'edit_item'                  => __( 'Edit Breed', 'wpcaballu' ),
		'update_item'                => __( 'Update Breed', 'wpcaballu' ),
		'view_item'                  => __( 'View Breed', 'wpcaballu' ),
		'separate_items_with_commas' => __( 'Separate breeds with commas', 'wpcaballu' ),
		'add_or_remove_items'        => __( 'Add or remove breeds', 'wpcaballu' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wpcaballu' ),
		'popular_items'              => __( 'Popular Breeds', 'wpcaballu' ),
		'search_items'               => __( 'Search Breeds', 'wpcaballu' ),
		'not_found'                  => __( 'Not Found', 'wpcaballu' ),
		'no_terms'                   => __( 'No breeds', 'wpcaballu' ),
		'items_list'                 => __( 'Breeds list', 'wpcaballu' ),
		'items_list_navigation'      => __( 'Breeds list navigation', 'wpcaballu' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wpcaballu_taxonomy', array( 'wpcaballu_cpt' ), $args );

}
add_action( 'init', 'wpcaballu_horse_breeds', 0 );