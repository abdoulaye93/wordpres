/*
Theme Name: xPerson
Author: SketchThemes
Author URL: https://sketchthemes.com/
*/

/*
	= Preloader
	= Animated scrolling / Scroll Up
	= Full Screen Slider
	= Sticky Menu
	= Back To Top
	= Countup
	= Progress Bar
	= More skill
	= Shuffle
	= Magnific Popup
	= Vidio auto play
	= Fit Vids

*/

(function($){
	'use strict';

	/* ---------------------------------------------- /*
	 * Preloader
	/* ---------------------------------------------- */
	$(window).ready(function() {
		$('#pre-status').fadeOut();
		$('#tt-preloader').delay(350).fadeOut('slow');
	});

	$(document).ready(function() {
		/* ---------------------------------------------- /*
		 * Mouse Icon
		/* ---------------------------------------------- */
		(function () {
			$('.mouse-icon').bind("click", function(e){
				$('html, body').stop().animate({
					scrollTop: $('#undefined-sticky-wrapper').offset().top
				}, 1000);
				e.preventDefault();
			});
		}());

		// -------------------------------------------------------------
		// Animated scrolling / Scroll Up
		// -------------------------------------------------------------
		(function () {
			$('a[href*=\\#]:not([href=\\#])').bind("click", function(e){
				var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top
				}, 1000);
				e.preventDefault();
			});
		}());

		// -------------------------------------------------------------
		// Full Screen Slider
		// -------------------------------------------------------------
		(function () {
			$(".tt-fullHeight").height($(window).height());

			$(window).resize(function(){
				$(".tt-fullHeight").height($(window).height());
			});
		}());

		// -------------------------------------------------------------
		// Sticky Menu
		// -------------------------------------------------------------
		(function () {
			$('.header').sticky({
				topSpacing: 0
			});

			$('body').scrollspy({
				target: '.navbar-custom',
				offset: 70
			})
		}());

		// -------------------------------------------------------------
		// Sub Menu
		// -------------------------------------------------------------
		(function () {
			$('#menu .sub-menu, #menu ul.children').addClass('dropdown-menu');
			$('#menu .sub-menu, #menu ul.children').parent().append('<span class="has-dropdown-menu"><i class="fa fa-caret-down"></i></span>');
		}());

		// -------------------------------------------------------------
		// WOW JS
		// -------------------------------------------------------------
		(function () {
			new WOW({
				mobile:  false
			}).init();
		}());

	});

	// -------------------------------------------------------------
	// Back To Top
	// -------------------------------------------------------------
	(function () {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('.scroll-up').fadeIn();
			} else {
				$('.scroll-up').fadeOut();
			}
		});
	}());

})(jQuery);