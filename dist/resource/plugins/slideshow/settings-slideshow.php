<?php
add_action('admin_menu', 'banner_add_pages');
function banner_add_pages() {
	add_options_page(__('Banner Settings','menu-banner'), __('Banner Settings','menu-banner'), 'manage_options', 'banner-settings', 'banner_settings_page');
}
function banner_settings_page() {
	if (!current_user_can('manage_options')){
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	//$binfo = array();
	$totalBanner = $_POST['binfo']['total_number_banner'];
	$arrBanner = $_POST['binfo']['arr_banner'];
	$banner_w = $_POST['binfo']['bannerwidth'];
	$banner_h = $_POST['binfo']['bannerheight'];
	
	$w_thumb = $_POST['binfo']['bannerwidth_thumb'];
	$h_thumb = $_POST['binfo']['bannerheight_thumb'];
	
	$effect = $_POST['binfo']['op_effect'];
	
	$control = $_POST['binfo']['show_control'];
	$shadow = $_POST['binfo']['show_shadow'];

	if ( isset( $_POST['binfo'] )) {
		//$term_meta = get_option( "taxonomy_$t_id" );
		$hidden_action_banner = 'hidden_action_banner';

		update_option('binfo[total_number_banner]',$totalBanner);
		update_option('binfo[arr_banner]',$arrBanner);

		update_option('binfo[bannerwidth]',$banner_w);
		update_option('binfo[bannerheight]',$banner_h);
		
		update_option('binfo[bannerwidth_thumb]',$w_thumb);
		update_option('binfo[bannerheight_thumb]',$h_thumb);
		update_option('binfo[op_effect]',$effect);
		
		update_option('binfo[show_control]',$control);
		update_option('binfo[show_shadow]',$shadow);
		$ar=explode(',',get_option('binfo[arr_banner]'));
		foreach($ar as $i){
			// update_option('binfo[gallery_datas_'.$i.']',$_POST['binfo']['gallery_datas_'.$i]);
			update_option('gallery_datas_total_'.$i,$_POST['gallery_datas_total_'.$i]);
			update_option('gallery_datas_'.$i,preg_replace('/[^a-zA-Z0-9_{}":, %\[\]\.\(\)%&-]/s', '', $_POST['gallery_datas_'.$i]));
			update_option('binfo[banneralt_'.$i.']',$_POST['binfo']['banneralt_'.$i]);
			update_option('binfo[img_title_'.$i.']',$_POST['binfo']['img_title_'.$i]);
			update_option('binfo[banner_title_'.$i.']',$_POST['binfo']['banner_title_'.$i]);
			update_option('binfo[bannerurl_'.$i.']',$_POST['binfo']['bannerurl_'.$i]);
			update_option('binfo[op_banner_'.$i.']',$_POST['binfo']['op_banner_'.$i]);
			update_option('binfo[hienthi_banner_'.$i.']',$_POST['binfo']['hienthi_banner_'.$i]);
		}
		// Save the option array.
		//update_option("taxonomy_$t_id",$binfo);
	}
	$totalBanner = get_option('binfo[total_number_banner]');
	$arrBanner = get_option('binfo[arr_banner]');
	$w= get_option('binfo[bannerwidth]');
	$h= get_option('binfo[bannerheight]');
	
	$w_thumb=get_option('binfo[bannerwidth_thumb]');
	$h_thumb=get_option('binfo[bannerheight_thumb]');
	
	$control = get_option('binfo[show_control]');
	$shadow = get_option('binfo[show_shadow]');
	
	add_image_size('slideshow_thumb',$w_thumb,$h_thumb,true);
	add_image_size('slideshow_medium',268,162,true);
	add_image_size('slideshow_large',$w,$h,true);	

	if( isset($_POST[ $hidden_action_banner ]) && $_POST[ $hidden_action_banner ] == 'Y' ) {
?>
<div class="updated"><p><strong><?php _e('Slideshow settings saved.', 'menu-banner' ); ?></strong></p></div>
<?php
}
echo '<div class="wrap">';
echo "<h2>" . __( 'Slideshow Plugin Settings', 'menu-banner' ) . "</h2>";
?>

<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<?php $html = get_all_custom_slug();?>
<input type="hidden" value='<?php echo $html; ?>' name="op_add_more" />
<form name="form1" method="post" action="">
<!--Luu tong banner moi lan click de cộng dồn-->
<input type="hidden" value="<?php echo ($totalBanner!='')? $totalBanner:-1?>" name="binfo[total_number_banner]" />
<input type="hidden" name="<?php echo $hidden_action_banner; ?>" value="Y">
<!--Luu mảng banner moi lan click-->
<input type="hidden" value="<?php echo ($arrBanner!='')? $arrBanner:''?>" name="binfo[arr_banner]" />
<!--Trong mỗi banner, đều có gallery-->
<!--<input type="hidden" value="-1" name="binfo[total_number_gallery]" />-->
<div id="post-body-content" class="postbox-container"><div class="meta-box-sortables ui-sortable"><?php if($arrBanner!=''){include('slideshow-add-field.php');}?></div></div>
<div id="postbox-container-1">
<?php include('save-setting.php'); ?>
<div style="clear:both"></div>
<?php include('demension-setting.php'); ?>
<div style="clear:both"></div>
<?php include('effect.php'); ?>
</div>
<div style="clear:both"></div>
</form>
</div>
</div>
<?php 
}
?>