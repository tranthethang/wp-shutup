<?php
/**
 * Plugin Name: WP Shutup
 * Plugin URI: https://github.com/tranthethang/WP-Shutup
 * Description: To disable all the Nags and Notifications.
 * Version: 1.0
 * Author: tranthethang
 * Author URI: https://github.com/tranthethang
 * License: GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * WP Bomb plugin, Copyright 2014 tranthethang
 * WP Bomb is distributed under the terms of the GNU GPL
 *
 * Requires at least: 4.1
 * Tested up to: 4.9.3
 * Text Domain: wp-shutup
 * Domain Path: /languages/
 *
 * @package WP Shutup
 */


function wp_shutup_handle() {
	global $wp_version;

	return (object) array( 'last_checked' => time(), 'version_checked' => $wp_version );
}

add_filter( 'pre_site_transient_update_core', 'wp_shutup_handle' );
add_filter( 'pre_site_transient_update_plugins', 'wp_shutup_handle' );
add_filter( 'pre_site_transient_update_themes', 'wp_shutup_handle' );

add_action( 'admin_enqueue_scripts', function ( $hook ) {
	wp_enqueue_style( 'wp-shutup-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), null );
}, 99 );