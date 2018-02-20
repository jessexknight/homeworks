(function($) {
	"use strict"

	///////////////////////////
	// Btn nav collapse
	$('#nav .nav-collapse').on('click', function() {
		$('#nav').toggleClass('open');
	});

  ///////////////////////////
	// Mobile-friendly double-click events
  function doubleclick(selector,toggleClass) {
    $(document).click(function(e) {
      if ($(e.target).closest(selector).length) {
        var t = $($(e.target).closest(selector)[0])
        if (t.hasClass(toggleClass)) {
          $(selector).removeClass(toggleClass);
        } else {
          e.preventDefault();
          $(selector).removeClass(toggleClass);
          t.addClass(toggleClass);
        }
      } else {
        $(selector).removeClass(toggleClass);
      }
    });
  }
  $(window).on('load', function() {
    doubleclick('.has-dropdown','open-drop');
    doubleclick('.work','clicked');
  });

	///////////////////////////
	// On Scroll
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();
		wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');
	});

})(jQuery);
