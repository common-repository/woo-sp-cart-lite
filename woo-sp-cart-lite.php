<?php
/*
Plugin Name: Woo Floating Cart Lite
Plugin URI: http://web-cude.com/woo_sp_cart/
Description: Woo Floating Cart is a WordPress plugin which can create floating cart in your site.
Version: 1.0.1  
Text Domain: woo_sp_cart_lite
Domain Path: /languages
Author: spoot1986
Author URI: http://web-cude.com
*/

//require scripts
require_once(plugin_dir_path(__FILE__).'woo-sp-cart-scripts.php');
//require styles
require_once(plugin_dir_path(__FILE__).'woo-sp-cart-styles.php');
//require functions
require_once(plugin_dir_path(__FILE__).'woo-sp-cart-functions.php');
//require classes
require_once(plugin_dir_path(__FILE__).'woo-sp-cart-classes.php');
//require admin
require_once(plugin_dir_path(__FILE__).'woo-sp-cart-widgets.php');
?>