
window.onload = function () {
	// declare datastructures
	var Images = [
		"img/buttons/music.png",
		"img/buttons/file.png",
		"img/buttons/camera.png",
		"img/buttons/art.png",
		"img/buttons/video.png",
		"img/buttons/book.png",
	];
	
	// raphael canvas
	var paper = Raphael("theButtons", 560, 60); 	
	// array to store all the buttons
	var buttons = new Array(6);
	// current slider position
	var cur_pos = 0;
	// store if the slide action was a click
	var click = false;

	for(var i = 0; i < 6; i++) {
		buttons[i] = new Button(paper, Images[i], 100*i+10, 10, 20, 
			(function(sel) {
				for(var j = 0; j < 6; j++) {
					if(j != sel) {buttons[j].Unselect();};
				}
				cur_pos = sel;
				click = true;
				$('.carousel').carousel(sel);
			}).bind(this, i));
	}
	buttons[cur_pos].Select();
	
	// we do want to auto spin
	$('.carousel').carousel({
		interval: 6000,
		pause: 'hover'
	})

	$('.carousel').bind('slide', (function() {
		if(click) {
			click = false;
		} else {
			cur_pos = (cur_pos < 5) ? cur_pos + 1 : 0;
			for(var j = 0; j < 6; j++) {
				buttons[j].Unselect();
			}
			buttons[cur_pos].Select();
		}
	}).bind(this));
};

