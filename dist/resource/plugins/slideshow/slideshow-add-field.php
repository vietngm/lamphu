<?php
$ar=explode(',',get_option('binfo[arr_banner]'));
foreach($ar as $i){
	$gallery = get_option('binfo[gallery_datas_'.$i.']');
	$alt = get_option('binfo[banneralt_'.$i.']');
	$titleimg = get_option('binfo[img_title_'.$i.']');
	$url = get_option('binfo[bannerurl_'.$i.']');
	$slugbanner = get_option('binfo[op_banner_'.$i.']');
	$bannershow = get_option('binfo[hienthi_banner_'.$i.']');
	$titlebanner = get_option('binfo[banner_title_'.$i.']');
	$gallery_datas = get_option('gallery_datas_'.$i);
	$gallery_datas_total = get_option('gallery_datas_total_'.$i);
	$srcfirst="";
	if($gallery_datas!='' && $gallery_datas_total > 0){
		$list_gallery =$gallery_datas;
		$list_gallery = str_replace('},','};',$list_gallery);
		$_list = explode(';',$list_gallery);

		if(!empty($_list) && $_list>0){
			list($firstKey) = $_list;
			$_key = json_decode($firstKey);
			$num = $_key->key;
			$o = $_key->attach_id;
			$order = $_key->order;
			$srcfirst=wp_get_attachment_image_src($o,'slideshow_medium');
		}
	}
?>
<div id="number_banner_<?php echo $i;?>">
<div class="postbox">

<button type="button" class="handlediv button-link btn-collapse" aria-expanded="true">
<span class="screen-reader-text">Toggle panel: <?php echo $titlebanner; ?></span>
<span class="toggle-indicator" aria-hidden="true"></span>
</button>
<h2 class="hndle ui-sortable-handle" id="title_banner_<?php echo $i;?>"><span>Banner <?php echo $titlebanner; ?></span></h2>
<input type="hidden" name="binfo[banner_title_<?php echo $i;?>]"  value="<?php echo($titlebanner!='')?$titlebanner:'slideshow' ?>">
<div class="inside">
<div class="bimage_outer">
<table width="100%">
<tr>
<td>
<div class="bimge_div">
<a class="bimge_content b_dashed uploadphoto_<?php echo $i;?>" href="#fancy_<?php echo $i;?>" onclick="getID(<?php echo $i;?>)">
<img src="<?php echo $srcfirst[0]; ?>" />
</a>
<?php include('temp-thumb.php'); ?>
</div>
</td>
<td width="62%">
<label class="ls_label">Alt Text:</label><br>
<input type="text" class="ls_input" name="binfo[banneralt_<?php echo $i;?>]" value="<?php echo ($alt!='')?$alt:'';?>" placeholder="Enter Alt text">
<label class="ls_label">Title:</label><br>
<input type="text" class="ls_input" name="binfo[img_title_<?php echo $i;?>]" value="<?php echo ($titleimg!='')?$titleimg:'';?>" placeholder="Enter Title">
<label class="ls_label">Url:</label><br>
<input type="text" class="ls_input" name="binfo[bannerurl_<?php echo $i;?>]" value="<?php echo ($url!='')?$url:'';?>" placeholder="http://">
</td>
</tr>
</table>
<div align="right" class="bottom-bar">
<a class="button delete_banner button-primary" href="#" style="float:right" onclick="delete_banner(<?php echo $i;?>)">Xoá banner</a>
<div style="float:right">
<label>Hiển thị:</label><input type="radio" name="binfo[hienthi_banner_<?php echo $i;?>]" value="1" <?php echo ($bannershow==1)?'checked="checked"':""; ?> /><label>Có</label>
<input type="radio" name="binfo[hienthi_banner_<?php echo $i;?>]" value="0" <?php echo ($bannershow==0)?'checked="checked"':""; ?> /><label>Không</label>
<label style="margin-left:20px">Banner thuộc:</label>
<select id="op_banner_<?php echo $i;?>" name="binfo[op_banner_<?php echo $i;?>]" onchange="changeOb(<?php echo $i;?>)">
<?php echo get_all_custom_select_slug($slugbanner);?>
</select>
</div>
<div class="clear"></div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>