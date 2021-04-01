<?php
remove_action('welcome_panel', 'wp_welcome_panel');
function rc_my_welcome_panel() { 
?>
<div class="custom-welcome-panel-content">
  <h3 style="padding: 0px 12px 12px 0px;"><?php _e( 'Welcome to Manager site !' ); ?></h3>
  <p class="about-description">
    <?php _e( 'Here you can place your custom text, give your customers instructions, place an ad or your contact information.' ); ?>
  </p>
  <div class="welcome-panel-column-container">
    <div class="welcome-panel-column">
      <h4><?php _e( "Let's Get Started" ); ?></h4>
      <p class="hide-if-no-customize">
        <?php printf( __( 'or, <a href="%s">Edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
    </div>
  </div>
  <div class="">
    <h3><?php _e( 'If you need more space' ); ?></h3>
    <p class="about-description">Create a new paragraph!</p>
    <p>Write your custom message here.</p>
  </div>
</div>
<?php
}
add_action( 'welcome_panel', 'rc_my_welcome_panel' );
/*-----------------------------------------------------------------------*/
function dashboard_widget_function( $post, $callback_args ) {
echo "Hello World, this is my first Dashboard Widget!";
}

function add_dashboard_widgets() {
wp_add_dashboard_widget('dashboard_widget', 'Dashboard Widget', 'dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
/*-----------------------------------------------------------------------*/
function dashboard_widget_about( $post, $callback_args ) {
echo "Hello World, this is my first Dashboard Widget!";
}
function add_dashboard_about() {
wp_add_dashboard_widget('dashboard_about', 'Dashboard Widget', 'dashboard_widget_about');
}
add_action('wp_dashboard_setup', 'add_dashboard_about' );
/*-----------------------------------------------------------------------*/
function remove_dashboard_meta() {
remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );
/*-----------------------------------------------------------------------*/
function admin_remove() {
global $wp_admin_bar;
$current_user = wp_get_current_user();
$wp_admin_bar->remove_menu('wp-logo');
if($current_user->ID!=1){
include('user-editor.php');		
$wp_admin_bar->remove_menu( 'comments' );
$wp_admin_bar->remove_menu('new-content');
}
}
/*-----------------------------------------------------------------------*/
add_action('wp_before_admin_bar_render', 'admin_remove', 0);
/*-----------------------------------------------------------------------*/

add_action('admin_head', 'mytheme_remove_help_tabs');
function mytheme_remove_help_tabs() {
$screen = get_current_screen();
$screen->remove_help_tabs();
}
/*-------------------------------------------------------------------*/
function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
//if( strpos( $src, '?version=' ) ) $src = remove_query_arg( 'version', $src );

//return $src;
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
/*-----------------------------------------------------------------------*/
//Hide update core version
function wp_hide_update() {
global $current_user;
get_currentuserinfo();
if ($current_user->ID != 1) { // only admin will see it
remove_action( 'admin_notices', 'update_nag', 3 );
}
}
add_action('admin_menu','wp_hide_update');
function change_footer_admin () {echo 'Nguyen Minh Viet';}
add_filter('admin_footer_text', 'change_footer_admin');
if ( !function_exists('ctt_hideversionfooter') ) {
function ctt_hideversionfooter($upgrade) {
if ( !current_user_can('update_core')) {
$thongtin = contactInfo();
echo '<a href='.$thongtin['website'].' target="_blank">'.$thongtin['website'].'</a>';
}
else {return $upgrade;}
}
add_filter('update_footer', 'ctt_hideversionfooter', 100);
}
?>
