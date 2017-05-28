$(function(){
	animujTlo();
	setTimeout('animujText()',500);
	setTimeout('animujWesolychSwiat()', 17000);
	niebiosa();
})
function animujText()
{
	$('#logo_1').animate({height: 160, left: 10, top: 10}, 2000);
	
	setTimeout(function(){
		$('#autor').animate({opacity: 1},1000);
	}, 2000);
	
	setTimeout(function(){
		$('#zyczenia_1').animate({opacity: 1}, 1500);
		setTimeout(function(){
			$('#zyczenia_1').animate({opacity: 0}, 1500);
		}, 3000);
	}, 2000);
	
	setTimeout(function(){
		$('#zyczenia_2').animate({opacity: 1}, 1500);
		setTimeout(function(){
			$('#zyczenia_2').animate({opacity: 0}, 1500);
		}, 3000);
	}, 6500);
	
	setTimeout(function(){
		$('#zyczenia_3').animate({opacity: 1}, 1500);
		setTimeout(function(){
			$('#zyczenia_3').animate({opacity: 0}, 1500);
		}, 3000);
	}, 11000);
	
	setTimeout(function(){
		$('#zyczenia_4').animate({opacity: 1}, 1500);
	}, 15500);
	
}
function animujWesolychSwiat()
{
	$('#zyczenia_4').stop()
		.css('opacity','1')
		.animate({textIndent: 30},400)
		.animate({textIndent: -30},400)
		.animate({textIndent: 0},400);
	setTimeout('animujWesolychSwiat()', 4000);
}
function animujTlo()
{
	//skaczący zając
	setTimeout(function(){
		$('#zajacSkacz1').css('left','-250px').animate({left:1000},6500);
	},2250);
	setTimeout(function(){
		$('#zajacSkacz2').css('right','-250px').animate({right:1000},7000);
	},7000);
	setTimeout(function(){
		$('#zajac').css('bottom','-200px').animate({bottom: 30},5000);	
	},14000)
}
function niebiosa()
{
	$('#chmurka').css({'right': '-200px'},25000).stop().animate({right: 850},25000);
	setTimeout('niebiosa()',25000);
}