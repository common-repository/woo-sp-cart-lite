<?php
//languages textdomain settings
function woo_sp_cart_languages() {
	load_plugin_textdomain('woo_sp_cart_lite', false, dirname( plugin_basename( __FILE__ ) ).'/languages/');
}
add_action('plugins_loaded','woo_sp_cart_languages');

//get animation class
function woo_sp_cart_get_animation_class($woo_sp_cart_animation_button) { 
	$woo_sp_cart_animation_button = strtolower($woo_sp_cart_animation_button);
	if($woo_sp_cart_animation_button == 'none'){$animation_class = ' ';}   
    if($woo_sp_cart_animation_button == 'rotate'){$animation_class = 'ak86_rotate';}             	
    if($woo_sp_cart_animation_button == 'tada'){$animation_class = 'ak86_tada';}   
    if($woo_sp_cart_animation_button == 'swing'){$animation_class = 'ak86_swing';}   
    if($woo_sp_cart_animation_button == 'grow'){$animation_class = 'ak86_grow';} 
    if($woo_sp_cart_animation_button == 'shrink'){$animation_class = 'ak86_shrink';}
    if($woo_sp_cart_animation_button == 'buzz'){$animation_class = 'ak86_buzz';} 
    if($woo_sp_cart_animation_button == 'forward'){$animation_class = 'ak86_forward';}
    if($woo_sp_cart_animation_button == 'backward'){$animation_class = 'ak86_backward';} 
	return $animation_class;
}

//get count product in cart
function woo_sp_cart_count(){
    echo WC()->cart->get_cart_contents_count();
}
add_action('wp_ajax_woo_sp_cart_count', 'woo_sp_cart_count');
add_action('wp_ajax_nopriv_woo_sp_cart_count', 'woo_sp_cart_count');
?>