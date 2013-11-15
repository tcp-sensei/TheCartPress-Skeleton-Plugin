<?php
/*
Plugin Name: TheCartPress Skeleton Payment Plugin
Plugin URI: http://extend.thecartpress.com/
Description: 
Version: 1.0
Author: thecartpress team
Author URI: http://thecartpress.com
License: GPL
Parent: thecartpress
*/
/**
 * This is Skeleton Payment Plugin for TheCartPress.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'TCPSkeletonLoader' ) ) :

/**
 * Skeleton Plugin Loader
 *
 * Loads the Skeleton plugin, only if TheCartPress is activated
 * @since 1.0
 */
class TCPSkeletonLoader {

	/**
	 * Checks if TheCartPress is activated
	 *
	 * @since 1.0
	 */
	static function init() {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}
		if ( ! is_plugin_active( 'thecartpress/TheCartPress.class.php' ) ) {
			add_action( 'admin_notices', array( __CLASS__,	'admin_notices' ) );
		}
	}

	/**
	 * Displays a message if TheCartPress is not activated 
	 *
	 * @since 1.0
	 */
	static function admin_notices() {
		echo '<div class="error"><p>', __( '<strong>Skeleton Plugin for TheCartPress</strong> requires TheCartPress plugin activated.', 'tcp-skeleton' ), '</p></div>';
	}

	/**
	 * Loads the plugin itself
	 *
	 * @since 1.0
	 */
	static function tcp_init() {
		tcp_load_skeleton_plugin();
	}
}

//WordPress hooks
add_action( 'init'		, array( 'TCPSkeletonLoader', 'init' ) );

//TheCartPress hooks
add_action( 'tcp_init'	, array( 'TCPSkeletonLoader', 'tcp_init' ) );

/**
 * Loads the skeleton payment/shipping plugin
 *
 * @since 1.0
 */
function tcp_load_skeleton_plugin() {

	/**
	 * Skeleton payment/shipping plugin
	 *
	 * @since 1.0
	 */
	class TCPSkeletonPlugin extends TCP_Plugin {

		function getTitle() {
			return 'Skeleton';
		}
	
	}
	if ( function_exists( 'tcp_register_payment_plugin' ) ) {
		tcp_register_payment_plugin( 'TCPSkeletonPlugin' );
	}
	//if ( function_exists( 'tcp_register_shipping_plugin' ) ) {
	//	tcp_register_shipping_plugin( 'TCPSkeleton' );
	//}
}
endif; // class_exists check
