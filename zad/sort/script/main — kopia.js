function sortuj(){
	$('#go').click(function(){
		alert($('.time').eq(1).css('top'));
				$('.time').eq(1).animate({
					top: parseInt( $('.time').eq(1).css('top') ) + 150
				},timeAnime);
		//posortuj();
	});
}
function posortuj(){
	for (i = 0; i < nr; i++)
		for (j = 0; j < nr; j++){
			var value1 = $('.time').eq(j).val(),
				value2 = $('.time').eq(j+1).val();
			if (value1 > value2){
				$('.time').eq(j).animate({
					top: '+= 50'
				},timeAnime);
				$('.time').eq(j+1).animate({
					top: '-= 50'
				},timeAnime);
			}
		}
}