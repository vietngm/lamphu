<?php
$pages = get_pages(); 	
foreach($pages as $page){
	?>			
	<script language="javascript">
	jQuery(function($){					
		//$('th#col_visible').css('display','none');		
		var checkbox = $('#<?php echo 'post-'.$page->ID; ?> td').find("input:checkbox");				
		if (checkbox.attr('checked')) {			
		  	$('#<?php echo 'post-'.$page->ID; ?>').remove();
			$('#<?php echo 'post-'.$page->ID; ?>').remove();
			$('#col_visible').parent().remove();
			$('.column-col_visible').css('display','none');
			$('.subsubsub').remove();			
		}
		else{$('.col_visible').css('display','none');}
	})
	</script>
	<?php
}
?>

<script language="javascript">
// jQuery(function($){     
// 	$("input[name='slug']").parent().parent('.form-field').remove();
// 	$("input[name='slug']").parent('.form-field').remove();
// });
</script>