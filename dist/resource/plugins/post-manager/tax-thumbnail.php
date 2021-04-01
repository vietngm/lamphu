<?php
function tax_thumbnail_columns($columns) {
	$_columns = array();    
	foreach($columns as $key=>$value){
		$_columns[$key] = $value;
		if($key=='cb'){
			$_columns['tax_thumbnail'] = __('Image');
		}
	}
	return $_columns;	
}
function tax_thumbnail_custom_columns($value, $column_name, $id) {
	if( $column_name == 'tax_thumbnail' ) {
		$attachID = get_tax_meta($id,'tax_thumbnail',true);	
		$thumbUrl = wp_get_attachment_image_src($attachID);
	?>	
		<a href='#' class='thumbtax' rel='<?php echo $id; ?>' id='thumb_<?php echo $id;?>' data='<?php echo $value;?>'>
        <?php if($attachID==''){ ?>
        <span class='dashicons dashicons-plus'></span>
        <img src=''/>
        <?php } else{?>
        <span class='dashicons dashicons-minus'></span>
        <img src='<?php echo $thumbUrl[0];?>' class="" />
        <?php } ?>        
        </a>
    <?php    
	}
}
function taxonomy_add_thumb(){	
	$terms = get_taxonomies('','names');
	unset($terms['post_tag']);
	unset($terms['nav_menu']);
	unset($terms['link_category']);
	unset($terms['post_format']);	
	foreach ( $terms as $term ) {
		$taxhide= get_tax_meta($term,'tax-thumb-status',true);
		if($taxhide=='on'){
		add_filter('manage_edit-'.$term.'_columns', 'tax_thumbnail_columns', 5);
		add_action('manage_'.$term.'_custom_column', 'tax_thumbnail_custom_columns', 5, 3);
		}
	}		
}
function custom_update_thumb_tax(){
	$term_id = $_REQUEST['term'];	
	$attachID = $_REQUEST['media_id'];	
	update_tax_meta($term_id,'tax_thumbnail',$attachID);
	die();
}
add_action('init','taxonomy_add_thumb');
add_action( 'wp_ajax_update_thumb_tax', 'custom_update_thumb_tax' );
add_action( 'wp_ajax_nopriv_update_thumb_tax', 'custom_update_thumb_tax' );
?>