var $window = $(window);
var $stickyEl = $('.sticky-div');
var elTop = $stickyEl.offset().top;

$window.scroll(function() {
	var windowTop = $window.scrollTop();
	
	// if above window, move the element down
	$stickyEl.toggleClass('sticky', windowTop > elTop);
});
