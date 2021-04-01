var file_frame;
//var dem=0;
var id;
jQuery(function ($) {
	$('.thumbtax').click(function (event) {
		event.preventDefault();
		id = $(this).attr('rel');

		if ($('#thumb_' + id + ' .dashicons').hasClass('dashicons-minus')) {
			$('#thumb_' + id + ' .dashicons').removeClass('dashicons-minus').addClass('dashicons-plus');
			$('#thumb_' + id + ' img').attr('src', '');
			$.post(
				ajaxurl,
				{
					'action': 'update_thumb_tax', term: id, media_id: ''
				},
				function (response) {
				});
			return false;
		}

		if (file_frame) { file_frame.open(); return; }
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery(this).data('uploader_title'),
			button: { text: jQuery(this).data('uploader_button_text'), },
			multiple: false  // Set to true to allow multiple files to be selected
		});

		file_frame.on('select', function () {
			var selection = file_frame.state().get('selection').first().toJSON();
			$('#thumb_' + id + ' .dashicons').removeClass('dashicons-plus').addClass('dashicons-minus');
			$('#thumb_' + id + ' img').attr('src', selection.url);

			$.post(
				ajaxurl,
				{
					'action': 'update_thumb_tax', term: id, media_id: selection.id
				},
				function (response) {
					//alert('The server responded: ' + response);
					$('#my-content-id').show();
				}
			);

		});

		// Finally, open the modal
		file_frame.open();
	});
});