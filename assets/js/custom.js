(function () {
	"use strict";

	var carousels = function () {
		$(".owl-carousel1").owlCarousel({
			loop: true,
			center: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				680: {
					items: 2,
					nav: false,
					loop: false
				},
				1000: {
					items: 3,
					nav: true
				}
			}
		});
	};

	(function ($) {
		carousels();
	})(jQuery);
})();

// $(document).ready(function () {
// 	$(function () {
// 		$("#playlist li").on("click", function () {
// 			$("#videoarea").attr({
// 				src: $(this).attr("movieurl"),
// 			});
// 		});
// 		$("#videoarea").attr({
// 			src: $("#playlist li").eq(0).attr("movieurl"),
// 		});
// 	});
// });
