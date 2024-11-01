<?php
//register & enqueue styles
add_action('wp_enqueue_scripts', 'woo_sp_cart_style');
function woo_sp_cart_style() {
	wp_register_style('woo-sp-cart-style', plugins_url('assets/css/style.css', __FILE__), false, false, 'all');
	wp_enqueue_style('woo-sp-cart-style');

	wp_register_style('ak86_animate', plugins_url('assets/css/ak86_animate.css', __FILE__), false, false, 'all');
	wp_enqueue_style('ak86_animate');
}
?>