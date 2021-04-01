var file_frame;
//var dem=0;
jQuery(function ($) {
	$('.upload_image_button').click(function (event) {
		event.preventDefault();
		// If the media frame already exists, reopen it.
		if (file_frame) {
			file_frame.open();
			return;
		}
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery(this).data('uploader_title'),
			button: {
				text: jQuery(this).data('uploader_button_text'),
			},
			multiple: true  // Set to true to allow multiple files to be selected
		});
		// When an image is selected, run a callback.
		file_frame.on('select', function () {
			var id = ($('.fancybox-inner .show_banner').attr('data-id'));
			//lay nhieu duong dan tu thu vien hinh
			var selection = file_frame.state().get('selection');
			var gallery_total_id = parseInt($('#gallery_datas_total_' + id).val());
			var d = 1;
			selection.map(function (attachment) {
				attachment = attachment.toJSON();
				key_init = gallery_total_id + d;
				// var str = $('input[name="binfo[gallery_datas_'+id+']"]').val();
				var _key = '{"key":"' + key_init + '","attach_id":"' + attachment.id + '","order":"0"}';
				var str_area = $('#gallery_datas_' + id).val();
				// alert(d);
				if (str_area == '') {
					// str= attachment.id;
					$('#gallery_datas_' + id).val(_key);
				}
				else {
					// str=str+','+attachment.id;
					$('#gallery_datas_' + id).val(str_area + ',' + _key);
				}
				$('#show_banner_' + id).append(htmlAppend(attachment.id, id, d, attachment.url));
				// Do something with attachment.id and/or attachment.url here
				d++;
			});
			// $('input[name="binfo[gallery_datas_'+id+']"]').val(str);

			var s_length = parseInt(selection.length) + gallery_total_id;
			$('#gallery_datas_total_' + id).val(s_length);
			//lay 1 hinh dau tien tu thu vien hinh
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame.state().get('selection').first().toJSON();
			$('.uploadphoto_' + id).empty();
			$('.uploadphoto_' + id).append('<img src="' + attachment.url + '" style="max-height: 156px;vertical-align: middle;max-width:272px;" />');
			//alert(attachment.url);
			// Do something with attachment.id and/or attachment.url here
		});
		// Finally, open the modal
		file_frame.open();
	});
});

jQuery(function ($) {
	$(".add-new-banner").click(function () {
		var number = parseInt($('input[name="binfo[total_number_banner]"]').val()) + 1;
		$('input[name="binfo[total_number_banner]"]').val(number);
		var str = $('input[name="binfo[arr_banner]"').val();
		if (str == '')
			$('input[name="binfo[arr_banner]"').val(number);
		else
			$('input[name="binfo[arr_banner]"').val(str + ',' + number);
		var html = html_option(number);
		$('#post-body-content .meta-box-sortables').append(html);
	});
	//---------------------------------------
	$(".add-new-cate").click(function () {
		var cat = $('input[name = "binfo[categories]"]').val();
		$('#op_categories').append('<option>' + cat + '</option>');
	});
});

function html_option(id) {

	html = '<div id="number_banner_' + id + '">'
	html += '<div class="postbox">'

	html += '<button type="button" class="handlediv button-link btn-collapse" aria-expanded="true">'
	html += '<span class="screen-reader-text">Toggle panel: <?php echo $titlebanner; ?></span>'
	html += '<span class="toggle-indicator" aria-hidden="true"></span>'
	html += '</button>'
	html += '<h2 class="hndle ui-sortable-handle" id="title_banner_' + id + '"><span>Banner slideshow ' + id + '</span></h2>'

	html += '<input type="hidden" name="binfo[banner_title_' + id + ']" value="">'
	html += '<div class="inside">'

	html += '<div class="bimage_outer">'
	html += '<table width="100%">'
	html += '<tr>'
	html += '<td>'

	html += '<div class="bimge_div">'
	html += '<a class="bimge_content ls-cont-uploadphoto b_dashed uploadphoto_' + id + '" href="#fancy_' + id + '" onclick="getID(' + id + ')"></a>'

	html += '<div id="fancy_' + id + '" align="left" class="banner-fancybox"><div class="title-fancybox">CHỌN HÌNH TỪ THƯ VIỆN</div>'

	html += '<input type="hidden" id="gallery_datas_total_' + id + '" name="gallery_datas_total_' + id + '" value="0" />'
	html += '<textarea id="gallery_datas_' + id + '" name="gallery_datas_' + id + '" class="gallery_datas"></textarea>'

	html += '<div class="dotline"></div>'
	html += '<div id="show_banner_' + id + '" class="show_banner" data-id="' + id + '">'
	html += '</div>'
	html += '<div class="clear"></div>'
	html += '<div class="dotline"></div>'
	html += '<div class="tablenav bottom button-popup" align="right">'
	html += '<button class="upload_image_button button button-primary" title="Add Images">Thêm hình</button>'
	html += '<button class="button apply-button" title="Add Images" onclick="delAllBannerElement(' + id + ')" style="margin: 0px 5px 0px 5px !important;">Xoá tất cả</button>'
	html += '<button class="button" title="Add Images" onclick="$.fancybox.close(true);return false">Đóng</button>'
	html += '</div></div>'

	html += '</div>'
	html += '</td>'
	html += '<td width="62%">'
	html += '<label class="ls_label">Alt Text:</label><br>'
	html += '<input type="text" class="ls_input" name="binfo[banneralt_' + id + ']" value="" placeholder="Enter Alt text">'
	html += '<label class="ls_label">Title:</label><br>'
	html += '<input type="text" class="ls_input" name="binfo[img_title_' + id + ']" value="" placeholder="Enter Title">'
	html += '<label class="ls_label">Url:</label><br>'
	html += '<input type="text" class="ls_input" name="binfo[bannerurl_' + id + ']" value="" placeholder="http://">'
	html += '</td>'
	html += '</tr>'
	html += '</table>'

	html += '<div align="right" class="bottom-bar">'
	html += '<a class="button delete_banner button-primary" href="#" style="float:right" onclick="delete_banner(' + id + ')">Delete banner</a>'
	html += '<div style="float:right">'
	html += '<label>Hiển thị:</label><input type="radio" name="binfo[hienthi_banner_' + id + ']" value="1" /><label>Có</label>'
	html += '<input type="radio" name="binfo[hienthi_banner_' + id + ']" value="0" /><label>Không</label>'
	html += '<label style="margin-left:20px">Banner thuộc:</label>'
	html += '<select id="op_banner_' + id + '" name="binfo[op_banner_' + id + ']" onchange="changeOb(' + id + ')">'

	html += $("input[name='op_add_more']").val()

	html += '</select>'
	html += '</div>'
	html += '<div class="clear"></div>'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	return html;
}
/************************************************************
Add tung hinh vao popup
************************************************************/
function htmlAppend(attach_id, id, num, url) {
	html = '<div class="slideshow_popup_image popup_gal_' + attach_id + '" align="center">'
	html += '<div class="del_banner_gallery" onclick="del_element_gallery(' + id + ',' + attach_id + ')"></div>'
	html += '<div align="center" class="content_image"><img src="' + url + '" height="100" /></div>'
	html += '<div><input type="text" value="" name="binfo[order_' + attach_id + ']" placeholder="Thứ tự" class="slideshow_order"></div>'
	html += '</div>'
	html = '<div id="banner_imgelement_' + num + '" class="slideshow_popup_image popup_gal_<?php echo $num;?>">'
	html += '<div class="gallery-product" align="center">'
	html += '<a href="" onclick="return false" class="upload_image_gallery" rel="' + num + '">'
	html += '<div class="thumb_show" align="center"><img src="' + url + '" width="100" height="100" /></div>'
	html += '</a>'
	html += '</div>'
	html += '<div class="tbar">'
	html += '<div class="order"><input type="text" value="0" id="order_banner_element_' + num + '" onkeyup="setBannerOrder(' + num + ',' + id + ')" /></div>'
	html += '<div class="del-gallery" onclick="delBannerElement(' + num + ',' + id + ')">'
	html += '<div align="center" class="del-gallery-c"><a href="" onclick="return false"><span class="dashicons dashicons-trash"></span></a></div>'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	return html;
}
/************************************************************
Xoá banner lớn
************************************************************/
function delete_banner(num) {
	$('#number_banner_' + num).fadeOut('slow').remove();
	var str = $('input[name="binfo[arr_banner]"').val();
	var arr = splitArray(str, num);

	$('input[name="binfo[arr_banner]"').val(arr);
	if ($('input[name="binfo[arr_banner]"').val() == '')
		$('input[name="binfo[total_number_banner]"]').val(-1);
	return false;
}

/************************************************************
Lấy ID của fancybox hiện tại
************************************************************/
function getID(num) {
	var $ = jQuery;
	$.fancybox('#fancy_' + num);
}
/************************************************************
Thay đổi tiêu đề banner
************************************************************/
function changeOb(num) {
	$('#title_banner_' + num).html('Banner ' + $('#op_banner_' + num + ' option:selected').text());
	$('input[name="binfo[banner_title_' + num + ']"]').val($('#op_banner_' + num + ' option:selected').text());
}
/************************************************************
Xoa banner phuong thuoc cu
************************************************************/
function del_element_gallery(id, order) {
	var $ = jQuery;
	var str = $('input[name="binfo[gallery_datas_' + id + ']"]').val();

	var arr = splitArray(str, order);

	$('#' + id + ' .popup_gal_' + order).fadeOut('slow');
	$('input[name="binfo[gallery_datas_' + id + ']"]').val(arr);
}

function splitArray(str, order) {
	var arr = new Array();
	str = str.split(',');
	j = 0;
	for (var i = 0; i < str.length; i++) {
		if (str[i] != order) {
			arr[j] = str[i];
			j++;
		}
	}
	return arr;
}
/************************************************************
Đóng/ mở banner lớn
************************************************************/
jQuery(function () {
	$('.btn-collapse').click(function () {
		if ($(this).attr('aria-expanded') == 'true') {
			$(this).parent('.postbox').addClass('closed');
			$(this).attr('aria-expanded', 'false');
		}
		else {
			$(this).parent('.postbox').removeClass('closed');
			$(this).attr('aria-expanded', 'true');
		}
	});
});

/************************************************************
Xoa tung element trong 1 banner
************************************************************/
function delBannerElement(num, id) {
	$ = jQuery;
	var str = $('#gallery_datas_' + id).val();
	var list = JSON.parse('[' + str + ']');
	var send_datas = {
		action: "delKey",
		key: parseInt(num),
		arr: list
	};
	$('#fancy_' + id + ' #banner_imgelement_' + num).fadeOut();
	$.post(ajaxurl, send_datas, function (data) {
		$('#gallery_datas_' + id).val(data);
		return false;
	});
}
/************************************************************
Thay doi thu tu trong banner
************************************************************/
function setBannerOrder(num, id) {
	$ = jQuery;
	var ord = $('#fancy_' + id + ' #order_banner_element_' + num).val();
	var str = $('#gallery_datas_' + id).val();
	var list = JSON.parse('[' + str + ']');

	var send_datas = {
		action: "replaceKey",
		key: parseInt(num),
		arr: list,
		order: ord,
		status: 'order'
	};
	$.post(ajaxurl, send_datas, function (data) {
		$('#gallery_datas_' + id).val(data);
	});
}
/************************************************************
Đóng/ mở banner lớn
************************************************************/
function delAllBannerElement(id) {
	$("#fancy_" + id + " #gallery_datas_" + id).empty();
	$("#fancy_" + id + " #show_banner_" + id).empty();
	$("#fancy_" + id + " #gallery_datas_" + id).val();
	$("#fancy_" + id + " #gallery_datas_total_" + id).val("0");
	return false;
}