<?php
//register and enqueue scripts
add_action('wp_head','woo_sp_cart_scripts');
function woo_sp_cart_scripts() {
	wp_register_script('woo-sp-cart-script', plugins_url('assets/js/script.js', __FILE__));
	wp_enqueue_script('woo-sp-cart-script');
	
	wp_localize_script('woo-sp-cart-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
} 

//enqueue style and script in widget's page
add_action('admin_enqueue_scripts', 'woo_sp_cart_admin_style');
function woo_sp_cart_admin_style($admin_page){
	if('widgets.php' == $admin_page){
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		wp_register_script('woo_sp_cart_widget_script', plugins_url('assets/js/widget-script.js', __FILE__));
		wp_enqueue_script('woo_sp_cart_widget_script');
	}
}
?>