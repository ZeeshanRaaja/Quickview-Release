<?php

/**
 * Enable-icon.
 *
 * @package Woocommerce-Quickview
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('WQC_icon')) {

	/**
	 * Class WQC_icon.
	 */
	class WQC_icon
	{

		/**
		 *  Constructor.
		 */
		public function __construct()
		{

			add_action('woocommerce_after_shop_loop_item_title', array($this, 'eye_icon'));
			add_action('wp_enqueue_scripts', function () {
				wp_enqueue_style('dashicons');
			});
			//add_action( 'wp_footer', array($this,'pop_up') );

		}

		/**
		 * Function product setting
		 */

		public function eye_icon()
		{
			global $product;
			global $post;
			$product_id = $post->ID;
			$checbox = get_post_meta($product_id, 'enable_chkbox', true);

			if ($checbox == "yes") {

            ?>
				</a>
				<!-- <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
				</button> -->
				<span id="open-modal" data-product_id="<?php echo $product_id; ?>" data-toggle="modal" data-target="#exampleModalCenter" class=" dashicons dashicons-visibility"></span>

				<!-- <span class="dashicons dashicons-visibility" data-toggle="modal" data-target="#exampleModalCenter" style="cursor:pointer" name="<?php echo $product_id; ?>" id="<?php echo $product_id; ?>"></span> -->
            <?php
			}
		}


		
	}
}

new WQC_icon();
