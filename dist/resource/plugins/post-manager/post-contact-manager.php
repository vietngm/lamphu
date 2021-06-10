<?php
$thong_tin = array(
'id' => 'my-thong-tin',
'title' => 'Thông tin Công Ty',
'page' => 'page',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Tên Công Ty','id' => $prefix . 'ten-cong-ty','type' => 'text','std' => 'Tên Công Ty'),
array('name' => 'VPGD','id' => $prefix . 'van-phong-giao-dich','type' => 'text','std' => 'Văn phòng giao dịch'),
array('name' => 'ĐT bàn','id' => $prefix . 'dt-ban','type' => 'text','std' => 'Điện thoại bàn'),
array('name' => 'ĐT Hỗ trợ','id' => $prefix . 'dt-hotro','type' => 'textarea','std' => 'Điện thoại hỗ trợ'),
array('name' => 'Fax','id' => $prefix . 'fax','type' => 'text','std' => 'Fax'),
array('name' => 'Hotline','id' => $prefix . 'hotline','type' => 'text','std' => 'Mobile Number'),
array('name' => 'Mail','id' => $prefix . 'mail','type' => 'text','std' => 'Địa chỉ mail'),
array('name' => 'Facebook','id' => $prefix . 'facebook','type' => 'text','std' => 'Địa chỉ facebook'),
array('name' => 'Youtube','id' => $prefix . 'youtube','type' => 'text','std' => 'Địa chỉ Youtube'),
array('name' => 'Website','id' => $prefix . 'website','type' => 'text','std' => 'Website'),		
array('name' => 'Copyright','id' => $prefix . 'copyright','type' => 'text','std' => 'Copyright')		
)
);
$google_map = array(
'id' => 'my-google-map',
'title' => 'Sơ đồ hướng dẫn',
'page' => 'page',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(    
array('name' => 'Tọa độ','id' => $prefix . 'toa-do','type' => 'text','std' => 'Tọa độ'),	
array('name' => 'Địa chỉ','id' => $prefix . 'dia-chi-gmap','type' => 'textarea','std' => 'Địa chỉ gmap')			
)
);

add_action('admin_menu', 'mytheme_add_box');
// Add meta box
function mytheme_add_box() {
$post = get_post($_GET['post']);	
if($post->post_name=='lien-he' || $post->post_name=='contact' || $post->post_name=='lienhe'){
global $thong_tin,$google_map;
add_meta_box($thong_tin['id'], $thong_tin['title'], 'mytheme_show_box', $thong_tin['page'], $thong_tin['context'], $thong_tin['priority']);
add_meta_box($google_map['id'], $google_map['title'], 'mytheme_google_map', $google_map['page'], $google_map['context'], $google_map['priority']);
}
}

function mytheme_google_map() {
global $google_map, $post;

// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="table">';
foreach ($google_map['fields'] as $field) {
// get current post meta data
$meta = get_post_meta($post->ID, $field['id'], true);
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/content-controls.php');
}
echo '</table>';
}

function mytheme_show_box() {
global $thong_tin, $post;
// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="table">';
foreach ($thong_tin['fields'] as $field) {
// get current post meta data
$meta = get_post_meta($post->ID, $field['id'], true);
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/content-controls.php');
}
echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
global $thong_tin,$google_map;

// verify nonce
if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {return $post_id;}
// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post_id;}

// check permissions
if ('page' == $_POST['post_type']) {
if (!current_user_can('edit_page', $post_id)) {return $post_id;}
}
elseif (!current_user_can('edit_post', $post_id)) {return $post_id;}
foreach ($thong_tin['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];
if ($new && $new != $old) {update_post_meta($post_id, $field['id'], $new);}
elseif ('' == $new && $old) {delete_post_meta($post_id, $field['id'], $old);}
}

foreach ($google_map['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];
if ($new && $new != $old) {update_post_meta($post_id, $field['id'], $new);}
elseif ('' == $new && $old) {delete_post_meta($post_id, $field['id'], $old);}
}
}

function contactInfo(){
$pages=get_pages();	
$count = count($pages);	
for($i = 0;$i<$count;$i++){
$search_array = (array)$pages[$i];
if (in_array('contact', $search_array,true) || in_array('lienhe', $search_array,true) || in_array('lien-he', $search_array,true) || in_array('contact-us', $search_array,true)){		
$post_id = $pages[$i]->ID;
}	
}

$myposts = get_post($post_id );
$lienhe["mail"]=get_post_meta($post_id ,'mail',true);
$lienhe["fax"]=get_post_meta($post_id ,'fax',true);
$lienhe["diachi"]=get_post_meta($post_id ,'dia-chi',true);
$lienhe["dtban"]=get_post_meta($post_id ,'dt-ban',true);
$lienhe["hotline"]=get_post_meta($post_id ,'hotline',true);
$lienhe["thoigian"]=get_post_meta($post_id ,'thoi-gian',true);		
$lienhe["tencongty"]=get_post_meta($post_id ,'ten-cong-ty',true);
$lienhe["dthotro"]=get_post_meta($post_id ,'dt-ho-tro',true);
$lienhe["copy"]=get_post_meta($post_id ,'copyright',true);
$lienhe["facebook"]=get_post_meta($post_id ,'facebook',true);
$lienhe["website"]=get_post_meta($post_id ,'website',true);
$lienhe["toado"]=get_post_meta($post_id ,'toa-do',true);
$lienhe["diachigmap"]=get_post_meta($post_id ,'dia-chi-gmap',true);
$lienhe["dthotro"]=get_post_meta($post_id ,'dt-hotro',true);

return $lienhe;
}
?>
