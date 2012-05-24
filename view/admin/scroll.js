
 var $window = $(window),
       $stickyEl = $('.rightSideDiv');
 var elTop = $stickyEl.offset().top;
       
   $window.scroll(function() {
        var windowTop = $window.scrollTop();

        $stickyEl.toggleClass('sticky', windowTop > elTop);
    });