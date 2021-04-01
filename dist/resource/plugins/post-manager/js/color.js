jQuery(function($){
//---------------------------------------	
$(".add-color").click(function(){
	var _color = $('#txt-add-color').val();
	var _arrcolor = $('#tmp-list-color').val();
	flag=checkAddElement(_arrcolor,_color,'color');
	if(flag==-1 && _color!=''){
	cl = _color.replace('#','');	
	num = parseInt($('#total-list-color').val())+1;
	html='<div class="color-box" id="color_box_'+num+'">'
	html+='<input type="radio" name="color-radio" id="color-radio-'+num+'" class="radio"  value="'+cl+'" />'
	html+='<label for="color-radio-'+num+'" style="background-color:'+_color+'" class="extraField" aria-label="color" aria-data="'+cl+'">&nbsp;</label>'	
	html+='<div align="center" class="minus" onclick=findAndRemove("color",'+num+')><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	
	$('#total-list-color').val(num);
	var _key='{'
		_key+='"key":"'+num+'",'
		_key+='"color":"'+_color+'"'
		_key+='}';
	if(_arrcolor=='')
	$('#tmp-list-color').val(_key);
	else{$('#tmp-list-color').val(_arrcolor+','+_key);}
	$('#show-list-color').append(html);
	$('#txt-add-color').val('');
	var _listColor = $('#tmp-list-color').val();
	var _listTotal = $('#total-list-color').val();
	$.post(ajaxurl,{'action': 'update_list_extra_field',list:_listColor,total:_listTotal,field:'color'},function(response){});
	}
});
//---------------------------------------
$('.my-color-picker').wpColorPicker({
defaultColor: true,
change: function(event, ui){},
clear: function() {},
hide: true,
palettes: true
});
//---------------------------------------	
});