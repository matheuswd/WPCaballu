<?php

if ( ! class_exists( 'WPCaballu_settings' ) ) : 

/**
 * This function creates aa new custom post type called 'Horses'
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function horse() {

	$labels = array(
		'name'                  => _x( 'Horses', 'Post Type General Name', 'wpcaballu' ),
		'singular_name'         => _x( 'Horse', 'Post Type Singular Name', 'wpcaballu' ),
		'menu_name'             => __( 'Horses', 'wpcaballu' ),
		'name_admin_bar'        => __( 'Horses', 'wpcaballu' ),
		'archives'              => __( 'Item Archives', 'wpcaballu' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wpcaballu' ),
		'all_items'             => __( 'All Horses', 'wpcaballu' ),
		'add_new_item'          => __( 'Add New Horse', 'wpcaballu' ),
		'add_new'               => __( 'Add New Horse', 'wpcaballu' ),
		'new_item'              => __( 'New Horse', 'wpcaballu' ),
		'edit_item'             => __( 'Edit Horse', 'wpcaballu' ),
		'update_item'           => __( 'Update Horse', 'wpcaballu' ),
		'view_item'             => __( 'View Horse', 'wpcaballu' ),
		'search_items'          => __( 'Search Horse', 'wpcaballu' ),
		'not_found'             => __( 'Not found', 'wpcaballu' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpcaballu' ),
		'featured_image'        => __( 'Featured Image', 'wpcaballu' ),
		'set_featured_image'    => __( 'Set featured image', 'wpcaballu' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpcaballu' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpcaballu' ),
		'insert_into_item'      => __( 'Insert into horse', 'wpcaballu' ),
		'uploaded_to_this_item' => __( 'Uploaded to this horse', 'wpcaballu' ),
		'items_list'            => __( 'Horses list', 'wpcaballu' ),
		'items_list_navigation' => __( 'Horses list navigation', 'wpcaballu' ),
		'filter_items_list'     => __( 'Filter horses list', 'wpcaballu' ),
	);
	$args = array(
		'label'                 => __( 'Horse', 'wpcaballu' ),
		'description'           => __( 'The post type where you can create your horses and it\'s genealogy', 'wpcaballu' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
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
	register_post_type( 'horse', $args );

}
add_action( 'init', 'horse', 0 );

/**
 * This function creates a new taxonomy to the specific custom post type 'Horses'
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
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
	register_taxonomy( 'wpcaballu_taxonomy', array( 'horse' ), $args );

}
add_action( 'init', 'wpcaballu_horse_breeds', 0 );

/**
 * This function return the horse characteristics that will be used in other pages
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 * @return string Returns de HTML of the custom post
 */
function horse_shortcode($atts){
   extract(shortcode_atts(array(
      'id' => '',
   ), $atts));

   $return_string = '<div>';

   query_posts(array( 'post_type' => 'horse', 'p' => $id ));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
         $return_string .= '<p>' . get_the_content() . '</p>';
         $return_string .= '<p>Horse name: ' . genealogy_get_meta( 'genealogy_main_horse' ) . '.</p>';
         $return_string .= '<p>' . __( 'Father\'s name', 'wpcaballu' ) . ': ' . genealogy_get_meta( 'genealogy_father' ) . '.</p>';
         $return_string .= '<p>Mother\'s name: ' . genealogy_get_meta( 'genealogy_mother' ) . '.</p>';
      endwhile;
   endif;
   $return_string .= '</div>';

   wp_reset_query();
   return $return_string;
}

/**
 * This function register the shortcode to WordPress
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function register_shortcodes(){
   add_shortcode('horse', 'horse_shortcode');
}

add_action( 'init', 'register_shortcodes');


/**
 * This function get all meta values from the custom post type
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function genealogy_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

/**
 * This function add the metabox to the WordPress dashboard
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function genealogy_add_meta_box() {
	add_meta_box(
		'genealogy-genealogy',
		__( 'Genealogy', 'genealogy' ),
		'genealogy_html',
		'horse',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'genealogy_add_meta_box' );

/**
 * This function creates the interface in the WordPress custom post type 'Horses' dashboard
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function genealogy_html( $post) {
	wp_nonce_field( '_genealogy_nonce', 'genealogy_nonce' ); ?>

	<p>Here you should add the genealogy of the horse and their respective register number if you have the details.</p>

	<p>
		<label for="genealogy_main_horse"><?php _e( 'Main Horse', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_main_horse" id="genealogy_main_horse" value="<?php echo genealogy_get_meta( 'genealogy_main_horse' ); ?>">
	</p>	<p>
		<label for="genealogy_father"><?php _e( 'Father', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_father" id="genealogy_father" value="<?php echo genealogy_get_meta( 'genealogy_father' ); ?>">
	</p>	<p>
		<label for="genealogy_mother"><?php _e( 'Mother', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_mother" id="genealogy_mother" value="<?php echo genealogy_get_meta( 'genealogy_mother' ); ?>">
	</p>	<p>
		<label for="genealogy_paternal_grandfather"><?php _e( 'Paternal Grandfather', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_paternal_grandfather" id="genealogy_paternal_grandfather" value="<?php echo genealogy_get_meta( 'genealogy_paternal_grandfather' ); ?>">
	</p>	<p>
		<label for="genealogy_paternal_grandmother"><?php _e( 'Paternal Grandmother', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_paternal_grandmother" id="genealogy_paternal_grandmother" value="<?php echo genealogy_get_meta( 'genealogy_paternal_grandmother' ); ?>">
	</p>	<p>
		<label for="genealogy_maternal_grandfather"><?php _e( 'Maternal Grandfather', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_maternal_grandfather" id="genealogy_maternal_grandfather" value="<?php echo genealogy_get_meta( 'genealogy_maternal_grandfather' ); ?>">
	</p>	<p>
		<label for="genealogy_maternal_grandmother"><?php _e( 'Maternal Grandmother', 'genealogy' ); ?></label><br>
		<input type="text" name="genealogy_maternal_grandmother" id="genealogy_maternal_grandmother" value="<?php echo genealogy_get_meta( 'genealogy_maternal_grandmother' ); ?>">
	</p>
	<div>
		<p><?php _e( 'Shortcode for your horse. Copy this if you want to add it to other page or post.', 'genealogy' ); ?></p>
		<p>[horse id="<?php echo the_id(); ?>"]</p>
	</div><?php
}

/**
 * This function saves the data sent by the user
 * @author Matheus Martins
 * @since 0.0.1 First time this function was introduced
 */
function genealogy_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['genealogy_nonce'] ) || ! wp_verify_nonce( $_POST['genealogy_nonce'], '_genealogy_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['genealogy_main_horse'] ) )
		update_post_meta( $post_id, 'genealogy_main_horse', esc_attr( $_POST['genealogy_main_horse'] ) );
	if ( isset( $_POST['genealogy_father'] ) )
		update_post_meta( $post_id, 'genealogy_father', esc_attr( $_POST['genealogy_father'] ) );
	if ( isset( $_POST['genealogy_mother'] ) )
		update_post_meta( $post_id, 'genealogy_mother', esc_attr( $_POST['genealogy_mother'] ) );
	if ( isset( $_POST['genealogy_paternal_grandfather'] ) )
		update_post_meta( $post_id, 'genealogy_paternal_grandfather', esc_attr( $_POST['genealogy_paternal_grandfather'] ) );
	if ( isset( $_POST['genealogy_paternal_grandmother'] ) )
		update_post_meta( $post_id, 'genealogy_paternal_grandmother', esc_attr( $_POST['genealogy_paternal_grandmother'] ) );
	if ( isset( $_POST['genealogy_maternal_grandfather'] ) )
		update_post_meta( $post_id, 'genealogy_maternal_grandfather', esc_attr( $_POST['genealogy_maternal_grandfather'] ) );
	if ( isset( $_POST['genealogy_maternal_grandmother'] ) )
		update_post_meta( $post_id, 'genealogy_maternal_grandmother', esc_attr( $_POST['genealogy_maternal_grandmother'] ) );
}
add_action( 'save_post', 'genealogy_save' );

/*
	Usage: genealogy_get_meta( 'genealogy_main_horse' )
	Usage: genealogy_get_meta( 'genealogy_father' )
	Usage: genealogy_get_meta( 'genealogy_mother' )
	Usage: genealogy_get_meta( 'genealogy_paternal_grandfather' )
	Usage: genealogy_get_meta( 'genealogy_paternal_grandmother' )
	Usage: genealogy_get_meta( 'genealogy_maternal_grandfather' )
	Usage: genealogy_get_meta( 'genealogy_maternal_grandmother' )
*/





















endif;