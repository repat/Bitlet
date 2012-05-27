$('.teamPics#dave').hover(function() {
	$('.team#dave').addClass('teamHover');
	$('.teamPics#dave').addClass('picsHover');
	$('.team#zach').removeClass('teamHover');
	$('.team#ari').removeClass('teamHover');
	$('.teamPics#zach').removeClass('picsHover');
	$('.teamPics#ari').removeClass('picsHover');
}); 

$('.teamPics#zach').hover(function() {
	$('.team#zach').addClass('teamHover');
	$('.teamPics#zach').addClass('picsHover');
	$('.team#dave').removeClass('teamHover');
	$('.team#ari').removeClass('teamHover');
	$('.teamPics#ari').removeClass('picsHover');
	$('.teamPics#dave').removeClass('picsHover');
}); 

$('.teamPics#ari').hover(function() {
	$('.team#ari').addClass('teamHover');
	$('.teamPics#ari').addClass('picsHover');
	$('.team#zach').removeClass('teamHover');
	$('.team#dave').removeClass('picsHover');
	$('.teamPics#zach').removeClass('picsHover');
	$('.teamPics#dave').removeClass('picsHover');
	
}); 

$('.team#dave').hover(function() {
	$('.team#dave').addClass('teamHover');
	$('.teamPics#dave').addClass('picsHover');
	$('.team#zach').removeClass('teamHover');
	$('.team#ari').removeClass('teamHover');
	$('.teamPics#zach').removeClass('picsHover');
	$('.teamPics#ari').removeClass('picsHover');

}); 


$('.team#zach').hover(function() {
	$('.team#zach').addClass('teamHover');
	$('.teamPics#zach').addClass('picsHover');
	$('.team#dave').removeClass('teamHover');
	$('.team#ari').removeClass('teamHover');
	$('.teamPics#ari').removeClass('picsHover');
	$('.teamPics#dave').removeClass('picsHover');
}); 

$('.team#ari').hover(function() {
	$('.team#ari').addClass('teamHover');
	$('.teamPics#ari').addClass('picsHover');
	$('.team#zach').removeClass('teamHover');
	$('.team#dave').removeClass('picsHover');
	$('.teamPics#zach').removeClass('picsHover');
	$('.teamPics#dave').removeClass('picsHover');
	
}); 

$('.teamPics#dave').tooltip();