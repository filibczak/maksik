/*
||
||	autor: Krzysztof Kukiz (Qkiz)
||
||	HTML code: <div id="loading"><script src="http://qkiz404.pl/script/loading.js"></script></div>
||	or if you don't use jQuery jet:
||	<div id="loading"><script src="http://qkiz404.pl/script/jq.js"></script><script src="http://qkiz404.pl/script/loading.js"></script></div>
||
*/

// You can edit:
	var timeAnime = 850;
	var bok = 15;
	var space = 10;
	
// Don't tuch!
	var height = 2*bok + space;
	var bokSpace = bok + space;



$(function(){
	
	stwHTML();
	animujLoad();
	
});

function stwHTML()
{
	var kodHTML = '';
	
	for(i = 0; i < 4; i++)
	{
		kodHTML += '<div id="load_' + i + '" class="load"></div>';
	}
	
	$('#loading').html(kodHTML);
	
	stylujBloki();
}

function stylujBloki()
{
	$('.load').css({
		'position':'absolute',
		'width': bok,
		'height': bok,
		'background-color':'rgba(93, 145, 102, 1)',
		'box-shadow':'0 0 1px 0px grey'
	});
	
	$('#load_0').css({
		'top': bokSpace + 'px',
		'left':'0'
	});
	$('#load_1').css({
		'top': bokSpace + 'px',
		'left': bokSpace + 'px'
	});
	$('#load_2').css({
		'top':'0',
		'left': bokSpace + 'px'
	});
	$('#load_3').css({
		'top':'0',
		'left':'0'
	});
	
	$('#loading').css({
		'position':'absolute',
		'top':'calc(100%/2 - ' + height + 'px' + '/2)',
		'left':'calc(100%/2 - ' + height + 'px' + '/2)'
	});
}


function animujLoad(){
	
	blok_0();
	blok_1();
	blok_2();
	blok_3();
	
}

function blok_0()
{
	$('#load_0').stop().animate({top: 0,left: 0},timeAnime, function(){
		$(this).stop().animate({top:0,left:bokSpace},timeAnime, function(){
			$(this).stop().animate({top:bokSpace,left:bokSpace},timeAnime, function(){
				$(this).stop().animate({top:bokSpace,left:0},timeAnime, function(){
					blok_0();
				});
			});	
		});	
	});
}

function blok_1()
{
	$('#load_1').stop().animate({top: bokSpace,left: 0},timeAnime, function(){
		$(this).stop().animate({top:0,left:0},timeAnime, function(){
			$(this).stop().animate({top:0,left:bokSpace},timeAnime, function(){
				$(this).stop().animate({top:bokSpace,left:bokSpace},timeAnime, function(){
					blok_1();
				});
			});	
		});	
	});
}

function blok_2()
{
	$('#load_2').stop().animate({top: bokSpace,left: bokSpace},timeAnime, function(){
		$(this).stop().animate({top:bokSpace,left:0},timeAnime, function(){
			$(this).stop().animate({top:0,left:0},timeAnime, function(){
				$(this).stop().animate({top:0,left:bokSpace},timeAnime, function(){
					blok_2();
				});
			});	
		});	
	});
}

function blok_3()
{
	$('#load_3').stop().animate({top: 0,left: bokSpace},timeAnime, function(){
		$(this).stop().animate({top:bokSpace,left:bokSpace},timeAnime, function(){
			$(this).stop().animate({top:bokSpace,left:0},timeAnime, function(){
				$(this).stop().animate({top:0,left:0},timeAnime, function(){
					blok_3();
				});
			});	
		});	
	});
}