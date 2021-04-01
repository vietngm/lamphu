<div id="list-gallery-box">
<?php
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$rel = $_key->key;
	$o = $_key->attach_id;
	$order = $_key->order;
	$image_attributes=wp_get_attachment_image_src($o,'gallery_admin_thumb');
?>
<div class="c_gallery" id="id_gallery_pro_<?php echo $rel; ?>">
<div class="gallery-product" align="center" id="upload_image_gallery_<?php echo $rel; ?>">
<a href="" onclick="return false" class="upload_image_gallery" rel="<?php echo $rel; ?>">
<div class="thumb_show" align="center"><img src="<?php echo $image_attributes[0];?>" width="<?php echo $image_attributes[1];?>" height="<?php echo $image_attributes[2];?>" /></div>
</a>
</div>
<div class="tbar">
<div class="order"><input type="text"  value="<?php echo $order; ?>" id="order_gallery_<?php echo $rel; ?>" onkeyup="setOrder('<?php echo $rel; ?>')" /></div>
<div class="del-gallery" onclick="delete_element('<?php echo $rel; ?>')">
<div  align="center" class="del-gallery-c"><a href="" onclick="return false"><span class="dashicons dashicons-trash"></span></a></div>
</div>
</div>
</div>
<?php }} ?>
</div>