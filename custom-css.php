<?php
/*
 * Plugin Name: JP Custom CSS
 * Plugin URI: http://wordpress.org/plugins/jp-custom-css/
 * Description: Customize your site’s CSS without modifying your theme.
 * Author: Anas H. Sulaiman
 * Version: 3.1.1
 * Author URI: http://ahs.pw/
 * Text Domain: jetpack
 * Domain Path: /languages/
 * License: GPL2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Module Name: Custom CSS
 * Module Description: Customize your site’s CSS without modifying your theme.
 * Sort Order: 2
 * First Introduced: 1.7
 * Requires Connection: No
 * Auto Activate: Yes
 * Module Tags: Appearance
 */

function jetpack_load_custom_css() {
	include dirname( __FILE__ ) . "/custom-css/custom-css.php";
}

/*add_action( 'jetpack_modules_loaded', 'custom_css_loaded' );

function custom_css_loaded() {
        Jetpack::enable_module_configurable( __FILE__ );
        Jetpack::module_configuration_load( __FILE__, 'custom_css_configuration_load' );
}*/// E-1

/* E-2 { */
function jp_custom_css_load_textdomain() {
	load_plugin_textdomain( 'jetpack', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'jp_custom_css_load_textdomain' );
/* } E-2 */

// E-3 {
function jp_custom_css_settings_link($actions) {
	return array_merge(
		array( 'settings' => sprintf( '<a href="%s">%s</a>', 'themes.php?page=editcss#settingsdiv', __( 'Edit CSS', 'jetpack' ) ) ),
		$actions
	);
	return $actions;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jp_custom_css_settings_link' );
// } E-3

/*function custom_css_configuration_load() {
        wp_safe_redirect( admin_url( 'themes.php?page=editcss#settingsdiv' ) );
        exit;
}*/// E-1

jetpack_load_custom_css();

/*
Edits by Anas H. Sulaiman:
E-1 : disconnect from Jetpack
E-2 : load text domain
E-3 : add settings link
*/