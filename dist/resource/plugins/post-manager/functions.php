<?php
function array_sort($array, $on, $order=SORT_ASC){

$new_array = array();
$sortable_array = array();

if (count($array) > 0) {
	foreach ($array as $k => $v) {
		if (is_array($v)) {
			foreach ($v as $k2 => $v2) {
				if ($k2 == $on) {
					$sortable_array[$k] = $v2;
				}
			}
		
		} 
		else{
			$sortable_array[$k] = $v;
		}
	}

	switch ($order) {
		case SORT_ASC:
			asort($sortable_array);
		break;
		case SORT_DESC:
			arsort($sortable_array);
		break;
	}

	foreach ($sortable_array as $k => $v) {
		$new_array[$k] = $array[$k];
	}
}
return $new_array;
}

function delKey(){
	$k = $_REQUEST['key'];
	$arr = $_REQUEST['arr'];
	//$arr = array_sort($_REQUEST['arr'],'order',SORT_DESC);
	if(isset($k) && is_numeric($k) && isset($arr)){
		foreach($arr as $key=>$val){
			if($val['key']==$k)
			unset($arr[$key]);
		}	
	}

	resetObject($arr);
}

add_action('wp_ajax_delKey','delKey');
add_action('wp_ajax_nopriv_delKey','delKey');

function replaceKey(){
	$k = $_REQUEST['key'];
	$arr = $_REQUEST['arr'];
	$order = $_REQUEST['order'];
	$attach_id = $_REQUEST['attach_id'];
	$status = $_REQUEST['status'];
	if(isset($k) && is_numeric($k) && isset($arr)){
	switch($status){
		case 'order':
		foreach($arr as $key=>$val){
			if($val['key']==$k){
			$repKey=array("order"=>$order);
			$arr[$key]=array_replace($arr[$key],$repKey);			
			}	
		}		
		break;
		case 'attach_id':
		foreach($arr as $key=>$val){
			if($val['key']==$k){
			$repKey=array("attach_id"=>$attach_id);
			$arr[$key]=array_replace($arr[$key],$repKey);			
			}	
		}		
		break;		
	}
	}		

	$arr = array_sort($arr,'order',SORT_ASC);
	resetObject($arr);
}

add_action('wp_ajax_replaceKey','replaceKey');
add_action('wp_ajax_nopriv_replaceKey','replaceKey');

function resetObject($arr){
	$str ='';
	$i=0;
	foreach($arr as $key){
		if($i==0)
		$str.=json_encode($key);
		else
		$str.=','.json_encode($key);
		$i++;
	}
	echo $str;	
	die();	
}
//--------------------------------------------------------------------------------------------------------------------//
function mcpGallery($postId){
	$list_gallery = get_post_meta($postId,'gallery-thumb-id',true);	
	$list_gallery = str_replace('},','};',$list_gallery);
	$_list = explode(';',$list_gallery);
	return $_list;
}
add_action('wp_footer','mcpGallery');
//--------------------------------------------------------------------------------------------------------------------//
function getSizefromMedia(){
global $wpdb;
$myrows = $wpdb->get_results("SELECT option_name, option_value FROM wp_options WHERE option_name = 'large_size_w' OR option_name = 'large_size_h'");
${$myrows[0]->option_name} = $myrows[0]->option_value;
${$myrows[1]->option_name} = $myrows[1]->option_value;
$mediaSize = ' '.$large_size_w.' x '.$large_size_h;
return $mediaSize;
}
add_action('wp_footer','getSizefromMedia');
//--------------------------------------------------------------------------------------------------------------------//
function getProductPageId(){
$pages=get_pages();	
$count = count($pages);	
for($i = 0;$i<$count;$i++){
$search_array = (array)$pages[$i];
if (in_array('product', $search_array,true) || in_array('products', $search_array,true) || in_array('san-pham', $search_array,true) || in_array('sanpham', $search_array,true)){		
$post_id = $pages[$i]->ID;
}	
}
return $post_id;
}
//--------------------------------------------------------------------------------------------------------------------//
function update_list_extra_field(){
	global $post;
	$postID = getProductPageId();
	$field = $_REQUEST['field'];
	$list = $_REQUEST['list'];
	$total = $_REQUEST['total'];
	$extra = $_REQUEST['extra'];
	$currentPostID = $_REQUEST['post'];
	switch($field){
		case 'color':
		update_post_meta($postID,'total-list-color',$total);
		update_post_meta($postID,'custom-list-color',$list);	
		update_post_meta($currentPostID,'color',$extra);
		break;
		case 'size':
		update_post_meta($postID,'total-list-size',$total);
		update_post_meta($postID,'custom-list-size',$list);	
		update_post_meta($currentPostID,'size',$extra);
		break;		
	}
}

add_action( 'wp_ajax_update_list_extra_field', 'update_list_extra_field' );
add_action( 'wp_ajax_nopriv_update_list_extra_field', 'update_list_extra_field' );
//--------------------------------------------------------------------------------------------------------------------//
function addExtraFieldToMetaBox($label){
	global $post;
	switch($label){
	case 'size':
	$size = get_post_meta($post->ID,'size',true);
	if($size!=''){
	$_list = explode(',',$size);
	if(!empty($_list) && $_list>0){
	foreach($_list as $data){		
	$html.='<div class="size-box" id="size-box-'.$data.'">';
	$html.='<div align="center" class="bl-size">'.$data.'</div>';
	$html.='<div align="center" class="minus" onclick=findAndRemoveExtraPost("size","'.$data.'")><span class="dashicons dashicons-no-alt"></span></div>';
	$html.='</div>';	
	}}}
	?>    
    <script>jQuery(function($){$('#size .meta-controls').append('<?php echo $html ?>');});</script>
    <?php
	break;
	case 'color':
	$color = get_post_meta($post->ID,'color',true);
	if($color!=''){
	$_list = explode(',',$color);
	if(!empty($_list) && $_list>0){
	foreach($_list as $data){
	$color = preg_replace('/[^A-Za-z0-9\-]/', '', $data);
	$html.='<div class="color-box" id="color-box-'.$color.'">';
	$html.='<div align="center" style="background-color:#'.$data.'">&nbsp;</div>';
	$html.='<div align="center" class="minus" onclick=findAndRemoveExtraPost("color","'.$color.'")><span class="dashicons dashicons-no-alt"></span></div>';
	$html.='</div>';	
	}}}
	?>    
    <script>jQuery(function($){$('#color .meta-controls').append('<?php echo $html ?>');});</script>
    <?php	
	break;
	}
}
?>