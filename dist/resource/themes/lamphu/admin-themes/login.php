<?php
function custom_login_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/admin-themes/login/login-styles.css" />';
}
add_action('login_head', 'custom_login_css');

function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	$thongtin = contactInfo();
	return $thongtin['website'];	
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//Remove the Lost Password Link
function remove_lostpassword_text ( $text ) {
if ($text == 'Lost your password?'){$text = '';}
return $text;
}
add_filter( 'gettext', 'remove_lostpassword_text' );
add_action( 'login_head', 'hide_login_nav' );

function hide_login_nav(){
?><style>
#nav {
  display: none
}

</style><?php
}
function remove_backsite_text ( $text ) {
if ($text == '&larr; Back to %s'){$text = '';}
return $text;
}
//add_filter( 'gettext', 'remove_backsite_text' );

//Hide the Login Error Message
add_filter('login_errors',create_function('$a', "return null;"));

//Change the Redirect URL
function admin_login_redirect( $redirect_to, $request, $user ){
global $user;
if( isset( $user->roles ) && is_array( $user->roles ) ) {
if( in_array( "administrator", $user->roles ) ) {
return $redirect_to;
} else {
return home_url();
}
}
else
{
return $redirect_to;
}
}

//--------------------------------------------------------------------------
function custom_logout_message() {
	if ( isset($_GET['loggedout']) && TRUE == $_GET['loggedout'] ){
		$message = "";
	}
	else{
		$message = "";
	}
	return $message;
}
add_filter('login_message', 'custom_logout_message');
add_filter('login_title', 'custom_login_title', 99);
function custom_login_title() {
    return get_bloginfo('name');
}
//--------------------------------------------------------------------------
function add_site_favicon() {
    echo '<link rel="shortcut icon" href="'.get_site_url().'/assets/images/share/meta/favicon.png" type="image/x-icon" />';
}

add_action('login_head', 'add_site_favicon');
add_action('admin_head', 'add_site_favicon');
?>
