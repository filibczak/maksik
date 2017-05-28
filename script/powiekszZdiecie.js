var timeAnime4 = 300;

var	width1 = 600;
var	height1 = 305;

function pokazZdiecie()
{
	$('#wyswietlZadanie, #goFullScrean, #cien')
	.mouseenter(function(){
		//alert(15);
		$('#wyswietlZadanie img').stop().animate({
			top: -15,
			left: -25,
			height: height1+30,
			width: width1+50
		},timeAnime4);
	})
	.mouseleave(function(){
		$('#wyswietlZadanie img').stop().animate({
			top: 0,
			left: 0,
			height: height1,
			width: width1
		},timeAnime4);
	});
}