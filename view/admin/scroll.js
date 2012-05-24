var $window = $(window),
	$stickyEl = $('.rightSideDiv');

var elTop = $stickyEl.offset().top;
   
$window.scroll(function() {
	var windowTop = $window.scrollTop();
	
	// if above window, move the element down
	if(windowTop > elTop) {
		$stickyEl.offset({top: windowTop});
	}
});
