var App = App || {};

(function ($) {
	
	"use strict";
	
	App.init = function () {
		this.setupSlideshow();
	};
	
	App.setupSlideshow = function () {
		var $slider = $(".slider > div"),
			$images = $slider.find("img");
		
		// setup fade in
		$images.css({"opacity": 0});
		
		$slider.bxSlider({
			mode: "fade",
			pager: false,
			onSliderLoad: function () {
				$images.animate({
					opacity: 1
				}, 250);
			}
		});
	}
	
	App.init();
	
})(jQuery);