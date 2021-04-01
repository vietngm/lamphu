jQuery(function($){
//---------------------------------------	
$(".add-size").click(function(){
	var _size = $('#txt-add-size').val();
	var _arrsize = $('#tmp-list-size').val();	
	flag=checkAddElement(_arrsize,_size,'size');	
	if(flag==-1 && _size!=''){
	num = parseInt($('#total-list-size').val())+1;
	html='<div class="size-box" id="size_box_'+num+'">'
	html+='<input type="radio" name="size-radio" id="size-radio-'+num+'" class="radio" value="'+_size+'" />'
	html+='<label for="size-radio-'+num+'" class="extraField" aria-label="size" aria-data="'+_size+'">'+_size+'</label>'	
	html+='<div align="center" class="minus" onclick=findAndRemove("size",'+num+')><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	
	$('#total-list-size').val(num);
	var _key = '{'
		_key+='"key":"'+num+'",'
		_key+='"size":"'+_size+'"'
		_key+='}';
	if(_arrsize=='')
	$('#tmp-list-size').val(_key);
	else{$('#tmp-list-size').val(_arrsize+','+_key);}
	$('#show-list-size').append(html);
	$('#txt-add-size').val('');
	
	var _listSize = $('#tmp-list-size').val();
	var _listTotal = $('#total-list-size').val();
	$.post(ajaxurl,{'action': 'update_list_extra_field',list:_listSize,total:_listTotal,field:'size'},function(response){});
	}
	
});
//---------------------------------------
});