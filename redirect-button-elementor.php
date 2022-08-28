<?php

/**
 * Plugin Name:       Redirect Button Elementor
 * Description:       Redirect Button is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       redirect-button
*/

if(!defined('ABSPATH')){
exit;
}

function add_redirect_category( $elements_manager ) {

	$elements_manager->add_category(
		'el-redirect',
		[
			'title' => esc_html__( 'Redirect Button', 'redirect-button' ),
			'icon' => 'fa fa-plug',
		]
	);



}
add_action( 'elementor/elements/categories_registered', 'add_redirect_category' );

/**
 *  Widgets Loader
*/

require plugin_dir_path(__FILE__) . 'widgets-loader.php';

