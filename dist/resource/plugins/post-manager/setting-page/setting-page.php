<?php
add_action('admin_menu', 'menu_setting_page');
function menu_setting_page() {
	add_submenu_page( 'mcp-top-level-handle', 'Setting page', 'Settings', 'manage_options', 'custom-submenu-setting-page', 'my_plugin_options');
}

function my_plugin_options() {
if ( !current_user_can( 'manage_options' ) )  {
wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'setting-page-template.php');
}

add_action('admin_menu','remove_thumbnail_box');
function remove_thumbnail_box() {	
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$thumb = get_post_meta($post_id,'op_thumbnail',true);
	if ($thumb=='') {
	  add_action('do_meta_boxes', 'start_remove_thumbnail');
	  function start_remove_thumbnail() {
		remove_meta_box( 'postimagediv','page','side' );
	  }
	}
}

add_action('admin_head','remove_row_wp_list');
function remove_row_wp_list() {	
	$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args);
foreach($pages as $page){
	$hide = get_post_meta($page->ID,'op_hide',true);		
	if ($hide=='on') {?><script>jQuery(function($){$('#post-'+'<?php echo $page->ID; ?>').remove();})</script><?php }
	}
}
add_action( 'add_meta_boxes', 'add_gallery_to_page' );
function add_gallery_to_page(){
	global $gallery;
	$album = get_post_meta($_GET['post'],'op_album',true);	
	if ($album=='on') {
		add_meta_box($gallery['id'], $gallery['title'].' 800 x 600 pixel', 'gallery_show_box', 'page', $gallery['context'], $gallery['priority']);
	}	
}

add_action( 'init', 'add_excerpt_to_page' );
function add_excerpt_to_page(){	
	$excerpt = get_post_meta($_GET['post'],'op_excerpt',true);	
	if ($excerpt=='on') {
		add_post_type_support( 'page', 'excerpt' );
	}	
}
?>