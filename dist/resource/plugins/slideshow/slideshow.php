<?php
/**
 * Plugin Name: Sideshow
 * Plugin URI: http://webrewa.com/plugin/slideshow
 * Description: Quan ly Banner
 * Version: 1.1.0
 * Author: Nguyen Minh Viet
 * Author URI: http://webrewa.com
 */
if(is_admin()){
	wp_register_style('slideshow-styles', plugins_url('css/slideshow.css', __FILE__));
	wp_enqueue_style('slideshow-styles');	
	wp_register_script('slideshow', plugins_url('/js/slideshow.js', __FILE__));
	wp_enqueue_script('slideshow');
	wp_register_script('fancybox-pack', plugins_url('/fancybox/lib/jquery.mousewheel-3.0.6.pack.js', __FILE__));
	wp_enqueue_script('fancybox-pack');
    wp_register_script('fancybox', plugins_url('/fancybox/source/jquery.fancybox.js', __FILE__));
	wp_enqueue_script('fancybox');
	wp_register_style('fancybox-style', plugins_url('/fancybox/source/jquery.fancybox.css', __FILE__));
	wp_enqueue_style('fancybox-style');
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'functions.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'settings-slideshow.php');
?>