<?php
/**
 * Plugin Name: Woocommerce Quickview
 * Description: Made for the customization of WCFM.
 * Version: 1.1.1.7
 * Author: Codup
 * Author URI: https://codup.co/
 * Text Domain: Woocommerce-Quickview
 * Domain Path: /i18n/languages/
 * WC requires at least: 3.8.0
 * WC tested up to: 5.1.0
 *
 * @package Woocommerce-Quickview
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WQV_PLUGIN_DIR' ) ) {
	define( 'WQV_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'WQV_PLUGIN_DIR_URL' ) ) {
	define( 'WQV_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WQV_ABSPATH' ) ) {
	define( 'WQV_ABSPATH', dirname( __FILE__ ) );
}

require WQV_PLUGIN_DIR . '/includes/class-wqv-loader.php';

/**
 * Check if WooCommerce is activated
 */
// if ( is_woocommerce_activated() ) {
// 	include_once WQV_ABSPATH . '/includes/class-wqv-loader.php';
// }