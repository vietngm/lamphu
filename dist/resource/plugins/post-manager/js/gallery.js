// Uploading files
var file_frame;

jQuery(function ($) {
	$('.add_more_gallery').click(function (event) {
		rel = $(this).attr('rel');
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
			// We set multiple to false so only get one image from the uploader
			///attachment = file_frame.state().get('selection').first().toJSON();
			//attachment = file_frame.state().get('selection');
			var selection = file_frame.state().get('selection');
			var total_id = parseInt($('#total-gallery-id').val());
			var d = 1;

			selection.map(function (attachment) {
				attachment = attachment.toJSON();
				key_init = total_id + d;
				//Image draw
				//num_gallery = parseInt($('#total-gallery-id').val())+1;	
				var str = $('#gallery-thumb-id').val();
				var _key = '{"key":"' + key_init + '","attach_id":"' + attachment.id + '","order":"0"}';
				if (str == '')
					$('#gallery-thumb-id').val(_key);
				else
					$('#gallery-thumb-id').val(str + ',' + _key);

				var html = html_temp(key_init);
				$('#list-gallery-box').append(html);

				var img = '<div class="thumb_show" align="center"><img src="' + attachment.url + '" height="100" width="100" /></div>';
				$('#upload_image_gallery_' + key_init + ' .upload_image_gallery').append(img);

				//$('#total-gallery-id').val(num_gallery);	  
				//---------------------------------------
				d++;
			});

			var s_length = parseInt(selection.length);
			$('#total-gallery-id').val(total_id + s_length);
		});

		// Finally, open the modal
		file_frame.open();
	});
});

jQuery(function ($) {
	var num_gallery = 0;
	$(".add_one_gallery").click(function () {
		num_gallery = parseInt($('#total-gallery-id').val()) + 1;
		var str = $('#gallery-thumb-id').val();
		var _key = '{"key":"' + num_gallery + '","attach_id":"null","order":"0"}';
		if (str == '')
			$('#gallery-thumb-id').val(_key);
		else
			$('#gallery-thumb-id').val(str + ',' + _key);

		var html = html_temp(num_gallery);
		$('#list-gallery-box').append(html);
		$('#total-gallery-id').val(num_gallery);
	});
	//---------------------------------------	
	$('.delete_all_gallery').click(function () {
		$('#gallery-thumb-id').html('');
		$('#total-gallery-id').val('');
		$('#list-gallery-box').html('');
	});

	//---------------------------------------
});

function html_temp(num) {
	html = '<div class="c_gallery" id="id_gallery_pro_' + num + '">'
	html += '<div class="gallery-product" align="center" id="upload_image_gallery_' + num + '"><a href="" onclick="return false" class="upload_image_gallery" rel="' + num + '"></a></div>'
	html += '<div class="tbar">'
	html += '<div class="order"><input type="text" value="0" id="order_gallery_' + num + '" onkeyup="setOrder(' + num + ')" /></div>'
	html += '<div class="del-gallery" onclick="delete_element(' + num + ')"><div  align="center" class="del-gallery-c">'
	html += '<a href="#" onclick="return false;"><span class="dashicons dashicons-trash"></span></a></div></div></div>'
	html += '</div>'
	return html;
}

//---------------------------------------	
function delete_element(num) {
	$ = jQuery;

	var str = $('#gallery-thumb-id').val();
	var list = JSON.parse('[' + str + ']');

	var send_datas = {
		action: "delKey",
		key: parseInt(num),
		arr: list
	};
	$.post(ajaxurl, send_datas, function (data) {
		$('#id_gallery_pro_' + num).fadeOut();
		$('#gallery-thumb-id').val(data);
		return false;
	});
}
//---------------------------------------	
function setOrder(id) {

	$ = jQuery;

	var ord = $('#order_gallery_' + id).val();
	var str = $('#gallery-thumb-id').val();
	var list = JSON.parse('[' + str + ']');

	var send_datas = {
		action: "replaceKey",
		key: parseInt(id),
		arr: list,
		order: ord,
		status: 'order'
	};
	$.post(ajaxurl, send_datas, function (data) {
		$('#gallery-thumb-id').val(data);
	});
}