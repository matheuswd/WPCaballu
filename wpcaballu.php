<?php

/*
Plugin Name: WPCaballu
Description: A WordPress plugin that allows you to create a horse genealogy and add it to any page using shortcodes
Plugin URI: http://github.com/caballu/WPCaballu
Author: Matheus Martins
Author URI: matheuswd.com.br
Version: 0.0.1
License: GPL2
Text Domain: wpcaballu
Domain Path: /languages
*/

/*

    Copyright (C) 2016  Matheus Martins  matheusdealmeidamartins@gmail.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

define( 'WPCABALLU_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPCABALLU_DIR', plugin_dir_url( __FILE__ ) );

if ( ! class_exists( 'WPCaballu' ) ) :

	/**
	* 
	*/
	class WPCaballu {
		
		function __construct()
		{

			// Load example settings page
	        if ( ! class_exists( 'WPCaballu_settings' ) ) {
	            require( WPCABALLU_DIR . 'settings.php');
	        }

		}

	}

	/**
	 * Create admin Page to list unsubscribed emails.
	 */
	 // Hook for adding admin menus
	 add_action('admin_menu', 'wpdocs_unsub_add_pages');
	 
	 // action function for above hook
	 
	/**
	 * Adds a new top-level page to the administration menu.
	 */
	function wpdocs_unsub_add_pages() {
	     add_menu_page(
	        __( 'Unsub List', 'textdomain' ),
	        __( 'Unsub Emails','textdomain' ),
	        'manage_options',
	        'wpdocs-unsub-email-list',
	        'wpdocs_unsub_page_callback',
	        ''
	    );
	}
	 
	/**
	 * Disply callback for the Unsub page.
	 */
	 function wpdocs_unsub_page_callback() {
	     echo 'Unsubscribe Email List';
	 }

endif;

// Initialize our plugin object.
if ( ! class_exists( 'WPCaballu' ) ) {
    $wpcaballu = new WPCaballu();
}



