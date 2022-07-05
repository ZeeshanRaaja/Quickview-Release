<?php

/**
 * Enable-Setting.
 *
 * @package Woocommerce-Quickview
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('WQC_product_setting')) {

	/**
	 * Class WQC_product_setting.
	 * 
	 *
	 */
	class WQC_product_setting
	{

		/**
		 *  Constructor.
		 */

		public function __construct()
		{

			add_action('woocommerce_product_data_tabs', array($this, 'sets_settings_tab'));
			add_action('woocommerce_product_data_panels', array($this, 'set_input_fields'));
			add_action('woocommerce_process_product_meta', array($this, 'enable_chk_save'));
			add_action('wp_ajax_quickview_data_fetch', array($this, 'quickview_data_fetch'));
			add_action('wp_ajax_nopriv_quickview_data_fetch', array($this, 'quickview_data_fetch'));
			add_action('wp_footer', array($this, 'pop_up'));
		}

		/**
		 * Function product setting
		 */

		public function sets_settings_tab($tab)
		{
			$tab['Product Quickview'] = array(
				'label'		=> __('Product Quickview', 'Woocommerce-Quickview'),
				'target'	=> 'product_quickview',
				'class'		=> array('show_if_simple', 'show_if_variable'),
			);
			return $tab;
		}

		public function set_input_fields()
		{
			echo '<div id="product_quickview" class="panel woocommerce_options_panel">';

			woocommerce_wp_checkbox(array(

				'id'      => 'enable_chkbox',
				'label'   => __(' Enable Product Setting', 'Woocommerce-Quickview'),

			));

			woocommerce_wp_checkbox(array(

				'id'      => 'enable_title',
				'label'   => __('Title', 'Woocommerce-Quickview'),

			));
			woocommerce_wp_checkbox(array(

				'id'      => 'enable_price',
				'label'   => __('Price', 'Woocommerce-Quickview'),

			));

			woocommerce_wp_checkbox(array(

				'id'      => 'enable_sku',
				'label'   => __('SKU', 'Woocommerce-Quickview'),

			));
			woocommerce_wp_checkbox(array(

				'id'      => 'enable_image',
				'label'   => __('Image', 'Woocommerce-Quickview'),

			));

			woocommerce_wp_checkbox(array(

				'id'      => 'enable_categories',
				'label'   => __('Categories', 'Woocommerce-Quickview'),

			));
			woocommerce_wp_checkbox(array(

				'id'      => 'enable_tags',
				'label'   => __('Tags', 'Woocommerce-Quickview'),

			));
			woocommerce_wp_checkbox(array(

				'id'      => 'enable_description',
				'label'   => __('Description', 'Woocommerce-Quickview'),

			));

			woocommerce_wp_text_input(
				array(

					'id'          => 'description_range',
					'label'       => __('Input range for description ', 'woocommerce'),
					'placeholder' => 'Custom Product Text Field',
					'desc_tip'    => 'true',
					'type'		  => 'number',
				)
			);

			echo "</div>";
		}


		public function enable_chk_save($post_id)
		{

			$checkbox = isset($_POST['enable_chkbox']) ? $_POST['enable_chkbox'] : '';
			if ($_POST['enable_chkbox'] == true) {
				update_post_meta($post_id, "enable_chkbox", $checkbox);
			}
			if ($_POST['enable_chkbox'] == false) {
				update_post_meta($post_id, "enable_chkbox", "");
			}

			$enable_title = isset($_POST['enable_title']) ? $_POST['enable_title'] : "";
			if ($_POST['enable_title'] == true) {
				update_post_meta($post_id, 'enable_title', $enable_title);
			}
			if ($_POST['enable_title'] == false) {
				update_post_meta($post_id, "enable_title", "");
			}

			$enable_price = isset($_POST['enable_price']) ? $_POST['enable_price'] : "";
			if ($_POST['enable_price'] == true) {
				update_post_meta($post_id, 'enable_price', $enable_price);
			}
			if ($_POST['enable_price'] == false) {
				update_post_meta($post_id, "enable_price", "");
			}

			$enable_sku = isset($_POST['enable_sku']) ? $_POST['enable_sku'] : "";
			if ($_POST['enable_sku'] == true) {
				update_post_meta($post_id, 'enable_sku', $enable_sku);
			}
			if ($_POST['enable_sku'] == false) {
				update_post_meta($post_id, "enable_sku", "");
			}

			$enable_image = isset($_POST['enable_image']) ? $_POST['enable_image'] : "";
			if ($_POST['enable_image'] == true) {
				update_post_meta($post_id, 'enable_image', $enable_image);
			}
			if ($_POST['enable_image'] == false) {
				update_post_meta($post_id, "enable_image", "");
			}

			$enable_categories = isset($_POST['enable_categories']) ? $_POST['enable_categories'] : "";
			if ($_POST['enable_categories'] == true) {
				update_post_meta($post_id, 'enable_categories', $enable_categories);
			}
			if ($_POST['enable_categories'] == false) {
				update_post_meta($post_id, "enable_categories", "");
			}

			$enable_tags = isset($_POST['enable_tags']) ? $_POST['enable_tags'] : "";
			if ($_POST['enable_tags'] == true) {
				update_post_meta($post_id, 'enable_tags', $enable_tags);
			}
			if ($_POST['enable_tags'] == false) {
				update_post_meta($post_id, "enable_tags", "");
			}

			$enable_description = isset($_POST['enable_description']) ? $_POST['enable_description'] : "";
			if ($_POST['enable_description'] == true) {
				update_post_meta($post_id, 'enable_description', $enable_description);
			}
			if ($_POST['enable_description'] == false) {
				update_post_meta($post_id, "enable_description", "");
			}

			$description_range = isset($_POST['description_range']) ? $_POST['description_range'] : "";
			if ($_POST['description_range'] == true) {
				update_post_meta($post_id, 'description_range', $description_range);
			}
			if ($_POST['description_range'] == false) {
				update_post_meta($post_id, "description_range", "");
			}
		}

		public function show_product_callback_wp()
		{
			global $product;
			global $post;
			$product_id = $post->ID;
			$checbox = get_post_meta($product_id, 'enable_chkbox', true);
			if ($checbox == "yes")

				$url = $_POST['url'];
			$product_id = url_to_postid($url);

			// product content
			$content_post = get_post($product_id);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);

			$output = "";
			$output .= get_the_post_thumbnail($product_id, 'medium');;
			$output .= $content;

			echo $output;
			exit();
		}

		public function quickview_data_fetch()
		{
			$p_id = $_POST['product_id'];
			$this->ajax_pop_up($p_id);
			wp_die();
		}
		
	
		public function ajax_pop_up($p_id)
		{
		?>
			<div class="woocommerce-notices-wrapper"></div>
			<div id="product-168" class="ast-article-single product type-product post-168 status-publish first instock product_cat-groceries has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
				<div class="row">
					<div class="col-8">
						<!-- <img src="<?= get_the_post_thumbnail_url($p_id); ?>" alt="img"> -->
						<?php if( get_post_meta($p_id, 'enable_image', true) == 'yes' ){ $product = new WC_Product($p_id); echo $product->get_image( "large" );} ?>
					</div>
					<div class="col-4 ps-0 ms-0">
						<!-- <div class="summary entry-summary"> -->
						<h1 class="product_title entry-title"><?php if( get_post_meta($p_id, 'enable_title', true) == 'yes' ){ $product = new WC_Product($p_id); echo $product->get_name(); } ?></h1>
						<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span><?php  if( get_post_meta($p_id, 'enable_price', true) == 'yes' ){ $product = new WC_Product($p_id); echo $product->get_price_html(); } ?></bdi></span></p>
						<div class="woocommerce-product-details__short-description">
							<p><?php if( get_post_meta($p_id, 'enable_description', true) == 'yes' ){ $product = new WC_Product($p_id); echo $product->get_short_description(); }?></p>
						</div>
						<div class="product_meta">
							<span class="posted_in"><a href="http://localhost/Quickview/index.php/product-category/groceries/" rel="tag"><?php if( get_post_meta($p_id, 'enable_categories', true) == 'yes' ){ $product = new WC_Product($p_id); echo "Category: ". $product->get_categories(); } ?></a></span>
						</div>
						<div class="product_meta">
							<span class="posted_in"><?php if( get_post_meta($p_id, 'enable_sku', true) == 'yes' ){ $product = new WC_Product($p_id); echo "SKU: ".$product->get_sku(); }?></span>
						</div>
						<div class="product_meta">
							<span class="posted_in"><?php $product = new WC_Product($p_id); if( get_post_meta($p_id, 'enable_tags', true) == 'yes' ){ echo "Tags: "; foreach (get_terms( 'product_tag' ) as $key => $value) { echo $value->name . " "; }} ?></a></span>
						</div>
						<!-- </div> -->
					</div>
				</div>
			</div>
		<?php
		}

		public function pop_up()
		{
		?>
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" style="max-width:80%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="ast-woocommerce-container" id="view_modal">

							</div>
						</div>
					</div>
				</div>
			</div>

		<?php

		}
	}
}


new WQC_product_setting();
