<?php
/**
* 
*/
class WPCaballu_settings {
	
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
	   $query = new WP_Query(array( 'post_type' => 'horse', 'p' => $id ));
	   if ($query->have_posts()) :
	      while ($query->have_posts()) : $query->the_post();
	         $return_string .= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
	         $return_string .= '<p>' . get_the_content() . '</p>';
	         if ( genealogy_get_meta( 'genealogy_main_horse' ) ) {
	         	$return_string .= '<p>Horse name: ' . genealogy_get_meta( 'genealogy_main_horse' ) . '.</p>';
	         }
	         if ( genealogy_get_meta( 'genealogy_father' ) ) {
	         	$return_string .= '<p>' . __( 'Father\'s name', 'wpcaballu' ) . ': ' . genealogy_get_meta( 'genealogy_father' ) . '.</p>';
	         }
	         
	         if ( genealogy_get_meta( 'genealogy_mother' ) ) {
	         	$return_string .= '<p>Mother\'s name: ' . genealogy_get_meta( 'genealogy_mother' ) . '.</p>';
	         }
	         
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

	
}

