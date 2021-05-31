<?php
@session_start();ob_start();
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}
if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup() {
	load_theme_textdomain( 'theme', get_template_directory() . '/lang' );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/*-----------------------------------------------------------------------*/

function get_page_by_id($post_id){
	$my_postid =$post_id;
	$content_post = get_post($my_postid);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	
	echo $content;	
}
/*-------------------------------------------------------------------*/
function get_post_by_slug($post_slug) {
    $post = get_page_by_path($post_slug);	
    if ($post) {
		$title = get_the_title($post->ID);
		$content = apply_filters('the_content', $post->post_content);
		return  $content;
    } else {
        return null;
    }
}
/*-----------------------------------------------------------------------*/
function getExcerptByID($page_id){
	$content_post = get_post($page_id);
	$my_excerpt = $content_post->post_excerpt;
	$my_excerpt = apply_filters('the_excerpt', $my_excerpt);
	$my_excerpt = str_replace(']]>', ']]&gt;', $my_excerpt);
	return $my_excerpt;
}

function getExcerptLimit($count,$postId){  
  $content_post = get_post($postId);
  $excerpt = $content_post->post_content;
  $excerpt = apply_filters('the_content', $excerpt);
  $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';
  return $excerpt;
}
/*-----------------------------------------------------------------------*/
function getContentByID($page_id){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content,'<p><br/>');
	return $content;		
}
/*-------------------------------------------------------------------*/
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
/*-------------------------------------------------------------------*/
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
/*-----------------------------------------------------------------------*/
function get_thongtin(){
	include('templates/contact.php');
	return $lienhe;
}
/*-----------------------------------------------------------------------*/
function get_list_post($taxonomy,$posttype,$slug){
	global $mobile_browser;
	$query= array( 'post_type' =>$posttype,'taxonomy'=>$taxonomy,'term'=>$slug, 'posts_per_page' =>-1,'orderby'=>'postdate','order'=>'asc' );  
	$the_query=null;
	$the_query = new WP_Query($query);
	while ( $the_query->have_posts() ):$the_query->the_post();
?>
<li class="sub-list-item">
  <a href="<?php echo get_permalink($post->ID); ?>" class="sub-list-link">
    <?php if($mobile_browser > 0){ ?>
    <span class="arrow left"></span>
    <?php } ?>
    <?php the_title() ?>
  </a>
</li>
<?php
endwhile; wp_reset_query();
}
function get_link_first_post($taxonomy,$posttype,$slug){
	global $q_config;
	$query= array( 'post_type' =>$posttype,'taxonomy'=>$taxonomy,'term'=>$slug, 'posts_per_page' =>-1,'orderby'=>'postdate','order'=>'asc' );  
	$the_query=null;
	$the_query = new WP_Query($query);
	$link = array();
	while ( $the_query->have_posts() ){ $the_query->the_post();
		$link[] = get_permalink($post->ID);
	}
	wp_reset_query();
	if(!empty($link)){
		return $link[0];
	}
	return "";
}
function get_link_first_tax($taxonomy){
	$terms = get_terms($taxonomy, "hide_empty=1&orderby=custom_sort&order=asc");
	foreach($terms as $term){
		return get_term_link($term,$taxonomy);
	}
	return "";
}
/*-----------------------------------------------------------------------*/
function gmap(){
	if(is_page('lien-he')){
	include('templates/gmap.php');
	}
}
add_action("wp_head","gmap");
/*-----------------------------------------------------------------------*/
function new_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'May cat day Edm' ), max( $paged, $page ) );

	return $title;
}
function googlemap(){
	if(is_page('lien-he')){
		include('admin-themes/theme-gmap.php');
	}
}
add_action('wp_head', 'googlemap');

function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}
/*-----------------------------------------------------------------------*/
add_filter( 'wp_title', 'new_wp_title', 10, 2 );
/*-----------------------------------------------------------------------*/
include('admin-themes/login.php');
/*-----------------------------------------------------------------------*/
include('admin-themes/image-size.php');
/*-----------------------------------------------------------------------*/
include('admin-themes/post-order.php');
/*-----------------------------------------------------------------------*/
include('admin-themes/slideshow.php');
/*-----------------------------------------------------------------------*/
include('admin-themes/dashboard-settings.php');
/*-----------------------------------------------------------------------*/
include('includes/theme-alert.php');
/*-----------------------------------------------------------------------*/
include('includes/theme-mail.php');
/*-----------------------------------------------------------------------*/
include('includes/theme-url.php');
/*-----------------------------------------------------------------------*/
include('includes/theme-display.php');
/*-----------------------------------------------------------------------*/

global $tablet_browser;
$tablet_browser = 0;
global $mobile_browser;
$mobile_browser = 0;

if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$tablet_browser++;}
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){$mobile_browser++;}
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {$mobile_browser++;}
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
	'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
	'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
	'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
	'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
	'newt','noki','palm','pana','pant','phil','play','port','prox',
	'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
	'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
	'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
	'wapr','webc','winw','winw','xda ','xda-');

if (in_array($mobile_ua,$mobile_agents)) {$mobile_browser++;}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
	$mobile_browser++;
	$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		$tablet_browser++;
	}
}
add_action( 'admin_init', 'disable_autosave' );
function disable_autosave() {
    wp_deregister_script( 'autosave' );
}
?>
