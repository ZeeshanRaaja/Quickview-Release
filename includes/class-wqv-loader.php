<?php

/**
 * Main Loader.
 *
 * @package Woocommerce-Quickview
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('WQV_Loader')) {

	/**
	 * Class WQV_Loader.
	 */
	class WQV_Loader
	{

		/**
		 *  Constructor.
		 */
		public function __construct()
		{
			$this->includes();
			//add_action( 'plugins_loaded', array( $this, 'wqv_load_plugin_textdomain' ) );
			add_action('wp_enqueue_scripts', array($this, 'client_scripts'));
			add_action('admin_enqueue_scripts', array($this, 'wqv_enqueue_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'client_css'));
		}

		/**
		 * Include Files depend on platform.
		 */
		public function includes()
		{
			include_once 'class-wqv-enable-setting-filters.php';
			include_once 'class-wqv-icon.php';
		}

		/**
		 * Enqueue Files.
		 */
		public function wqv_enqueue_scripts()
		{
			wp_enqueue_script('wqv_admin_js',  plugin_dir_url(__DIR__) . '/assets/js/j.js',   array('jquery'), wp_rand());

			wp_enqueue_style('wqv_plugin_style', plugin_dir_url(__DIR__) . '/assets/css/style.css');
		}

		/**
		 * Enqueue Files.
		 */
		public function client_css()
		{

			wp_enqueue_style('wqv_plugin_style', plugin_dir_url(__DIR__) . '/assets/css/client.css');
		}
		/**
		 * Enqueue Frontend Files.
		 */
		public function client_scripts()
		{
			wp_enqueue_script('client',  plugin_dir_url(__DIR__) . '/assets/js/client.js',   array('jquery'), wp_rand());
			wp_localize_script('client', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));

			wp_register_script('prefix_bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js');
			wp_enqueue_script('prefix_bootstrap');
			wp_register_style('prefix_bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css');
			wp_enqueue_style('prefix_bootstrap');
		}

		/**
		 * Languages loaded.
		 */
		public function wqv_load_plugin_textdomain()
		{
			load_plugin_textdomain('Woocommerce-Quickview', false, basename(WQV_ABSPATH) . '/languages/');
		}
	}
}

new WQV_Loader();
