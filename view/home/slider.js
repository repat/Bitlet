
window.onload = function () {
	// declare datastructures
	var Images = [
		"img/buttons/ButtonMusic.png",
		"img/buttons/ButtonDoc.png",
		"img/buttons/ButtonCamera.png",
		"img/buttons/art.png",
		"img/buttons/ButtonVideoCam.png",
		"img/buttons/book.png",
	];
	
	// raphael canvas
	var paper = Raphael("theButtons", 560, 60); 	
	// array to store all the buttons
	var buttons = new Array(6);

	for(var i = 0; i < 6; i++) {
		buttons[i] = new Button(paper, Images[i], 100*i+10, 10, 20, 
			(function(sel) {
				for(var j = 0; j < 6; j++) {
					if(j != sel) {buttons[j].Unselect();};
				}
				$('.carousel').carousel(sel);
			}).bind(this, i));
	}
	
	$('.carousel').carousel("pause");
};

