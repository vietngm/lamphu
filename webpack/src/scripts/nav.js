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


$('.js-list-link').click(function () {
	$(this).find('.arrow-plus').toggleClass('active');
	$_sub_list_cat = $(this).parent('.list-item').find('.sub-list-cat');
	$_sub_list_cat.slideToggle();
	return false;
});
// $('.js-main-link').click(function () {
// 	$_this = $(this);
// 	$_sub_list = $_this.parent('.main-item').find('.sub-list');
// 	$_size = $_sub_list.size();
// 	$_sub_list.toggleClass('active');
// 	$_this.toggleClass('active');
// 	return false;
// });
// $('.js-sub-list-link').click(function () {
// 	$_this = $(this);
// 	$_sub_list = $_this.parent('.sub-list-item').find('.children');
// 	$_size = $_sub_list.size();
// 	$_sub_list.toggleClass('active');
// 	$_this.parent('.sub-list-item').toggleClass('active');
// 	return false;
// });