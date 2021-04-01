<?php
ob_start();
/*
Plugin name: Post Manager
Version: 2.1
Description: Automatic setup News Post Type - News Funcion to template.
Author: Peto hito
Author URI: http://webrewa.com
Plugin URI: http://webrewa.com
*/
/* Version wordpress check*/
global $wp_version;
global $post;$prefix = '';

$exit_msg='This Plugin require Wordpress 3.0 or newer.<a href="http://codex.wordpress.org/Upgrading_Wordpress"></a>';
if(version_compare($wp_version,"3.0","<")){exit($exit_msg);	}

if(is_admin()){
include('../wp-includes/pluggable.php');
wp_register_style('myStyleSheets', plugins_url('/css/style-post.css', __FILE__));
wp_enqueue_style( 'myStyleSheets');
/*-- date--*/
wp_register_style('myStyle_jqueryui', plugins_url('/css/jquery-ui-1.8.18.custom.css', __FILE__));    
wp_register_script('my_script_jqueryui_handle', plugins_url("/js/jquery-ui-1.8.18.custom.min.js", __FILE__));
wp_register_script('my_script_jqueryui_time_handle', plugins_url("/js/jquery-ui-timepicker-addon.js", __FILE__));
wp_register_script('farbtastic', plugins_url("/js/farbtastic.js", __FILE__));
wp_enqueue_script('farbtastic', plugins_url("/js/farbtastic.js", __FILE__));

/*--end date --*/
wp_register_script('my_script_handle', plugins_url("/js/function.js", __FILE__));
wp_enqueue_script('my_script_handle', plugins_url("/js/function.js", __FILE__));
wp_register_script('my_script_handle1', plugins_url("/js/tax-thumbnail.js", __FILE__));
wp_enqueue_script('my_script_handle1', plugins_url("/js/tax-thumbnail.js", __FILE__));
function enqueue_media() {if( function_exists( 'wp_enqueue_media' )){wp_enqueue_media();}}
add_action('admin_enqueue_scripts', 'enqueue_media');
wp_enqueue_script( 'custom-header' );
/*--Gallery--*/

wp_register_script('gallery-funtions', plugins_url('/js/gallery.js', __FILE__));
wp_enqueue_script('gallery-funtions');
add_image_size('gallery_admin_thumb',100,100,true);
/*--Picker color--*/
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script('iris',admin_url( 'js/iris.min.js' ),array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),false,1);
wp_enqueue_script('wp-color-picker',admin_url( 'js/color-picker.min.js' ),array( 'iris' ),false,1);
}

/* Admin option page */
/* Install Post manager Plugin */
global $mcp_db_version;
$mcp_db_version = '1.0';
$table_name = $wpdb->prefix . "mcp";
$table_name_relate = $wpdb->prefix . "mcp_relate";
function mcp_install() {
global $wpdb;
global $table_name;
$sql = "CREATE TABLE $table_name (
id mediumint(9) NOT NULL AUTO_INCREMENT,
name VARCHAR(55) DEFAULT '' NOT NULL,
custom_type VARCHAR(55) DEFAULT '' NOT NULL,
editor VARCHAR(5) DEFAULT '',
excerpt VARCHAR(5) DEFAULT '',
thumnail VARCHAR(5) DEFAULT '',
comment VARCHAR(5) DEFAULT '',
author VARCHAR(5) DEFAULT '',
hidemenu VARCHAR(5) DEFAULT '',
search VARCHAR(5) DEFAULT '',
album VARCHAR(5) DEFAULT '',
capability VARCHAR(5) DEFAULT '',
UNIQUE KEY id (id)
);";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
}
function mcp_install_relate(){
global $wpdb;
global $table_name_relate;
global $mcp_db_version;
$sql = "CREATE TABLE $table_name_relate (
id mediumint(9) NOT NULL AUTO_INCREMENT,
option_id mediumint(9) NOT NULL,
khoa VARCHAR(55) DEFAULT '' NOT NULL,
giatri VARCHAR(55) DEFAULT '' NOT NULL,
UNIQUE KEY id (id)
);";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
add_option("mcp_db_version", $mcp_db_version);
}
///////////////////////FUNCTION///////////////////////////////////////////////////////////////
function mcp_isert_data($title,$type,$editor,$excerpt,$thumnail,$author,$comments,$hide,$search,$album,$capability) {
global $wpdb;
global $table_name;
$rows_affected = $wpdb->insert( $table_name, array( 
'name' => $title, 
'custom_type' => $type, 
'editor' => $editor, 
'excerpt' => $excerpt, 
'thumnail' => $thumnail, 
'comment' => $comments, 
'author' => $author, 
'hidemenu' =>$hide,
'search' => $search,
'album'	=> 	$album,
'capability' => $capability ) );
return $rows_affected;
}
function mcp_delete_data($id){
global $wpdb;
global $table_name;
$sql="DELETE FROM ".$table_name." WHERE id = ".$id;
$query = $wpdb->query( $sql );
return $query;
}
function mcp_getallid_data(){
global $wpdb;
global $table_name;
$sql="SELECT id FROM ".$table_name;
$query = $wpdb->get_results($sql);
return $query;
}
function mcp_getall_data(){
global $wpdb;
global $table_name;
$sql="SELECT * FROM ".$table_name;
$query = $wpdb->get_results($sql);
return $query;
}
function get_option_by_type($type){
global $wpdb;
global $table_name;
$sql="SELECT * FROM ".$table_name." WHERE custom_type = '".$type."'";
$query = $wpdb->get_results($sql);
return $query;
}   
function get_option_by_id($optionID){
global $wpdb;
global $table_name;
$sql="SELECT * FROM ".$table_name." WHERE id = '".$optionID."'";
$query = $wpdb->get_results($sql);
return $query;
}
function get_option_term_id($type){
global $wpdb;
global $table_name_relate;
$sql="SELECT id FROM ".$table_name_relate." WHERE giatri = '".$type."'";
$query = $wpdb->get_results($sql);
return $query;
}        
function mcp_isert_relate_data($optionid,$khoa,$giatri) {
global $wpdb;
global $table_name_relate;
$rows_affected = $wpdb->insert( $table_name_relate, array( 'option_id' => $optionid,'khoa' => $khoa, 'giatri' => $giatri ) );
return $rows_affected;
}
function mcp_update_relate_data($optionid,$khoa,$giatri) {
global $wpdb;
global $table_name_relate;
$sql="UPDATE ".$table_name_relate."SET giatri ='".$giatri."' WHERE option_id = '".$optionid."' and khoa='".$khoa."'";
return $query;
}
function mcp_get_relate_data($optionid,$khoa){
global $wpdb;
global $table_name_relate;
$sql="SELECT * FROM ".$table_name_relate." WHERE option_id = '".$optionid."' and khoa='".$khoa."'";
$query = $wpdb->get_results($sql);
return $query;
}
function mcp_getall_relate_data($optionid){
global $wpdb;
global $table_name_relate;
$sql="SELECT * FROM ".$table_name_relate." WHERE option_id = '".$optionid."'";
$query = $wpdb->get_results($sql);
return $query;
}
function mcp_getall_relate_term_data($giatri){
global $wpdb;
global $table_name_relate;
$sql="SELECT * FROM ".$table_name_relate." WHERE giatri = '".$giatri."'";
$query = $wpdb->get_results($sql);
return $query;
}
function mcp_getall_relate_data_bykhoa($khoa){
global $wpdb;
global $table_name_relate;
$sql="SELECT * FROM ".$table_name_relate." WHERE khoa = '".$khoa."'";
$query = $wpdb->get_results($sql);
return $query;
}
function is_exits_relate_option($optionID,$khoa)
{
global $wpdb;
global $table_name_relate;
$sql="SELECT id FROM ".$table_name_relate." WHERE option_id = '".$optionid."' and khoa='".$khoa."'";
$query = $wpdb->get_results($sql);
$count=count($query);
if ($count >0) return true;
else return false;
}
function mcp_delete_relate_data($optionid,$khoa){
global $wpdb;
global $table_name_relate;
$sql="DELETE FROM ".$table_name_relate." WHERE option_id = ".$optionid." and khoa='".$khoa."'";
$query = $wpdb->query( $sql );
return $query;
}
function mcp_delete_relate_data_byid($id){
global $wpdb;
global $table_name_relate;
$sql="DELETE FROM ".$table_name_relate." WHERE id = ".$id;
$query = $wpdb->query( $sql );
return $query;
}
function mcp_relate_delete_data($optionid) {
global $wpdb;
global $table_name_relate;
$sql="DELETE FROM ".$table_name_relate." WHERE option_id = '".$optionid."'";
$query = $wpdb->query( $sql );
return $query;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (is_admin()){ 
$current_admin_page = substr(strrchr($_SERVER['PHP_SELF'], '/'),1, -4); 
if ($current_admin_page == 'page' || $current_admin_page == 'page-new' || $current_admin_page == 'post' || $current_admin_page == 'post-new') {
function add_post_enctype() { 
echo "<script type='text/javascript'>
jQuery(document).ready(function(){ jQuery('#post').attr('enctype','multipart/form-data'); 
jQuery('#post').attr('encoding', 'multipart/form-data');
});
</script>"; 
} 
add_action('admin_head', 'add_post_enctype'); 
} 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
$installed_ver = get_option( "mcp_db_version" );
if( $installed_ver != $mcp_db_version ) {
mcp_install_relate();
mcp_install();
update_option( "mcp_db_version", $mcp_db_version );
}
/*    
function mcp_update_db_check() {
global $newsjal_db_version;
if (get_site_option('mcp_db_version') != $mcp_db_version) {
mcp_install_relate();
mcp_install();
}
}
add_action('plugins_loaded', 'mcp_update_db_check');
*/    
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// create custom plugin settings menu
add_action('admin_menu', 'mcp_create_menu');
function mcp_create_menu() {
//create new top-level menu
add_menu_page(__('Post Manager','menu-mcp'), __('Post Manager','menu-mcp'), 'manage_options', 'mcp-top-level-handle', 'setting_post_manager','dashicons-admin-generic');
//ADD SUB MENU
$all_mcp_option=mcp_getall_data();    
if(is_array($all_mcp_option)){        
foreach($all_mcp_option as $mcp_option){            
if($mcp_option->hidemenu == 'on'){remove_menu_page( 'edit.php?post_type='.$mcp_option->custom_type );}
add_submenu_page('mcp-top-level-handle', __($mcp_option->name,'menu-mcp'), __($mcp_option->name,'menu-mcp'), 'manage_options', $mcp_option->custom_type, 'manager_submenu_settings_post');            
}
}
//add_submenu_page('mcp-top-level-handle', __('Images size','menu-mcp'), __('Images size','menu-mcp'), 'manage_options', 'images-size', 'manager_submenu_settings_post1');    
//call register settings function
add_action( 'admin_init', 'register_mysettings' );
//add_submenu_page( 'setting_post_manager', 'My Plugin Option New', 'My Plugin', 'my-unique-identifier', 'manage_options');
}
function register_mysettings() {
//register our settings
register_setting( 'mcp-settings-group', 'new_option_category' );
register_setting( 'mcp-settings-group', 'new_option_custom_field' );    
}
function setting_post_manager() {
global $wp_db;
global $table_name;
include('post-option.php');
}
function manager_submenu_settings_post() {
global $wp_db;
global $table_name;
include('post-sub-option.php');
} 
/* ADMIN*/
/* Add Post Type*/
add_action('init', 'create_mcp_post_type');
function create_mcp_post_type(){
global $wpdb,$wp_roles;
$sql="SELECT * FROM wp_mcp";
$all_mcp_option = $wpdb->get_results($sql);
foreach($all_mcp_option as $mcp_option){
$name=$mcp_option->name;
$type=$mcp_option->custom_type;
$editor=$mcp_option->editor;
$excerpt=$mcp_option->excerpt;
$thumnail=$mcp_option->thumnail;
$comment=$mcp_option->comment;
$author=$mcp_option->author;
$search=$mcp_option->search;
$album=$mcp_option->album;
$capability=$mcp_option->capability;
if($editor == 'on'){$editor="editor";}
if($excerpt == 'on'){$excerpt="excerpt";}
if($thumnail == 'on'){$thumnail="thumbnail";}
if($comment == 'on'){$comment="comments";}
if($author == 'on'){$author="author";}
if($album == 'on'){$album="album";}
$str_type= array('title',$editor,$excerpt,$thumnail,$comment,$author,$album);
$args = array(
'labels'  =>  array(
'name'  =>  __($name),
'singular_name' =>  __($name),
'add_new' =>  __('Add '.$name),
'add_new_item'  =>  __('Add New '),
'edit'  =>  __('Edit'),
'edit_item' =>  __('Edit '),
'new_item'  =>  __('New'),
'view'  =>  __('View'),
'view_item' =>  __('View Item'),
'search_items' =>  __('Search '.$name),
'not_found' =>  __('No news found'),
'not_found_in_trash'  =>  __('No item found in Trash')
),
'public'  =>  true,
'show_ui' =>  true,
'publicy_queryable' =>  true,
'exclude_from_search' =>  ($search=="on")?false:true,
'menu_position' => 4,                    
'hierarchical'  => false,
'query_var' =>  true,
'rewrite' =>  array( 'slug' => $type, 'with_front' =>  false),
'supports'  =>  $str_type,
'can_export'  =>  true,
//'register_meta_box_cb'  =>  'call_to_function_do_something',
'description' =>  __($name.' description here.'),
'has_archive' => true
);
/* Add capability to this post type */
$capabilities = array(
"edit_{$type}",
"read_{$type}",
"delete_{$type}",
"edit_{$type}s",
"edit_others_{$type}s",
"publish_{$type}s",
"read_private_{$type}s",
"delete_{$type}s",
"delete_private_{$type}s",
"delete_published_{$type}s",
"delete_others_{$type}s",
"edit_private_{$type}s",
"edit_published_{$type}s"
);
if($capability=='on'){
$args['capability_type'] = $type;
$args['capabilities'] = $capabilities;
foreach($capabilities as $cap){$wp_roles->add_cap("administrator",$cap);}
}else{
// remove all capabilities
$roles = $wp_roles->get_names();
foreach($roles as $role => $role_name){
$role = get_role($role);
foreach($capabilities as $cap){$role->remove_cap($cap);}
}
}
register_post_type($type,$args );
for($i=1;$i<=10;$i++){
$taxonomy='';
$khoa_type='taxonomy-type'.$i;
$khoa_name='taxonomy-name'.$i;
$khoa_manager = 'taxonomy-manager'.$i;
$khoa_isTag = 'taxonomy-isTag'.$i;

$taxonomy['type']=mcp_get_relate_data($mcp_option->id,$khoa_type);
$taxonomy['name']=mcp_get_relate_data($mcp_option->id,$khoa_name);
$taxonomy['manager'] = mcp_get_relate_data($mcp_option->id,$khoa_manager);
$taxonomy['isTag'] = mcp_get_relate_data($mcp_option->id,$khoa_isTag);

if($taxonomy['type'][0]->giatri != ''){
$tax_args = array(
'hierarchical'  =>  true,
'labels'  =>  array(
'name'  =>  __($taxonomy['name'][0]->giatri),
'singular_name' =>  __($taxonomy['name'][0]->giatri),
'add_new' =>  __('Add new'),
'add_new_item'  =>  __('Add new '.$taxonomy['name'][0]->giatri),
'new_item'  =>  __($taxonomy['name'][0]->giatri),
'search_items' =>  __('Search '.$taxonomy['name'][0]->giatri),
),
'public'  =>  true,
'show_ui' =>  true,
'query_var' =>  $taxonomy['type'][0]->giatri,
'rewrite' =>  array('slug'  =>  $taxonomy['type'][0]->giatri, 'with_front' =>  false),
);
// Store capabilities
$capabilities = array(
'manage_terms' 	=> 'manage_'.$taxonomy['type'][0]->giatri.'_terms',
'edit_terms' 	=> 'edit_'.$taxonomy['type'][0]->giatri.'_terms',
'delete_terms' 	=> 'delete_'.$taxonomy['type'][0]->giatri.'_terms',
'assign_terms' 	=> 'assign_'.$taxonomy['type'][0]->giatri.'_terms'
);

if($taxonomy['manager'][0]->giatri == 'on') {
$tax_args['capabilities'] = $capabilities;
// add capabilities
foreach($capabilities as $cap){$wp_roles->add_cap("administrator",$cap);}
}else{
// remove all capabilities
$roles = $wp_roles->get_names();
foreach($roles as $role => $role_name){
$role = get_role($role);
foreach($capabilities as $cap){
$role->remove_cap($cap);
}
}
}

// check is Tag
if($taxonomy['isTag'][0]->giatri == 'on'){
$tax_args['hierarchical'] = false;
}

register_taxonomy($taxonomy['type'][0]->giatri, $type, $tax_args); 
if( function_exists('qtrans_modifyTermFormFor')){
add_action($taxonomy['type'][0]->giatri.'_add_form', 'qtrans_modifyTermFormFor');
add_action($taxonomy['type'][0]->giatri.'_edit_form','qtrans_modifyTermFormFor');
add_action("admin_head","remove_replace_description");
}                          
}
}
include_once(dirname (__FILE__) . '/post-field-custom.php');                
add_action('admin_menu', 'add_meta_box_type');
add_action('save_post', 'save_type_meta_box', 1, 2);
add_action("manage_posts_custom_column", "my_custom_columns");
add_filter("manage_".$type."_posts_columns", "my_mcp_columns");
add_filter( "manage_edit-".$type."_sortable_columns", "my_mcp_order_id_columns" );
add_action( 'restrict_manage_posts', 'taxonomy_filter_restrict_manage_posts' );
add_filter( 'parse_query', 'taxonomy_filter_post_type_request' );
/*--------------------------------------------------------------------------------------------------------------*/
}  
}
/*--------------------------------------------------------------------------------------------------------------*/
if(!function_exists("remove_replace_description")){
function remove_replace_description(){ ?>
<script>
jQuery(function($){
$("#tag-description,#description,#addtag #wp-description_vi-wrap,#addtag #wp-description_en-wrap").parents(".form-field").remove();
$(".tags #description").css({width: "0px"});
});
</script>
<?php
}
}
/*--------------------------------------------------------------------------------------------------------------*/
// Function to create album box in post type
add_action( 'add_meta_boxes', 'create_album_in_post_type' );
//add_action('admin_menu', 'create_album_in_post_type');
function create_album_in_post_type(){
global $wpdb, $post, $typenow,$gallery;
$mediaSize=getSizefromMedia();
$sql="SELECT * FROM wp_mcp";
$all_mcp_option = $wpdb->get_results($sql);
foreach($all_mcp_option as $mcp_option) {
$name=$mcp_option->name;
$type = $mcp_option->custom_type;
$album=$mcp_option->album;
if($album!="on") continue;
add_meta_box($gallery['id'], $gallery['title'].$mediaSize, 'gallery_show_box', $type, $gallery['context'], $gallery['priority']);
}
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-gallery.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'functions.php');
/*--------------------------------------------------------------------------------------------------------------*/
add_action("init","add_meta_field_taxonomy");
function add_meta_field_taxonomy(){
require_once("tax-meta-class.php");
if (is_admin()){
$mcp_custom_ids =mcp_getallid_data();
foreach($mcp_custom_ids as $mcp_custom_id){
for($d=1;$d<=10;$d++){
$khoa_type='taxonomy-type'.$d;
$term_slug=mcp_get_relate_data($mcp_custom_id->id,$khoa_type);
if($term_slug[0]->giatri !=''){$term_array[]=$term_slug[0]->giatri;}
}
}
$count_arr=count($term_array);
if($count_arr != 0){   
foreach($term_array as $term_onl){
$config = array(
'id' => 'demo_meta_box',          // meta box id, unique per meta box
'title' => 'Demo Meta Box',          // meta box title
'pages' => array($term_onl),        // taxonomy name, accept categories, post_tag and custom taxonomies
'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
'fields' => array(),            // list of meta fields (can be added by field arrays)
'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);
/*
* Initiate your meta box
*/ 
$my_meta =  new Tax_Meta_Class($config);

// qTranslate enalbe description for multilang
/*include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('qtranslate/qtranslate.php')) {
global $q_config;
foreach($q_config['enabled_languages'] as $lang){
$my_meta->addWysiwyg("description_".$lang ,array('name'=>"Description (".$q_config['language_name'][$lang].")"));
}
}*/
/*
* Add fields to your meta box
*/  
$idterms=mcp_getall_relate_term_data($term_onl);
foreach($idterms as $idterm){   
for($b=1;$b<=30;$b++){
$key_term_meta_name="field_term_".$idterm->id."_name".$b;
$key_term_meta_slug="field_term_".$idterm->id."_slug".$b;
$key_term_meta_type="field_term_".$idterm->id."_type".$b;
//echo($term_onl);
$val_term_meta_name=mcp_get_relate_data($idterm->option_id,$key_term_meta_name);
$val_term_meta_slug=mcp_get_relate_data($idterm->option_id,$key_term_meta_slug);
$val_term_meta_type=mcp_get_relate_data($idterm->option_id,$key_term_meta_type);
if($val_term_meta_name){
if($val_term_meta_type[0]->giatri == 1){$my_meta->addText($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));} 
if($val_term_meta_type[0]->giatri == 2){$my_meta->addTextarea($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}
if($val_term_meta_type[0]->giatri == 3){$my_meta->addCheckbox($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}
if($val_term_meta_type[0]->giatri == 4){$my_meta->addDate($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}
if($val_term_meta_type[0]->giatri == 5){$my_meta->addTime($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}
if($val_term_meta_type[0]->giatri == 6){$my_meta->addColor($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}                  
if($val_term_meta_type[0]->giatri == 7){$my_meta->addImage($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}
if($val_term_meta_type[0]->giatri == 8){$my_meta->addFile($prefix.$val_term_meta_slug[0]->giatri,array('name'=> $val_term_meta_name[0]->giatri));}                 
}
}
}
$my_meta->Finish();
}
}    
}
}
//--------------------------------------------------------------------------------------------------------------------//
function getPostID(){
$post_id = $_GET['post'];
$new_title = get_the_title($post_id);
$new_slug = sanitize_title( $new_title );	
update_post_meta($post_id,'masp','DE-'.$post_id);

$pos = strpos($new_title, $post_id);
if ($pos === false) {
$my_post = array(
'ID'           => $post_id,
'post_title' => $new_title.' '.$post_id,
'post_name' => $new_slug.' '.$post_id
);

$post = $_GET['post_type'];
if($post=='')
$post = get_post_type($_GET['post']);
if($post!='page')
wp_update_post($my_post);
}
}
//add_action('init','getPostID');
//--------------------------------------------------------------------------------------------------------------------//
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'tax-thumbnail.php');
//--------------------------------------------------------------------------------------------------------------------//
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-clear-character.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-cats-checklist.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-mail-smtp.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-contact-manager.php');
//--------------------------------------------------------------------------------------------------------------------//
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-tax-sort.php');
//--------------------------------------------------------------------------------------------------------------------//
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'setting-page/setting-page.php');
//--------------------------------------------------------------------------------------------------------------------//
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-thumbnail.php');
//--------------------------------------------------------------------------------------------------------------------//
?>