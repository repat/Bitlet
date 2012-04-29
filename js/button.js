var Button = function(paper, image, x, y, radius, callback) {

	var defaultColor = "#fff";
	var hoverColor = "#A4BCC2";
	
	var selectedColor = "#A4BCC2";
	var selectedHoverColor = "#E8F3F8";
	
	var opacityDefault = 0.5;
	var opacityHover = 1;
	var selected = false;
	
	var circle2 = paper.circle(x+(0.5*2*radius), y+(0.5*2*radius), radius).attr({fill:defaultColor, opacity:opacityDefault });
	var C = paper.image(image, x+(0.5*radius), y+(0.5*radius), radius, radius);
	circle2.mouseover( function () {
		if(selected) {
			circle2.animate ({fill:selectedHoverColor, r:radius*1.1, opacity:opacityHover}, 300, "bounce"); 
		} else {
			circle2.animate ({fill:hoverColor, r:radius*1.1, opacity:opacityHover}, 300, "bounce"); 
		}
	}).mouseout( function () {
		if(selected) {
			circle2.stop().animate ({fill:selectedHoverColor, r:radius, opacity:opacityDefault}, 300); 
		} else {
			circle2.stop().animate ({fill:defaultColor, r:radius, opacity:opacityDefault}, 300); 
		}
	}).click ( function () {
		selected = true;
		circle2.attr({fill:hoverColor, opacity:opacityHover });
		callback();
	});
		
	C.mouseover( function () {
		if(selected) {
			circle2.animate ({fill:selectedHoverColor, r:radius*1.1, opacity:opacityHover}, 300, "bounce"); 
		} else {
			circle2.animate ({fill:hoverColor, r:radius*1.1, opacity:opacityHover}, 300, "bounce"); 
		} 
	}).mouseout( function () {
			if(selected) {
			circle2.stop().animate ({fill:selectedHoverColor, r:radius, opacity:opacityDefault}, 300); 
		} else {
			circle2.stop().animate ({fill:defaultColor, r:radius, opacity:opacityDefault}, 300); 
		} 
	});	
	C.click( function () {
		selected = true;
		circle2.attr({fill:hoverColor, opacity:opacityDefault });
		callback();
	});	
};

window.onload = function () {
	var R = Raphael("theButtons", 560, 60); 
	
	var music = new Button(R, "img/buttons/ButtonMusic.png", 10, 10, 20, 
	function(){
		$('.carousel').carousel(0);
		doc.selected = false;
		photo.selected = false;
		art.selected = false;
		vid.selected = false;
		generic.selected = false;
	});
	
	var doc = new Button(R, "img/buttons/ButtonDoc.png", 100, 10, 20, 
	function(){
		$('.carousel').carousel(1);
	});
	
	var photo = new Button(R, "img/buttons/ButtonCamera.png", 200, 10, 20,
	function(){
		$('.carousel').carousel(2);
	});
	
	var art = new Button(R, "img/buttons/art.png", 300, 10, 20, 
	function(){
		$('.carousel').carousel(3);
	});
	
	var vid = new Button(R, "img/buttons/ButtonVideoCam.png", 400, 10, 20,
	function(){
		$('.carousel').carousel(4);
	});
	
	var generic = new Button(R, "img/buttons/book.png", 500, 10, 20,
	function(){
		$('.carousel').carousel(5);
	});
	
	$('.carousel').carousel("pause");
	 
};
