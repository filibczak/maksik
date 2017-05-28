var timeAnime2 = 400;
var timeAnime3 = 100;

function pokazZad()
{
	//$('#wyswietlZadanie').fadeO
	$('.listZad').children('li').click(function(){
		var src_zad = $(this).attr('data-src');
		var link_zad = $(this).attr('data-link');
		
		//chowa już istniejące zdięcie
		$('#wyswietlZadanie').stop().fadeOut(timeAnime2);
		
		//pokazuje kliknięte zdięcie
		setTimeout(function(){
			$('#wyswietlZadanie').html('<img style="width:100%; height:100%;" src="'+ src_zad +'">');
			$('#wyswietlZadanie').stop().fadeIn(timeAnime2);
			moreOptions(link_zad);
		},timeAnime2);
	});
}

function moreOptions(link_zad)
{
		//alert(link_zad);
	document.getElementById("goFullScrean").href=link_zad;
	
	$('#wyswietlZadanie img, #goFullScrean, #cien').mouseenter(function(){
		$('#goFullScrean').stop().animate({top: 35}, timeAnime3);	
		$('#cien').stop().animate({opacity: 1}, timeAnime3*4);	
	})
	.mouseleave(function(){
		$('#goFullScrean').stop().animate({top: -50}, timeAnime3);	
		$('#cien').stop().animate({opacity: 0}, timeAnime3*4);	
	});
}