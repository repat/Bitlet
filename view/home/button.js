var Button = function(paper, image, x, y, radius, callback) 
{
	this.defaultColor = "#fff";
	this.hoverColor = "#1972EA";
	
	this.selectedColor = "#1972EA";
	this.selectedHoverColor = "#1972EA";
	
	this.opacityDefault = 0.5;
	this.opacityHover = 0.6;
	this.selected = false;
	this.radius = radius;

	this.callback = callback;
	
	this.circle2 = paper.circle(x+(0.5*2*radius), y+(0.5*2*radius), radius)
		.attr({fill:this.defaultColor, opacity:this.opacityDefault});
	this.img = paper.image(image, x+(0.5*radius), y+(0.5*radius), radius, radius);

	this.circle2.mouseover(this.MouseOver.bind(this))
		.mouseout(this.MouseOut.bind(this))
		.click(this.Click.bind(this));
		
	this.img.mouseover(this.MouseOver.bind(this))
		.mouseout(this.MouseOut.bind(this))
		.click(this.Click.bind(this));
};

Button.prototype.MouseOver = function()
{
	if(this.selected) {
		this.circle2.animate({fill:this.selectedHoverColor, r:this.radius*1.1, opacity:this.opacityHover}, 300); 
	} else {
		this.circle2.animate({fill:this.hoverColor, r:this.radius*1.1, opacity:this.opacityHover}, 300); 
	} 
};

Button.prototype.MouseOut = function()
{
	if(this.selected) {
		this.circle2.stop()
			.animate({fill:this.selectedHoverColor, r:this.radius, opacity:this.opacityDefault}, 300); 
	} else {
		this.circle2.stop()
			.animate({fill:this.defaultColor, r:this.radius, opacity:this.opacityDefault}, 300); 
	} 
};

Button.prototype.Select = function()
{
	this.selected = true;
	this.circle2.stop().attr({fill:this.hoverColor, opacity:this.opacityDefault});
};

Button.prototype.Click = function()
{
	this.callback();
	this.Select();
};

Button.prototype.Unselect = function()
{
	this.selected = false;
	this.circle2.stop().animate({fill:this.defaultColor, r:this.radius, opacity:this.opacityDefault}, 300); 
};

