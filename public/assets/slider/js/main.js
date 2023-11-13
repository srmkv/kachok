(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.featured-carousel').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:30,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'><i class='fa fa-chevron-left' aria-hidden='true'></i></span>","<span class='ion-ios-arrow-forward'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:2
	      },
	      1000:{
	        items:3
	      }
	    }
		});
		$('.featured-carousel2').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:30,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'><i class='fa fa-chevron-left' aria-hidden='true'></i></span>","<span class='ion-ios-arrow-forward'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:2
	      }
	    }
		});

	};

	carousel();

})(jQuery);

