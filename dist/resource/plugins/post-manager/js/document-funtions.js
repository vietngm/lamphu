// JavaScript Document
// Uploading files
var file_frame;
jQuery('.add_more_document').live('click', function( event ){
  event.preventDefault();  
  if ( file_frame ) {
	file_frame.open();	  
	return;
  }
  file_frame = wp.media.frames.file_frame = wp.media({
	title: jQuery( this ).data( 'uploader_title' ),
	button: {
	  text: jQuery( this ).data( 'uploader_button_text' ),
	},
	multiple: true  // Set to true to allow multiple files to be selected
  });  
  // When an image is selected, run a callback.
  file_frame.on( 'select', function() {
	var selection = file_frame.state().get('selection');
	var total_id=parseInt($('#total-document-id').val());
	var d=1;	
	selection.map( function( attachment ) {
	  	attachment = attachment.toJSON();
	  	key_init = total_id+d;
		var str = $('#document-thumb-id').val();
		var _key = '{"key":"'+key_init+'","attach_id":"'+attachment.id+'","doc_name":"","doc_source":"","doc_description":""}';
		if(str=='')
		$('#document-thumb-id').val(_key);
		else		
		$('#document-thumb-id').val(str+','+_key);		
		var html = html_document_v2(key_init,attachment.id,attachment.title);
		$('#list-document-box ul.attachments').append(html); 
	  	//---------------------------------------
	  	d++;	
	});		
	
	var s_length = parseInt(selection.length);
	$('#total-document-id').val(total_id+s_length);
  });
  file_frame.open();
});

//Functions------------------------------

function html_document(num){	
html='<div class="bldoc" id="id_document_'+num+'">'
html+='<div class="dash"><span class="dashicons dashicons-format-aside"></span></div>'
html+='<div class="detail">'

html+='<div>'
html+='<div class="label">Tài liệu:</div>'
html+='<div class="form-control">'
html+='<input type="text" id="doc_name_'+num+'" value="" onkeyup=setValue("name",'+num+') placeholder="Tên tài liệu" />'
html+='</div>'
html+='</div>'

html+='<div>'
html+='<div class="label">Nguồn:</div>'
html+='<div class="form-control">'
html+='<input type="text" id="doc_source_'+num+'" placeholder="Nguồn" onkeyup=setValue("source",'+num+') />'
html+='</div>'
html+='</div>'

html+='<div>'
html+='<div class="label">Mô tả:</div>'
html+='<div class="form-control">'
html+='<textarea id="doc_description_'+num+'" placeholder="Mô tả" onkeyup=setValue("description",'+num+')></textarea>'
html+='</div>'
html+='</div>'

html+='</div>'
html+='<div class="del_postdoc" onclick="findAndRemoveDoc('+num+')">'
html+='<a onclick="return false" href=""><span class="dashicons dashicons-no-alt"></span></a>'
html+='</div>'
html+='</div>'
return html;
}
//---------------------------------------	
function html_document_v2(num,attID,title){
var url = window.location.protocol+'//'+window.location.host+'/suanha/';
html='<li aria-label="'+title+'" data-id="'+attID+'" class="attachment" id="id_document_'+num+'">'
html+='<div class="attachment-preview">'
html+='<div class="thumbnail">'
html+='<div class="centered"><img src="'+url+'wp-includes/images/media/document.png" class="icon" draggable="false" alt=""></div>'
html+='<div class="filename"><div>'+title+'</div></div>'
html+='</div>'
html+='<div class="del_postdoc" onclick="findAndRemoveDoc('+num+')">'
html+='<a onclick="return false" href=""><span class="dashicons dashicons-no-alt"></span></a>'
html+='</div>'
html+='</div>'
html+='</li>'
return html;
}
//---------------------------------------	
function findAndRemoveDoc(key) {
	var $=jQuery;
	var obj = JSON.parse('['+$('#document-thumb-id').val()+']');		
	$('#id_document_'+key).fadeOut();
	
	var arr = [];
	for(var i = 0; i < obj.length; i++){
		if(obj[i].key!=key){
			arr.push(JSON.stringify(obj[i]));
		}
	}
	$('#document-thumb-id').val(arr.join(','));
}
//---------------------------------------	
function setValue(pos,id){
	var $=jQuery;
	var obj = JSON.parse('['+$('#document-thumb-id').val()+']');
	var arr = [];
	for(var i = 0; i < obj.length; i++){
		if(obj[i].key==id){
			switch(pos){
				case 'name':
				obj[i].doc_name= $('#doc_name_'+id).val();
				break;
				case 'source':
				obj[i].doc_source= $('#doc_source_'+id).val();
				break;
				case 'description':
				obj[i].doc_description= $('#doc_description_'+id).val();
				break;																								
			}
		}
		arr.push(JSON.stringify(obj[i]));		
	};
	$('#document-thumb-id').val(arr.join(','));
}