<?php
function my_type_image_box() {
$mediaSize=getSizefromMedia();
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'dao-tao', 'normal', 'low');	
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'gioi-thieu', 'normal', 'low');
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'goc-hoc-vien', 'normal', 'low');
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'album', 'normal', 'low');	
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'dich-vu', 'normal', 'low');
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'hoat-dong', 'normal', 'low');
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'khach-hang', 'normal', 'low');
add_meta_box('postimagediv', __('Size: '.$mediaSize.' pixel'), 'post_thumbnail_meta_box', 'khuyen-mai', 'normal', 'low');
if($_GET['post']==1){
add_meta_box( 'postimagediv', __('Logo (size 510 x 300 pixel).'), 'post_thumbnail_meta_box', 'page', 'normal', 'high' );
}

if($_GET['post']==21){
//add_meta_box( 'postimagediv', __('Size: 320 x 240 pixel'), 'post_thumbnail_meta_box', 'page', 'normal', 'high' );
}	
}
/*-----------------------------------------------------------------------*/
add_action('do_meta_boxes', 'my_type_image_box');
/*-----------------------------------------------------------------------*/
add_image_size('featured_news',555,416,true);
add_image_size('featured_medium',360,270,true);
add_image_size('thumb_news',64,64,true);
?>