(function($) {
	"use strict"

	///////////////////////////
	// Btn nav collapse
	$('#nav .nav-collapse').on('click', function() {
		$('#nav').toggleClass('open');
	});

	///////////////////////////
	// Mobile dropdown
  $('.has-dropdown').children('a').on('click', function(e) {
		$(this).parent().toggleClass('open-drop');
    if ($(this).parent().hasClass('open-drop') && $(window).width() < 767) {
      e.preventDefault();
    };
	});

	///////////////////////////
	// On Scroll
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();
		wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');
	});

})(jQuery);
