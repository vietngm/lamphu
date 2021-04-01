<?php
$prefix='';
$thong_tin = array(
	'id' => 'my-thong-tin',
	'title' => 'Thông tin Công Ty',
	'page' => 'page',	
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
		'name' => 'Tên Công Ty',
		'id' => $prefix . 'ten-cong-ty',
		'type' => 'text',
		'std' => 'Tên Công Ty'
		),					  
		array(
		'name' => 'Hotline',
		'id' => $prefix . 'hotline',
		'type' => 'text',
		'std' => 'Hotline'
		),
		array(
		'name' => 'Mobile',
		'id' => $prefix . 'mobile',
		'type' => 'text',
		'std' => 'Mobile Number'
		),
		array(
		'name' => 'Mail',
		'id' => $prefix . 'mail',
		'type' => 'text',
		'std' => 'Địa chỉ mail'
		),
		array(
		'name' => 'Facebook',
		'id' => $prefix . 'facebook',
		'type' => 'text',
		'std' => 'Địa chỉ facebook'
		),
		array(
		'name' => 'Danh sách DT',
		'id' => $prefix . 'dt-ho-tro',
		'type' => 'textarea',
		'std' => 'Danh sách điện thoại'
		),		
		array(
		'name' => 'Yahoo',
		'id' => $prefix . 'yahoo',
		'type' => 'textarea',
		'std' => 'Danh sách nickname'
		),	
		array(
		'name' => 'Skype',
		'id' => $prefix . 'skype',
		'type' => 'textarea',
		'std' => 'Danh sách nickname'
		),
		array(
		'name' => 'Video',
		'id' => $prefix . 'video',
		'type' => 'textarea',
		'std' => 'Danh sách video'
		),			
		array(
		'name' => 'Google plus',
		'id' => $prefix . 'gplus',
		'type' => 'text',
		'std' => 'Địa chỉ Google plus'
		),		
		array(
		'name' => 'Twitter',
		'id' => $prefix . 'twitter',
		'type' => 'text',
		'std' => 'Địa chỉ twitter'
		),
		array(
		'name' => 'Youtube',
		'id' => $prefix . 'youtube',
		'type' => 'text',
		'std' => 'Địa chỉ Youtube'
		),
		array(
		'name' => 'Instagram',
		'id' => $prefix . 'instagram',
		'type' => 'text',
		'std' => 'Địa chỉ Instagram'
		),		
		array(
		'name' => 'Copyright',
		'id' => $prefix . 'copyright',
		'type' => 'text',
		'std' => 'Copyright'
		)		
	)
);
$google_map = array(
	'id' => 'my-google-map',
	'title' => 'Sơ đồ hướng dẫn',
	'page' => 'page',	
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(    
		array(
		'name' => 'Tọa độ',
		'id' => $prefix . 'toa-do',
		'type' => 'text',
		'std' => 'Tọa độ'
		),	
		array(
		'name' => 'Địa chỉ',
		'id' => $prefix . 'dia-chi-gmap',
		'type' => 'textarea',
		'std' => 'Địa chỉ gmap'
		)			
	)
);

//add_action('admin_menu', 'mytheme_add_box');
// Add meta box
function mytheme_add_box1() {
	$post = get_post($_GET['post']);	
	if($post->post_name=='lien-he' || $post->post_name=='contact' || $post->post_name=='lienhe'){
		global $thong_tin,$google_map;
		add_meta_box($thong_tin['id'], $thong_tin['title'], 'mytheme_show_box', $thong_tin['page'], $thong_tin['context'], $thong_tin['priority']);
		add_meta_box($google_map['id'], $google_map['title'], 'mytheme_google_map', $google_map['page'], $google_map['context'], $google_map['priority']);
	}
}

mytheme_show_box1();

function mytheme_google_map1() {
global $google_map, $post;

// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="form-table">';
foreach ($google_map['fields'] as $field) {
// get current post meta data
$meta = get_post_meta($post->ID, $field['id'], true);
echo '<tr>','<th class="seo-label" scope="row"><label>', $field['name'], '</label></th>','<td>';
switch ($field['type']) {
case 'text':
echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width:100%;margin-bottom:5px" />', $field['desc'];
break;

case 'file':
echo '<input type="file" name="', $field['id'], '" id="', $field['id'], '"  />',$field['desc'];
break;

case 'textarea':
echo '<textarea name="', $field['id'], '" id="', $field['id'], '"  class="meta-textarea">', $meta ? $meta : $field['std'], '</textarea>',$field['desc'];
break;
case 'select':
echo '<select name="', $field['id'], '" id="', $field['id'], '">';
foreach ($field['options'] as $option) {
echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
echo '</select>';
break;
case 'radio':
foreach ($field['options'] as $option) {
echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
}
break;
case 'checkbox':
echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
break;
}
echo  '<td>','</tr>';
}

echo '</table>';
}

function mytheme_show_box1() {
global $thong_tin, $post;
// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="form-table">';
foreach ($thong_tin['fields'] as $field) {
// get current post meta data
$meta = get_post_meta($post->ID, $field['id'], true);
echo '<tr>','<th class="seo-label"><label>', $field['name'], '</label></th>','<td>';
switch ($field['type']) {
case 'text':
echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width:100%;" />',$field['desc'];
break;
case 'file':echo '<input type="file" name="', $field['id'], '" id="', $field['id'], '"  />',$field['desc'];break;
case 'textarea':
echo '<textarea name="', $field['id'], '" id="', $field['id'], '" class="meta-textarea">', $meta ? $meta : $field['std'], '</textarea>',$field['desc'];
break;
case 'select':
echo '<select name="', $field['id'], '" id="', $field['id'], '">';
foreach ($field['options'] as $option) {
echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
echo '</select>';
break;
case 'radio':
foreach ($field['options'] as $option) {
echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
}
break;
case 'checkbox':
echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
break;
}
echo '<td>',
'</tr>';
}

echo '</table>';
}

add_action('save_post', 'mytheme_save_data1');

// Save data from meta box
function mytheme_save_data1($post_id) {
	global $thong_tin,$google_map;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
	
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}
	elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($thong_tin['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		}
		elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($google_map['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		}
		elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
?>