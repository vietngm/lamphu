<?php
/*-----------------------------------------------------------------------*/
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/*-----------------------------------------------------------------------*/
remove_action('wp_head', 'rest_output_link_wp_head', 10); 
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10,0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

function stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		wp_deregister_script('jquery');
	}
}
add_action('init', 'stop_loading_wp_embed_and_jquery');
?>