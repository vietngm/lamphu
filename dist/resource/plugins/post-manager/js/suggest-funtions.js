// JavaScript Document
jQuery(function($){	
	var num_gallery=0;
	$(".dataTable tbody tr").live('click',function(e){		
		var data = $(this).find($('td .dashicons')).attr('data-id');
		flag = checkAddElementPostID($('#suggestion-attach-id').val(),data,'postId');
		if(flag==-1){
		//---------------------------------------	
		num_gallery = parseInt($('#total-suggestion-id').val())+1;
		var str = $('#suggestion-attach-id').val();
		var _key = '{"key":"'+num_gallery+'","postId":"'+data+'"}';		
		//---------------------------------------			
		if(str=='')
		$('#suggestion-attach-id').val(_key);
		else		
		$('#suggestion-attach-id').val(str+','+_key);
		$('#total-suggestion-id').val(num_gallery);
		}
	});
	//---------------------------------------	
});

//---------------------------------------
function checkAddElementPostID(e,data,pos){	
	var obj = JSON.parse('['+e+']');
	
	switch(pos){
	case 'postId':
	for(var i = 0; i < obj.length; i++){
		if(obj[i].postId==data){
			return data;
		}
	}
	return -1;	
	break;
	}
}

//---------------------------------------	
function findAndRemovePostID(key) {
	var $=jQuery;
	var obj = JSON.parse('['+$('#suggestion-attach-id').val()+']');		
	$('#id_suggestion_'+key).fadeOut();
	
	var arr = [];
	for(var i = 0; i < obj.length; i++){
		if(obj[i].key!=key){
			arr.push(JSON.stringify(obj[i]));
		}
	}
	$('#suggestion-attach-id').val(arr.join(','));
}