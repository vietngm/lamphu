<?php
function add_meta_box_type(){
if(isset($_REQUEST['post_type'])){$type=$_REQUEST['post_type'];}
else{
if(isset($_REQUEST['post'])){
$post=get_post($_REQUEST['post']);
$type=$post->post_type;
}
}
if($type!="page" && $type!="post"){if(get_post_type($post)!='dathang' && get_post_type($post)!='dat-hang'){add_meta_box(	$type.'-type-div', __('Post Manager'),  'add_type_meta_box', $type, 'normal', 'low');}}
}

function add_type_meta_box($post) {
if(isset($_REQUEST['post_type'])){
$type=$_REQUEST['post_type'];
}
else{
if(isset($_REQUEST['post'])){
$post1=get_post($_REQUEST['post']);
$type=$post1->post_type;
}
}
$option=get_option_by_type($type);
$option_relate = mcp_getall_relate_data($option[0]->id);
?>
<input type="hidden" name="<?php echo $type;?>" value="<?php echo $type;?>" />
<?php        
for($a=1;$a<=25;$a++){
$field='';
$khoa_field_name='field-name'.$a;
$khoa_field_custom_type='field-custom-type'.$a;
$khoa_field_type='field-type'.$a;
$khoa_field_check='field-view'.$a;
$khoa_field_name_post_type='field-name-post-type'.$a;
$khoa_field_name_taxonomy_type='field-name-taxonomy-type'.$a;

$field['name']=mcp_get_relate_data($option[0]->id,$khoa_field_name);
$field['custom_type']=mcp_get_relate_data($option[0]->id,$khoa_field_custom_type);
$field['type']=mcp_get_relate_data($option[0]->id,$khoa_field_type);
$field['check']=mcp_get_relate_data($option[0]->id,$khoa_field_check);
$field['name_post_type']=mcp_get_relate_data($option[0]->id,$khoa_field_name_post_type);
$field['name_taxonomy_type']=mcp_get_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
if($field['name'][0]->giatri !=''){
if($field['type'][0]->giatri == '1'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<?php if($value_meta){ ?>
<div class="meta-controls"><input type="text" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" /></div>
<?php }else{?><div class="meta-controls"><input type="text" name="<?php echo $field['custom_type'][0]->giatri;?>" value="" /></div><?php }?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '2'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<script>
function check_Number(e) {
	var unicode = e.keyCode;
	if ((unicode != 8)&&(unicode != 110)) {
		if ((unicode < 48 || unicode > 57)&&(unicode < 96 || unicode > 105)) {
			return false;
		}
	}
}
</script>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<?php if($value_meta){?>
<div class="meta-controls"><input type="text" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" onkeydown="return check_Number(event)" /></div>
<?php }else{?>
<div class="meta-controls"><input type="text" name="<?php echo $field['custom_type'][0]->giatri;?>" value="" onkeydown="return check_Number(event)" /></div>
<?php }?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '3'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<?php if($value_meta){?>
<div class="meta-controls"><textarea name="<?php echo $field['custom_type'][0]->giatri;?>" class="meta-textarea" style="margin-bottom:1px"><?php echo $value_meta; ?></textarea></div>
<?php }else{?><div class="meta-controls"><textarea name="<?php echo $field['custom_type'][0]->giatri;?>" class="meta-textarea" style="margin-bottom:1px"><?php echo $value_meta; ?></textarea></div><?php }?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '4'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<div class="mcp-metabox"><label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
<?php if($value_meta){ ?><?php the_editor($value_meta,$field['custom_type'][0]->giatri, '', $media_buttons = true);}
else {?><?php the_editor($value_meta,$field['custom_type'][0]->giatri, '', $media_buttons = true);}?>
</div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '5'){
$value_meta = get_post_meta($post->ID, $field['name_post_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
global $wpdb;
$query='';
$query="select * from  $wpdb->posts post where post_type='".$field['name_post_type'][0]->giatri."' and post_status='publish'";
$results = $wpdb->get_results($query);
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
	<select name="<?php echo $field['name_post_type'][0]->giatri;?>">
		<option value="0">Select <?php echo $field['name'][0]->giatri;?></option>
		<?php
			if (is_array($results)){
				foreach($results as $result){
					if($value_meta == $result->ID){
		?>
					<option value="<?php echo $result->ID;?>" selected="selected"><?php echo $result->post_title;?></option>
		<?php
					}
					else{
		?>
					<option value="<?php echo $result->ID;?>"><?php echo $result->post_title;?></option>
		<?php
					}
				}
			}
		?>
	</select>
</div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '6'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<?php if($value_meta == 'on'){?>
<div class="meta-controls"><input type="checkbox" name="<?php echo $field['custom_type'][0]->giatri;?>" checked="checked" /></div>
<?php }else{?>
<div class="meta-controls"><input type="checkbox" name="<?php echo $field['custom_type'][0]->giatri;?>" /></div>
<?php }?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '7'){
$img='';
$value_meta = get_post_custom_values($field['custom_type'][0]->giatri,$post->ID);
$status_img = false;
if(is_array($value_meta)){
	foreach($value_meta as $result =>$value){
	  $img_post=get_post_custom($value);
	  foreach($img_post as $key1 => $value1){
			if($key1=="_wp_attached_file"){
			   $img=$value1[0];
			   $status_img=true;
			}
	  }
	}
}
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls img_upload">                             
<input type="file" class="inp_upload" name="<?php echo $field['custom_type'][0]->giatri;?>" />
<a id="title_upload_ajax<?php echo $a;?>"><?php echo $img?></a>
</div>
<?php
if($img != ''){
?>
<div id="img_upload_ajax<?php echo $a;?>" class="meta-controls">
	<img  class="img_up" src="<?php echo home_url().'/resource/uploads/'.$img ?>" />
	<a class="delete<?php echo $a;?>" onmouseover="delete_img_upload(<?php echo $a;?>,'<?php echo $field['custom_type'][0]->giatri; ?>','<?php echo $post->ID;?>','<?php echo plugins_url('/', __FILE__)  ?>')">Delete</a>
</div>
<?php }?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '8'){
$value_meta = get_post_meta($post->ID, $field['name_taxonomy_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
$categories = get_terms( $field['name_taxonomy_type'][0]->giatri, 'orderby=count&hide_empty=0' );
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
	<select name="<?php echo $field['name_taxonomy_type'][0]->giatri;?>">
		<option value="0">Select <?php echo $field['name'][0]->giatri;?></option>
		<?php
			if (is_array($categories)){
				foreach($categories as $category){
					if($value_meta == $category->term_id){
		?>
					<option value="<?php echo $category->term_id;?>" selected="selected"><?php echo $category->name;?></option>
		<?php
					}
					else{
		?>
					<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
		<?php
					}
				}
			}
		?>
	</select>
</div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '9'){
$file='';
$value_meta = get_post_custom_values($field['custom_type'][0]->giatri,$post->ID);
$status_file = false;
if(is_array($value_meta)){
	foreach($value_meta as $result =>$value){
	  $file_post=get_post_custom($value);
	  foreach($file_post as $key1 => $value1){
			if($key1=="_wp_attached_file"){
			   $file=$value1[0];
			   $status_file=true;
			}
	  }
	}
}

?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls img_upload">                                    
<input type="file" class="inp_upload" name="<?php echo $field['custom_type'][0]->giatri;?>" /><a id="title_upload_ajax<?php echo $a;?>"><?php echo $file?></a>                             
</div>
<?php
if($file != ''){
?>
<div id="img_upload_ajax<?php echo $a;?>" class="meta-controls">
<a class="delete<?php echo $a;?>" onmouseover="delete_img_upload(<?php echo $a;?>,'<?php echo $field['custom_type'][0]->giatri; ?>','<?php echo $post->ID;?>','<?php echo plugins_url('/', __FILE__)  ?>')">Delete</a>
</div>
<?php } ?>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '10'){                               
$date='';
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
wp_enqueue_style( 'myStyle_jqueryui');
wp_enqueue_script('my_script_jqueryui_handle');
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
<input type="text" readonly class="jquery_date" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" size="30"/>
</div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '11'){                               
$date='';
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
wp_enqueue_style( 'myStyle_jqueryui');
wp_enqueue_script('my_script_jqueryui_handle');
wp_enqueue_script('my_script_jqueryui_time_handle');
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
<input type="text" readonly class="jquery_datetime" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" size="30"/>
</div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '12'){                               
$date='';
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
<input type="text" class="random_str" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" size="30"/>                                        
</div>
<div><a style="margin: 0 0 0 10px;" class="btn_random">Random</a></div>
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '13'){                               
$date='';
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
?>
<div class="mcp-metabox" style="position: relative;">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<div class="meta-controls">
<?php
if($value_meta !=''){
?>
<input type="text" readonly class="color_jam" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" style="background:<?php echo $value_meta?>;width:70px;"/>
<?php 
}
else{
?><input type="text" readonly class="color_jam" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" style="width:70px;"/>
<?php }?>                                                                                
<a class="deletecolorpicker" href="#">Xóa</a>
</div>                                    
<div style="clear: both;"></div>
</div>
<?php }
if($field['type'][0]->giatri == '14'){
$value_meta = get_post_meta($post->ID, $field['custom_type'][0]->giatri, TRUE);
//if (!$value_meta) $value_meta = 0;
?>
<div id="<?php echo $field['custom_type'][0]->giatri;?>" class="mcp-metabox">
<label class="meta-label" scope="row"><?php echo $field['name'][0]->giatri;?>:</label>
<?php
if($value_meta){
?>
<div class="meta-controls">
<input type="hidden" name="<?php echo $field['custom_type'][0]->giatri;?>" value="<?php echo $value_meta; ?>" />
</div>
<?php
}
else{
?>
<div class="meta-controls hidden-controls">
<input type="hidden" name="<?php echo $field['custom_type'][0]->giatri;?>" value="" />
</div>
<?php } ?>
<div style="clear: both;"></div>
</div>
<?php }}}}
function save_type_meta_box($post_id, $post){
global $post;
$post1=get_post($_REQUEST['post']);
$type=$post1->post_type;
$option=get_option_by_type($type);
if(isset($_REQUEST[$type])){
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
return $post_id;
}
for($i=1;$i<=25;$i++){
$field='';
$khoa_field_custom_type='field-custom-type'.$i;
$khoa_field_type='field-type'.$i;
$khoa_field_name_post_type='field-name-post-type'.$i;
$khoa_field_name_taxonomy_type='field-name-taxonomy-type'.$i;
$field['name_taxonomy_type']=mcp_get_relate_data($option[0]->id,$khoa_field_name_taxonomy_type);
$field['name_post_type']=mcp_get_relate_data($option[0]->id,$khoa_field_name_post_type);
$field['custom_type']=mcp_get_relate_data($option[0]->id,$khoa_field_custom_type);
$field['type']=mcp_get_relate_data($option[0]->id,$khoa_field_type);
if(($field['type'][0]->giatri != '7')&&($field['type'][0]->giatri != '9')&&($field['type'][0]->giatri != '6')&&($field['type'][0]->giatri != '5')&&($field['type'][0]->giatri != '8'))
{
if($field['custom_type'][0]->giatri != ''){
$key= $field['custom_type'][0]->giatri;
$value=$_POST[$key];

$old= get_post_meta($post->ID, $key, FALSE);
if(($value == '')||($value=='0')){update_post_meta($post->ID, $key, false);}
elseif($value != $old){update_post_meta($post->ID, $key, $value);}
}
}
elseif(($field['type'][0]->giatri == '6')){
if($field['custom_type'][0]->giatri != ''){
$key= $field['custom_type'][0]->giatri;
$value=$_POST[$key];
$old= get_post_meta($post->ID, $key, FALSE);
if(($value == '')||($value=='0')){                            
update_post_meta($post->ID, $key, false);
}
elseif($value != $old){
update_post_meta($post->ID, $key, $value);
}
}
}
elseif(($field['type'][0]->giatri == '5')||($field['type'][0]->giatri == '8')){
if($field['type'][0]->giatri == '5'){
$key= $field['name_post_type'][0]->giatri;
$value=$_POST[$key];
$old= get_post_meta($post->ID, $key, FALSE);
if(($value == '')||($value=='0')){
delete_post_meta($post->ID, $key);
}
elseif($value != $old){
update_post_meta($post->ID, $key, $value);
}
}
else{
$key= $field['name_taxonomy_type'][0]->giatri;
$value=$_POST[$key];
$old= get_post_meta($post->ID, $key, FALSE);
if(($value == '')||($value=='0')){
delete_post_meta($post->ID, $key);
}
elseif($value != $old){
update_post_meta($post->ID, $key, $value);
}
}
}
elseif($field['type'][0]->giatri == '7'){
$key= $field['custom_type'][0]->giatri;
require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
$uploadfiles = $_FILES[$key];
if($uploadfiles['name'] !=''){
$f_width=$uploadfiles['width'];
$f_height=$uploadfiles['height'];
$filename=$uploadfiles['name'];

$upload_dir = wp_upload_dir();
$filetmp = $uploadfiles['tmp_name'];

$filetitle = preg_replace('/\.[^.]+$/', '', basename( $filename ) );
$filetype = wp_check_filetype(basename($filename), null );

$allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png');
$filename = $filetitle . '.' . $filetype['ext'];
$bien=rand(1,1000);
$filename = $filetitle . '_' . $bien . '.' . $filetype['ext'];                        
$filedest = $upload_dir['path'] . '/' . $filename;
move_uploaded_file($filetmp, $filedest);
$attachment = array(
'post_mime_type' => $filetype['type'],
'post_title' => preg_replace('/\.[^.]+$/', '', basename($uploadfiles['name'])),
'post_content' => '',
'post_status' => 'inherit'
);
$attach_id = wp_insert_attachment( $attachment, $filedest );
$metadata = array();
$imagesize = getimagesize( $filedest );
$metadata['width'] = $imagesize[0];
$metadata['height'] = $imagesize[1];
list($uwidth, $uheight) = wp_constrain_dimensions($metadata['width'], $metadata['height'], 128, 96);
$metadata['hwstring_small'] = "height='$uheight' width='$uwidth'";
$metadata['file'] = _wp_relative_upload_path($filedest);
global $_wp_additional_image_sizes;
foreach ( get_intermediate_image_sizes() as $s ) {
$sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => FALSE );
if ( isset( $_wp_additional_image_sizes[$s]['width'] ) )
$sizes[$s]['width'] = intval( $_wp_additional_image_sizes[$s]['width'] ); // For theme-added sizes
else
$sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
if ( isset( $_wp_additional_image_sizes[$s]['height'] ) )
$sizes[$s]['height'] = intval( $_wp_additional_image_sizes[$s]['height'] ); // For theme-added sizes
else
$sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
if ( isset( $_wp_additional_image_sizes[$s]['crop'] ) )
$sizes[$s]['crop'] = intval( $_wp_additional_image_sizes[$s]['crop'] ); // For theme-added sizes
else
$sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
}

$sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );

foreach( $sizes as $size => $size_data ) {
$resized = image_make_intermediate_size( $filedest, $size_data['width'], $size_data['height'], $size_data['crop'] );

if ( $resized )
$metadata['sizes'][$size] = $resized;
}
/** add images size **/
/*                  
$resized2 = image_make_intermediate_size( $filedest, '789', '234', true );
$metadata['sizes']['huydz'] = $resized2;
*/                  
$image_resize_array = mcp_getall_relate_data_bykhoa('images-size');
if(is_array($image_resize_array)){
foreach($image_resize_array as $image_resize){
if($image_resize->option_id == $option[0]->id){
	list($name_size, $width_size, $height_size, $crop) = explode(":", $image_resize->giatri);
	if($crop != ''){
		$crop='true';
	}
	else{
		$crop='';    
	}
	$resized = image_make_intermediate_size( $filedest, $width_size, $height_size, $crop );
	if($resized){
		$metadata['sizes'][$name_size] = $resized;
	}
}
}
}

/** ----------------------- **/                                                             
$image_meta = wp_read_image_metadata( $filedest );
if ( $image_meta ){
$metadata['image_meta'] = $image_meta;
}
//$attach_data = wp_generate_attachment_metadata( $attach_id, $filedest );

$attach_data=apply_filters( 'wp_generate_attachment_metadata', $metadata, $attach_id );
wp_update_attachment_metadata( $attach_id,  $attach_data );
update_post_meta($post->ID, $key, $attach_id);		
}
elseif($_REQUEST['delete-'.$key]){
delete_post_meta($post->ID,$key);
}
}
elseif($field['type'][0]->giatri == '9'){
$key= $field['custom_type'][0]->giatri;
require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
$uploadfiles = $_FILES[$key];
if($uploadfiles['name'] !=''){                        
$filename=$uploadfiles['name'];
$upload_dir = wp_upload_dir();
$filetmp = $uploadfiles['tmp_name'];
$filetitle = preg_replace('/\.[^.]+$/', '', basename( $filename ) );
$filetype = wp_check_filetype(basename($filename), null );
$filename = $filetitle . '.' . $filetype['ext'];
$bien=rand(1,1000);
$filename = $filetitle . '_' . $bien . '.' . $filetype['ext'];
$filedest = $upload_dir['path'] . '/' . $filename;
move_uploaded_file($filetmp, $filedest);
$attachment = array(
'post_mime_type' => $wp_filetype['type'],
'post_title' => preg_replace('/\.[^.]+$/', '', basename($uploadfiles['name'])),
'post_content' => '',
'post_status' => 'inherit'
);

$attach_id = wp_insert_attachment( $attachment, $filedest );

$attach_data = wp_generate_attachment_metadata( $attach_id, $filedest );
wp_update_attachment_metadata( $attach_id,  $attach_data );
update_post_meta($post->ID, $key, $attach_id);
}
elseif($_REQUEST['delete-'.$key]){
delete_post_meta($post->ID,$key);
}
}
}
echo '<script type="text/javascript">window.location = "post.php?post='.$post->ID.'&action=edit";</script>';
}
else return $post_id;
}
function my_mcp_columns($columns)
{
$taxonomy='';
$columns='';
if(isset($_REQUEST['post_type']))
{
$type=$_REQUEST['post_type'];
}
else
{
if(isset($_REQUEST['post']))
{
$post1=get_post($_REQUEST['post']);
$type=$post1->post_type;
}
}
$option=get_option_by_type($type);
$columns['cb']="<input type=\"checkbox\" />";
//$columns['id']='ID';
$columns['title']='title';
/*
for($i=1;$i<=5;$i++)
{
$key_type_taxonomy='taxonomy-type'.$i;
$key_name_taxonomy='taxonomy-name'.$i;
$taxonomy=mcp_get_relate_data($option[0]->id,$key_type_taxonomy);
if($taxonomy[0]->giatri !='')
{
$taxonomy_name=mcp_get_relate_data($option[0]->id,$key_name_taxonomy);
$columns[$taxonomy[0]->giatri."xx"]=$taxonomy_name[0]->giatri;
}
}
*/
for ($i=1;$i<=25;$i++){
$key_view='field-view'.$i;
$key_name='field-name'.$i;
$key_custom_type='field-custom-type'.$i;
$field_view=mcp_get_relate_data($option[0]->id,$key_view);
if($field_view[0]->giatri == 'on'){
$name=mcp_get_relate_data($option[0]->id,$key_name);
$type=mcp_get_relate_data($option[0]->id,$key_custom_type);
$columns[$type[0]->giatri]=$name[0]->giatri;
}
}
$columns['author']='Author';
$columns['date']='Date';

return $columns;
}
function my_mcp_order_id_columns($columns){
$columns['id']='ID';
return $columns;
}

function my_custom_columns($column){
global $post;
global $wpdb;
if ("id" == $column){
echo $post->ID;
}
if(isset($_REQUEST['post_type'])){
$type=$_REQUEST['post_type'];
}
else{
if(isset($_REQUEST['post'])){
$post1=get_post($_REQUEST['post']);
$type=$post1->post_type;
}
}
$option=get_option_by_type($type);
for($i=1;$i<=5;$i++){
$key_type_taxonomy='taxonomy-type'.$i;
$field_type_taxonomy=mcp_get_relate_data($option[0]->id,$key_type_taxonomy);
if($field_type_taxonomy[0]->giatri."xx" == $column ){
$term_lists = wp_get_post_terms($post->ID, $field_type_taxonomy[0]->giatri, array("fields" => "names"));
echo implode(", ",$term_lists);
}
}
for ($i=1;$i<=25;$i++){
$key_view='field-view'.$i;
$key_custom_type='field-custom-type'.$i;
$field_view=mcp_get_relate_data($option[0]->id,$key_view);
if($field_view[0]->giatri == 'on')
{

$type=mcp_get_relate_data($option[0]->id,$key_custom_type);
$khoa_field_type='field-type'.$i;                    
$field['type']=mcp_get_relate_data($option[0]->id,$khoa_field_type);
switch($field['type'][0]->giatri) {
case '6':
if($column==$type[0]->giatri){
$meta_key = trim($type[0]->giatri);
if(get_post_meta($post->ID,$type[0]->giatri, true)=='on'){
echo '<a onclick="return update_post_meta(this,'.$post->ID.',\''.$meta_key.'\')" rel="" href="#"><i class="icon-ok icon-green icon-large"></i></a>';
}else{
echo '<a onclick="return update_post_meta(this,'.$post->ID.',\''.$meta_key.'\')" rel="on" href="#" ><i class="icon-remove icon-red icon-large"></i></a>';
}
}
break;
case '7':
if($column==$type[0]->giatri)
{
$value=jam_get_post_custom_images($post->ID,$type[0]->giatri);                
echo '<img src="'.$value.'" alt="" style="height:60px;border:3px solid #ccc;"/>'; 

}
break;
default:
if($column==$type[0]->giatri)
{
$value=get_post_meta($post->ID,$type[0]->giatri, true);
echo $value;
}
}
}
}
}
function taxonomy_filter_restrict_manage_posts() {
global $typenow;
$post_types = get_post_types( array( '_builtin' => false ) );
if ( in_array( $typenow, $post_types ) ) {
$filters = get_object_taxonomies( $typenow );
foreach ( $filters as $tax_slug ) {
$tax_obj = get_taxonomy( $tax_slug );
wp_dropdown_categories( array(
'show_option_all' => __('Show All '.$tax_obj->label ),
'taxonomy' 	  => $tax_slug,
'name' 		  => $tax_obj->name,
'orderby' 	  => 'name',
'selected' 	  => $_GET[$tax_slug],
'hierarchical' 	  => $tax_obj->hierarchical,
'show_count' 	  => false,
'hide_empty' 	  => true
) );
}
}
}
function taxonomy_filter_post_type_request( $query ){
global $pagenow, $typenow;
if ( 'edit.php' == $pagenow ) {
$filters = get_object_taxonomies( $typenow );
foreach ( $filters as $tax_slug ) {
$var = &$query->query_vars[$tax_slug];
if ( isset( $var ) ) {
$term = get_term_by( 'id', $var, $tax_slug );
$var = $term->slug;
}
}
}
}
add_action('quick_edit_custom_box', 'on_quick_edit_custom_box', 10, 2);
function on_quick_edit_custom_box($column, $post_type){
}
/*-FUNCTION----****/
function jam_get_post_custom_images($id_post,$key_images_upload){
global $wpdb;
$id_post_img= get_post_custom_values($key_images_upload,$id_post);
if(is_array($id_post_img)){
$img="no_image.jpg";
foreach($id_post_img as $result =>$value)
{
$img_post=get_post_custom($value);
foreach($img_post as $key1 => $value1){
if($key1=="_wp_attached_file"){
$img=$value1[0];
$url=home_url().'/resource/uploads/'.$img;
}
}
}
return $url;	
}
return false;
}
function jam_get_post_custom_images_attid($id_post,$key_images_upload){
global $wpdb;

$id_post_img= get_post_custom_values($key_images_upload,$id_post);  
if(is_array($id_post_img)){
$img="no_image.jpg";
foreach($id_post_img as $result =>$value){
return $value;
}			
}
return false;
}

function jam_get_file_custom_images($id_post,$key_images_upload){
global $wpdb;
$id_post_img= get_post_custom_values($key_images_upload,$id_post);
if(is_array($id_post_img)){
$img="no_image.jpg";
foreach($id_post_img as $result =>$value){
$img_post=get_post_custom($value);
foreach($img_post as $key1 => $value1){
if($key1=="_wp_attached_file"){
$img=$value1[0];
$url=$img;
}
}
}
return $url;	
}
return false;
}
function jam_get_image_size_custom($post_id,$key_images_upload,$size=''){
$id_post_img= get_post_custom_values($key_images_upload,$post_id);
if(is_array($id_post_img)){
foreach($id_post_img as $result =>$value){           
$name_img=wp_get_attachment_metadata($value);
}
preg_match('#[0-9]*/[0-9]*+/#', $name_img['file'], $upload_dir);
if($name_img['sizes'][$size]['file'] !=''){
return $upload_dir[0].$name_img['sizes'][$size]['file'];
}
else{
return '';
}
}
else{
return '';
}
}

/**
* Ajax update post meta
*/
function mcp_update_post_meta(){
header('Content-Type: application/json'); 
echo json_encode(update_post_meta($_REQUEST['post_id'],$_REQUEST['meta_key'],$_REQUEST['meta_value']));
die();
}
add_action('wp_ajax_nopriv_mcp_update_post_meta', 'mcp_update_post_meta');
add_action('wp_ajax_mcp_update_post_meta', 'mcp_update_post_meta');
?>