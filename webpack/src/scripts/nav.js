$(".hamburger").click(function () {
	$(this).toggleClass("active");
	if ($(this).hasClass("active")) {
		$(".mask").toggleClass("active");
		$("body").toggleClass("active");
		var navbar = $(".navbar-wrap");
		window.setTimeout(function () {
			navbar.toggleClass("open");
		}, 300);
	} else {
		$(".navbar-wrap").removeClass("open");
		$("body").removeClass("active");
		var mask = $(".mask");
		window.setTimeout(function () {
			mask.removeClass("active");
		}, 300);
	}

	return false;
});
/*-----------------------------------------------*/
function isTouchDevice() {
	return (
		true ==
		("ontouchstart" in window ||
			(window.DocumentTouch && document instanceof DocumentTouch))
	);
}
/*-----------------------------------------------*/
if (isTouchDevice() === true) {
	$(".js-main-link").click(function () {
		$(".sub-wrap").toggleClass("active");
		$(".arrow").toggleClass("active");
		return false;
	});
}
if (isTouchDevice() === false) {
	$(".main-item.san-pham").mouseover(function () {
		$("body").addClass("active");
	});
	$(".main-item.san-pham").mouseout(function () {
		$("body").removeClass("active");
	});
}

