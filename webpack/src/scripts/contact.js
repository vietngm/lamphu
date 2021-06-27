$('input[name="sendmail"]').click(function (event) {
	var form = $("#contactForm");
	if (form[0].checkValidity() === false) {
		event.preventDefault();
		event.stopPropagation();
		form.addClass("was-validated");
		return false;
	}

	form.submit(function () {
		$("#messageDialog").modal("show");
		var username = $("#fullname").val();
		var m = $("#message").val();
		var address = $("#address").val();
		var p = $("#phonenumber").val();
		var email = $("#mailaddress").val();
		var data = {
			action: "sendmailContact",
			user: username,
			mail: email,
			add: address,
			phone: p,
			message: m,
		};
		$.post(ajaxurl, data, function (rdata) {
			$("#messageDialog").empty();
			$("#messageDialog").modal("show").html(rdata);
		});
		return false;
	});
});
