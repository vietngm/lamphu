<div id="fancy_<?php echo $i;?>" align="left" class="banner-fancybox"><div class="title-fancybox">CHỌN HÌNH TỪ THƯ VIỆN</div>
	<input type="hidden" id="gallery_datas_total_<?php echo $i;?>" name="gallery_datas_total_<?php echo $i;?>" value="<?php echo ($gallery_datas_total!='')?$gallery_datas_total:0;?>" />
	<textarea id="gallery_datas_<?php echo $i;?>" name="gallery_datas_<?php echo $i;?>" class="gallery_datas"><?php echo ($gallery_datas!='')?$gallery_datas:'';?></textarea>
	<div class="dotline"></div>
	<div id="show_banner_<?php echo $i;?>" class="show_banner" data-id="<?php echo $i;?>">
		<?php
		if(!empty($_list) && $_list>0 && $gallery_datas_total > 0){
		foreach($_list as $key){
			$_key = json_decode($key);
			$num = $_key->key;
			$o = $_key->attach_id;
			$order = $_key->order;
			$image_attributes=wp_get_attachment_image_src($o,'gallery_admin_thumb');
		?>
			<div id="banner_imgelement_<?php echo $num; ?>" class="slideshow_popup_image popup_gal_<?php echo $num;?>">
				<div class="gallery-product" align="center">
					<a href="" onclick="return false" class="upload_image_gallery" rel="<?php echo $num; ?>">
						<div class="thumb_show" align="center"><img src="<?php echo $image_attributes[0];?>" width="<?php echo $image_attributes[1];?>" height="<?php echo $image_attributes[2];?>" /></div>
					</a>
				</div>
				<div class="tbar">
					<div class="order"><input type="text" value="<?php echo $order; ?>" id="order_banner_element_<?php echo $num; ?>" onkeyup="setBannerOrder('<?php echo $num; ?>','<?php echo $i;?>')" /></div>
					<div class="del-gallery" onclick="delBannerElement('<?php echo $num; ?>','<?php echo $i;?>')">
						<div align="center" class="del-gallery-c"><a href="" onclick="return false"><span class="dashicons dashicons-trash"></span></a></div>
					</div>
				</div>
			</div>
		<?php
			}
		}
		?>
	</div>
	<div class="clear"></div>
	<div class="dotline"></div>
	<div class="tablenav bottom button-popup" align="right">
		<button class="upload_image_button button button-primary" title="Add Images">Thêm hình</button>
		<button class="button apply-button" title="Add Images" onclick="delAllBannerElement('<?php echo $i;?>')">Xoá tất cả</button>
		<button class="button" title="Add Images" onclick="$.fancybox.close(true);return false">Đóng</button>
	</div>
</div>