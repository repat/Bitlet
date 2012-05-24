var $window = $(window),
	$stickyEl = $('.sticky');

var elTop = $stickyEl.offset().top;
   
$window.scroll(function() {
	var windowTop = $window.scrollTop();
	
	// if above window, move the element down
	if(windowTop > elTop) {
		$stickyEl.offset({top: windowTop});
	}
});
