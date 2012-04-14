
/* display the loading screen, then go to input page */
function load(page) {
	/* display loading div */
	document.getElementById("loading-bg").style.display = 'block';
	document.getElementById("loading").style.display = 'block';

	/* then load the page */
	if(page != '')
		document.location.href = page;
}

function fade(id) {
	var fade=0;
	var element = document.getElementById(id).style;
	var ms = (element.opacity==0) ? 0 : 1;
	var pace = setInterval(Fade,5);
	
	function Fade() {
		if(fade<100) {
			fade += 1;
			
			if(ms)
				element.filter = "alpha(opacity="+fade+")";
			else 
				element.opacity=(fade/100);

		} else  {
			clearInterval(pace);
		}
	}
}

