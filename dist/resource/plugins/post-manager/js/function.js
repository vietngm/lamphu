var $ = jQuery.noConflict();
/*----------------------------Random-------------------------------------*/
$.extend({
	password: function (length, special) {
		var iteration = 0;
		var password = "";
		var randomNumber;
		if (special == undefined) {
			var special = false;
		}
		while (iteration < length) {
			randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
			if (!special) {
				if ((randomNumber >= 33) && (randomNumber <= 47)) { continue; }
				if ((randomNumber >= 58) && (randomNumber <= 64)) { continue; }
				if ((randomNumber >= 91) && (randomNumber <= 96)) { continue; }
				if ((randomNumber >= 123) && (randomNumber <= 126)) { continue; }
			}
			iteration++;
			password += String.fromCharCode(randomNumber);
		}
		return password;
	}
});
$(document).ready(function () {
	var $ = jQuery;

	$(".deletecolorpicker").click(function () { $(this).parent().children(".color_mcp").val(""); return false; });
	if ($(".btn_random").length > 0) {
		$(".btn_random").click(function () {
			randomString = $.password(10);
			$(this).parent().parent().children().children(".random_str").val(randomString);
		});
	}
	$("#san-pham-mau-type-div").append("<div id='picker' style='float:right'></div>");

	$('.color_mcp').click(function () {
		$(this).parent().append("<div id='picker' style='float:left'></div>");
		var picker = $.farbtastic('#picker');
		var $this = $(this);
		picker.linkTo(function onColorChange(color) {
			$this.css({ 'background-color': color });
			$this.val(color);
		});
	});
	$('.color_mcp').click(function () {
		$("#picker").remove();
	});

	// Sortable album
	if ($(".album-list-image").length > 0) {
		$(".album-list-image").sortable();
	}

	// Save album
	$("#publish").click(function () {
		var albums = new Array();
		if ($(".album-list-image").length > 0) {
			$(".album-list-image").find("li").each(function () {
				albums.push({
					id: $(this).children("input.idattch").val(),
					caption: $(this).children("input.album-title").val()
				});
			});
			$(".album-list-image").prev(".album_json_data").val(JSON.stringify(albums));
		}
	});
});
/*-------------------------------------------------------------------*/
$(function () {
	if ($(".jquery_date").length > 0) {
		$('.jquery_date').each(function () {
			$(".jquery_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy/mm/dd" });
		});
	}
	if ($(".jquery_datetime").length > 0) {
		$('.jquery_datetime').each(function () {
			$(".jquery_datetime").datetimepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", timeFormat: "HH:mm:ss" });
		});
	}
});

/*-------------------------------------------------------------------*/
function check_disable(obj, a) {
	$value = obj.value;
	name_post = 'field-name-post-type' + a;
	name_taxonomy = 'field-name-taxonomy-type' + a;
	if (($value == '5') || ($value == '8')) {
		if ($value == '5') {
			document.getElementById('field-name-post-type' + a).name = name_post;
		}
		else {
			document.getElementById('field-name-post-type' + a).name = name_taxonomy;
		}
		document.getElementById('field-name-post-type' + a).removeAttribute('disabled');
		document.getElementById('field-name-post-type' + a).focus();

	}

	else {
		document.getElementById('field-name-post-type' + a).value = "";
		document.getElementById('field-name-post-type' + a).setAttribute('disabled', 'disabled');
	}
	//alert('field-name-post-type'+a);
}

/*
function delete_img_upload($a,$key,$postid,$url_plugin)
{
url = $url_plugin+'post-delete-img.php';
jQuery(document).ready(function($) 

	{		
		$('.delete'+$a).click(function () {
			$.post('', {
				//a: $(this).find('input.post_id6').attr('value')
			}, function(data) {
				//var content = $( data ).find( '#content_delete' );
				var content='<input type="hidden" name="delete-'+$key+'" value="'+$key+'" />';
				//$( "#title_upload_ajax" ).empty().append( content);
				$( "#title_upload_ajax"+$a ).empty().append('');
				$( "#img_upload_ajax"+$a ).empty().append(content);
			});
		});

	}
);
}

// Update post meta
function update_post_meta($this, $post_id,$meta_key){
    $($this).children("i")
        .toggleClass("icon-ok")
        .toggleClass("icon-remove")
        .toggleClass("icon-red")
        .toggleClass("icon-green");
    var $meta_value = $($this).attr("rel");
    $.post(ajaxurl,{action:"manager_update_post_meta",post_id:$post_id,meta_key:$meta_key,meta_value:$meta_value},function(rdata){
        if($meta_value=='on'){
            $($this).attr("rel","");
        }else{
            $($this).attr("rel","on");
        }
    },'json');
    return false;
}
*/

jQuery(function ($) { $('.ure-sidebar').remove() })
jQuery(function ($) {
	$.each(['maso', 'ma-so', 'ma-sp', 'masp', 'codeid'], function (index, value) {
		if ($('input[name="' + value + '"]').length) {
			// $('input[name="'+value+'"]').attr('readonly','readonly');
			// return false;
		}
	});
	$('#drop-orders-info').change(function () {
		var color = $('option:selected', this).attr('data-color');
		var id = $(this).attr('data-id');
		var _sOrder = $('option:selected', this).text();
		$('.colorStatus').css('background-color', '#' + color);
		$.post(
			ajaxurl,
			{
				'action': 'update_orders_status', cl: color, post_id: id, sOrder: _sOrder
			},
			function (response) {
				//$('#my-content-id').show();
			}
		);
	});
});
//---------------------------------------	
jQuery(function ($) {
	$('form#addtag #submit').click(function () { location.reload(); });
	//---------------------------------------
	$('.extraField').click(function () {
		var label = $(this).attr('aria-label');
		var data = $(this).attr('aria-data').replace(/[^a-z0-9\s]/gi, '');
		var _s = $('input[name="' + label + '"]').val();
		if (_s == '') {
			$('input[name="' + label + '"]').val(data);
			drawHtml(label, data);
		}
		else {
			flag = checkBeforeInsertElement(_s, data);
			if (flag == -1) {
				_s = _s + ',' + data;
				$('input[name="' + label + '"]').val(_s);
				drawHtml(label, data);
			}
		}
	});
	//---------------------------------------
});


//---------------------------------------	
function findAndRemove(name, key) {
	var $ = jQuery;
	var obj = JSON.parse('[' + $('#tmp-list-' + name).val() + ']');
	var v = $('#' + name + '-radio-' + key).val();
	$('#' + name + '_box_' + key).fadeOut();

	var arr = [];
	for (var i = 0; i < obj.length; i++) {
		if (obj[i].key != key) {
			arr.push(JSON.stringify(obj[i]));
		}
	}
	$('#tmp-list-' + name).val(arr.join(','));

	var _s = $('input[name="' + name + '"]').val();
	$('#' + name + '-box-' + v).fadeOut().remove();
	var _new = findAndRemoveArray(_s, v);
	$('input[name="' + name + '"]').val(_new);

	var _listItem = $('#tmp-list-' + name).val();
	var _listTotal = $('#total-list-' + name).val();
	var _extra = $('input[name="' + name + '"]').val();
	var _postID = $('#post_ID').val();

	$.post(ajaxurl, { 'action': 'update_list_extra_field', list: _listItem, total: _listTotal, field: name, extra: _extra, post: _postID }, function (response) { });
}
//---------------------------------------
function checkBeforeInsertElement(e, data) {
	var obj = e.split(',');
	for (var i = 0; i < obj.length; i++) {
		if (obj[i] == data) {
			return data;
		}
	}
	return -1;
}
//---------------------------------------
function checkAddElement(e, data, pos) {
	var obj = JSON.parse('[' + e + ']');

	switch (pos) {
		case 'size':
			for (var i = 0; i < obj.length; i++) {
				if (obj[i].size == data) {
					return data;
				}
			}
			return -1;
			break;
		case 'color':
			for (var i = 0; i < obj.length; i++) {
				if (obj[i].color == data) {
					return data;
				}
			}
			return -1;
			break;
	}
}
//---------------------------------------
function findAndRemoveArray(s, key) {
	var $ = jQuery;
	var obj = s.split(',');
	var arr = [];
	for (var i = 0; i < obj.length; i++) {
		if (obj[i] != key) {
			arr.push(obj[i]);
		}
	}
	return arr;
}
//---------------------------------------
function drawHtml(label, data) {
	switch (label) {
		case 'size':
			html = '<div class="size-box" id="size-box-' + data + '">'
			html += '<div align="center" class="bl-size">' + data + '</div>'
			html += '<div align="center" class="minus" onclick=findAndRemoveExtraPost("size","' + data + '")><span class="dashicons dashicons-no-alt"></span></div>'
			html += '</div>';
			$('#' + label + ' .meta-controls').append(html);
			break;
		case 'color':
			html = '<div class="color-box" id="color-box-' + data + '">'
			html += '<div align="center" style="background-color:#' + data + '">&nbsp;</div>'
			html += '<div align="center" class="minus" onclick=findAndRemoveExtraPost("color","' + data + '")><span class="dashicons dashicons-no-alt"></span></div>'
			html += '</div>';
			$('#' + label + ' .meta-controls').append(html);
			break;
	}
}
//---------------------------------------
function findAndRemoveExtraPost(label, data) {
	$('#' + label + '-box-' + data).fadeOut();

	var _s = $('input[name="' + label + '"]').val();
	var _new = findAndRemoveArray(_s, data);
	$('input[name="' + label + '"]').val(_new);
}