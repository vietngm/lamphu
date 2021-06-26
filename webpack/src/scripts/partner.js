$(".owl-partner").owlCarousel({
	center: false,
	items: 2,
	loop: true,
	margin: 0,
	lazyLoad: true,
	nav: false,
	dots: false,
	responsiveClass: true,
	responsiveRefreshRate: true,
	autoplay: true,
	stagePadding: 0,
	responsive: {
		768: {
			items: 4,
		},
		960: {
			items: 8,
		},
		1200: {
			items: 8,
		},
		1920: {
			items: 8,
		},
	},
});
