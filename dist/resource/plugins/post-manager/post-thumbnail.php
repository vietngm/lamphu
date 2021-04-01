<?php
add_theme_support( 'post-thumbnails' );
add_image_size('featured_preview',60,60,true);
/*-----------------------------------------------------------------------*/
function get_featured_image($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
		return $post_thumbnail_img[0];
	}
}
/*-----------------------------------------------------------------------*/
function my_manage_product_columns( $column, $post_id ) {
	global $post;$flag=getAllPostType();
	switch($column) {
		case 'hinhdaidien' :
		$post_featured_image = get_featured_image($post->ID);
		echo '<a href="post.php?post='.$post->ID.'&action=edit">';
		if ($post_featured_image) {echo '<div class="thumbpreview"><img src="' . $post_featured_image . '" /></div>';	}
		else{echo '<div align="center" class="nothumb"><span class="dashicons dashicons-camera"></span></div>';}
		echo '</a>';
		break;
		case 'showprice' :if($flag!=''){
		$price = get_post_meta($post->ID,'price',true);
		echo ($price!='' ? number_format($price):0).' VND';
		}
		break;
		case 'showstock':
		if($flag!=''){
		echo '<span class="dashicons dashicons-yes"></span>';
		}
		break;		
	}
}
/*-----------------------------------------------------------------------*/
function my_edit_product_columns( $columns ){
	$_columns = array();$flag=getAllPostType();
	foreach($columns as $key=>$value){
		$_columns[$key] = $value;
		if($key=='cb'){
            $_columns['hinhdaidien'] = 'Image';
		}
		if($key=='title'){
			if($flag!=''){
            $_columns['showprice'] = 'Price';
			$_columns['showstock'] = 'Stock';
			}
		}		
	}	
	return $_columns;
}
/*-----------------------------------------------------------------------*/
function my_manage_columns( $column, $post_id ) {
	global $post;
	switch($column) {
		case 'hinhdaidien' :
		$post_featured_image = get_featured_image($post->ID);
		echo '<a href="post.php?post='.$post->ID.'&action=edit">';
		if ($post_featured_image) {echo '<div class="thumbpreview"><img src="' . $post_featured_image . '" /></div>';	}
		else{echo '<div align="center" class="nothumb"><span class="dashicons dashicons-camera"></span></div>';}
		echo '</a>';
		break;	
	}
}
/*-----------------------------------------------------------------------*/
function my_edit_columns( $columns ){
	$_columns = array();    
	foreach($columns as $key=>$value){
		$_columns[$key] = $value;
		if($key=='cb'){
            $_columns['hinhdaidien'] = 'Image';
		}
	}	
	return $_columns;
}
/*-----------------------------------------------------------------------*/
function get_all_post_type(){
	$args = array('public'   => true,'_builtin' => false);	
	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'	
	$post_types = get_post_types( $args, $output, $operator ); 
	$mcp_opts =(array)get_option_by_type($_GET['post_type']);
	if($mcp_opts[0]->thumnail=='on'){
	foreach ( $post_types  as $post_type ){
		if($post_type=='sanpham' || $post_type=='san-pham' || $post_type=='product' || $post_type=='products'){		
		add_filter( 'manage_edit-'.$post_type.'_columns', 'my_edit_product_columns' ) ;
		add_action( 'manage_'.$post_type.'_posts_custom_column', 'my_manage_product_columns', 10, 2 );
		}
		else{
		add_filter( 'manage_edit-'.$post_type.'_columns', 'my_edit_columns' ) ;
		add_action( 'manage_'.$post_type.'_posts_custom_column', 'my_manage_columns', 10, 2 );			
		}
	}
	}
}
add_action( 'init','get_all_post_type');
/*-----------------------------------------------------------------------*/
function getAllPostType(){
	$args = array(
	   'public'   => true,
	   '_builtin' => false
	);
	
	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'
	$posts_array=get_post_types($args , $output, $operator);
	$flag =  array_search('dathang', $posts_array);
	return $flag;
}
add_action('init','getAllPostType');
?>