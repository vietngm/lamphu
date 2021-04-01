<?php
$gallery = array(
'id' => 'box-gallery-id',
'title' => 'Image gallery',
'page' => 'post',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Hình đại diện','id' => $prefix . 'gallery-thumb-id','type' => 'textarea','std' => ''),
array('name' => 'Total ID','id' => $prefix . 'total-gallery-id','type' => 'textarea','std' => '0')			
)
);
function gallery_show_box(){
global $gallery, $post;
getItermFiledGallery($gallery,$post);
}
add_action('save_post', 'gallery_save_data');
function gallery_save_data($post_id) {
global $gallery;
if (!wp_verify_nonce($_POST['gallery_meta_box_nonce'], basename(__FILE__))) {return $post_id;}
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post_id;}
if ('page' == $_POST['post_type']) {if (!current_user_can('edit_page', $post_id)) {return $post_id;}}
elseif (!current_user_can('edit_post', $post_id)) {return $post_id;}	
foreach ($gallery['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];

if ($new && $new != $old) {update_post_meta($post_id, $field['id'], $new);}
elseif ('' == $new && $old) {delete_post_meta($post_id, $field['id'], $old);}
}
}
function getItermFiledGallery($gallery,$post){
echo '<input type="hidden" name="gallery_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
?>
<table class="form-table"><tr><td valign="top" style="padding:0px">
<?php
foreach ($gallery['fields'] as $field){
$meta = get_post_meta($post->ID, $field['id'], true);
echo '<textarea  name="', $field['id'], '" id="', $field['id'], '" style="display:none">', $meta ? $meta : $field['std'], '</textarea>';
}
if(get_post_meta($post->ID,'gallery-thumb-id',true)!=''){
$list_gallery =get_post_meta($post->ID,'gallery-thumb-id',true);
$list_gallery = str_replace('},','};',$list_gallery);
$_list = explode(';',$list_gallery);
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/temp-gallery.php');
?>
<div class="clear"></div>
<div class="dotline"></div>
<div align="right">
<a href="javascript:void(0)" onclick="return false" class="button delete_all_gallery">Xóa tất cả</a>
<a href="javascript:void(0)" onclick="return false" class="button-primary add_more_gallery">
<span class="dashicons dashicons-admin-media" style="margin-top:3px;margin-right:5px;"></span>Thư viện hình ảnh
</a>
</div>
</td>
</tr>
</table>
<?php } ?>