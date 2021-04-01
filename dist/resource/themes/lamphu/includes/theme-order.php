<?php
/*---------------------------------------------------------------------------------------------*/
if($_GET['post_type']!='')
$posttype = $_GET['post_type'];
if(get_post_type($_GET['post']!=''))
$posttype = get_post_type($_GET['post']);
/*---------------------------------------------------------------------------------------------*/
function has_children($post_id) {
$children = get_pages("child_of=$post_id");
if( count( $children ) != 0 ) { return true; } // Has Children
else { return false; } // No children
}
if(function_exists('add_post_type_support')){add_post_type_support($posttype,'page-attributes');}
/**
* add order column to admin listing screen for header text
*/

function add_new_sort_order($columns) {
$columns['menu_order'] = "Order";
return $columns;
}
add_action('manage_edit-'.$posttype.'_columns', 'add_new_sort_order');
/**
* show custom order column values
*/
function show_order_column($name){
global $post;
switch ($name) {
case 'menu_order':
$order = $post->menu_order;
echo $order;
break;
default:
break;
}
}
add_action('manage_'.$posttype.'_posts_custom_column','show_order_column');
/**
* make column sortable
*/
function order_column_register_sortable($columns){
$columns['menu_order'] = 'menu_order';
return $columns;
}
add_filter('manage_edit-'.$posttype.'_sortable_columns','order_column_register_sortable');
/**
* Sap xep he thong
*/
function add_sortable_script(){
global $wp_query,$posttype;	
$screen = get_current_screen();
if ( current_user_can('edit_others_pages') && $screen->id == 'edit-'.$posttype && isset( $wp_query->query['orderby'] ) && $wp_query->query['orderby'] == 'menu_order title' ) {
wp_enqueue_script( 'script_post_ordering', get_template_directory_uri() . '/functions/js/post-ordering.js', array('jquery-ui-sortable'), '1.0', true );
}
}
add_action("admin_head","add_sortable_script");
function post_default_sorting_link( $views ) {
global $post_type, $wp_query;
if ( ! current_user_can('edit_others_pages') ) return $views;
$class = ( isset( $wp_query->query['orderby'] ) && $wp_query->query['orderby'] == 'menu_order title' ) ? 'current' : '';
$query_string = remove_query_arg(array( 'orderby', 'order' ));
$query_string = add_query_arg( 'orderby', urlencode('menu_order title'), $query_string );
$query_string = add_query_arg( 'order', urlencode('ASC'), $query_string );
$views['byorder'] = '<a href="'. $query_string . '" class="' . $class . '">Order</a>';
return $views;
}
add_filter( 'views_edit-'.$posttype, 'post_default_sorting_link' );
/**Ajax request handling for product ordering */
function custom_post_ordering() {
global $wpdb,$post,$posttype;
$REFERRER = $_SERVER['HTTP_REFERER']; // Or other method to get a URL for decomposition	
$query = parse_url($REFERRER, PHP_URL_QUERY);
parse_str($query, $params);
$posttype = $params['post_type'];
// check permissions again and make sure we have what we need
if ( ! current_user_can('edit_posts') || empty( $_POST['id'] ) || ( ! isset( $_POST['previd'] ) && ! isset( $_POST['nextid'] ) ) )
die(-1);
// real post?
if ( ! $post = get_post( $_POST['id'] ) )
die(-1);
header( 'Content-Type: application/json; charset=utf-8' );
$previd = isset( $_POST['previd'] ) ? $_POST['previd'] : false;
$nextid = isset( $_POST['nextid'] ) ? $_POST['nextid'] : false;
$new_pos = array(); // store new positions for ajax
$siblings = $wpdb->get_results( $wpdb->prepare('
SELECT ID, menu_order FROM %1$s AS posts
WHERE 	posts.post_type 	= \''.$posttype.'\'
AND 	posts.post_status 	IN ( \'publish\', \'pending\', \'draft\', \'future\', \'private\' )
AND 	posts.ID			NOT IN (%2$d)
ORDER BY posts.menu_order ASC, posts.ID DESC
', $wpdb->posts, $post->ID) );
$menu_order = 0;
foreach( $siblings as $sibling ) {
// if this is the post that comes after our repositioned post, set our repositioned post position and increment menu order
if ( $nextid == $sibling->ID ) {
$wpdb->update($wpdb->posts,array('menu_order' => $menu_order),array( 'ID' => $post->ID ),array( '%d' ),array( '%d' ));
$new_pos[ $post->ID ] = $menu_order;
$menu_order++;
}

// if repositioned post has been set, and new items are already in the right order, we can stop
if ( isset( $new_pos[ $post->ID ] ) && $sibling->menu_order >= $menu_order )
break;
// set the menu order of the current sibling and increment the menu order
$wpdb->update($wpdb->posts,array('menu_order' => $menu_order),array( 'ID' => $sibling->ID ),array( '%d' ),array( '%d' ));
$new_pos[ $sibling->ID ] = $menu_order;
$menu_order++;
if ( ! $nextid && $previd == $sibling->ID ) {
$wpdb->update($wpdb->posts,array('menu_order' => $menu_order),array( 'ID' => $post->ID ),array( '%d' ),array( '%d' ));
$new_pos[$post->ID] = $menu_order;
$menu_order++;
}
}
die( json_encode( $new_pos ) );
}
add_action( 'wp_ajax_post_ordering', 'custom_post_ordering' );
add_action( 'wp_ajax_nopriv_post_ordering', 'custom_post_ordering' );
?>