<?php
/*-----------------------------------------------------------------------*/
function getSlugCustomPosttype(){

	if(is_tax()){$link = $_SERVER['REQUEST_URI'];}
	else{$link = get_permalink();}
	
	//----------------------------------------------
	
	$link = str_replace( home_url( '/' ), '', $link );
	$link = str_replace('?', '', $link );	
	
	$arr = array();
	$arr=explode('=',$link);
	
	if(is_home()){$classNname ='home';}	
	elseif(is_page()){$classNname = get_post($arr[1])->post_name;}
	elseif(is_singular()){
		$arr=explode( '/', $link );
		$classNname = $arr[0];
	}
	elseif(is_tax()){	
		$arr=explode('/',$link);
		$tax = $arr[1];
		$slug = $arr[2];
		
		$args = array('public'=> true,'_builtin' => false);
		$output = 'names';
		$operator = 'and';
		$post_types = get_post_types( $args, $output, $operator ); 
		foreach ( $post_types  as $post_type ){   
		   $taxonomy_names = get_object_taxonomies($post_type);
		   if($taxonomy_names[0]==$tax){
		   $classNname = $post_type;
		   break;
		   }
		}
	}	
	return $classNname;
}
/*-----------------------------------------------------------------------*/
function activeMenu(){
	$class = getSlugCustomPosttype();
	?>
	<script>jQuery(function($){$('.<?php echo $class;?>').addClass('active');})</script>
    <?php
}    
// add_action('wp_footer','activeMenu');
/*-----------------------------------------------------------------------*/
add_action('init', 'change_page_permalink', -1);
function change_page_permalink() {
    global $wp_rewrite;
    if ( strstr($wp_rewrite->get_page_permastruct(), '.html') != '.html' ) 
        $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
}
/*-----------------------------------------------------------------------*/
if(!function_exists("page_rewrite_rules")){
    function page_rewrite_rules($rewrite_rules) {
        global $wpdb,$wp_rewrite;
    	$sql="SELECT * FROM wp_mcp";
    	$all_mcp_option = $wpdb->get_results($sql);
    	foreach($all_mcp_option as $mcp_option) {
    		$type = $mcp_option->custom_type;
            $new_rules = array($type.'/page/?([0-9]{1,})/?$' => 'index.php?post_type='.$type.'&page=$matches[1]');
            $rewrite_rules = $new_rules + $rewrite_rules;
        }
        return $rewrite_rules;
    }
    add_filter('rewrite_rules_array', 'page_rewrite_rules');
}
/*-----------------------------------------------------------------------*/
if(!function_exists("tax_rewrite_rules")){
	function tax_rewrite_rules($rewrite_rules){
		$args = array('public'=> true,'_builtin' => false); 
		$output = 'names';
		$operator = 'and';
		$taxonomies = get_taxonomies( $args, $output, $operator ); 
		if ( $taxonomies ) {
		foreach ( $taxonomies  as $taxonomy ) {
		$new_rules = array($taxonomy.'/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?'.$taxonomy.'=$matches[1]&page=$matches[2]');
		$rewrite_rules = $new_rules + $rewrite_rules;
		}
		return $rewrite_rules;
		}	
	}
	add_filter('rewrite_rules_array', 'tax_rewrite_rules');
}
/*-----------------------------------------------------------------------*/
function my_rewrite_rules( $rewrite_rules ) {
    $new_rules = array('chuyen-muc/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?chuyen-muc=$matches[1]&page=$matches[2]' );
    $rewrite_rules = $new_rules + $rewrite_rules;
    return $rewrite_rules;
}
add_filter('rewrite_rules_array', 'my_rewrite_rules');
/*-----------------------------------------------------------------------*/
?>