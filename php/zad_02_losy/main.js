$(function(){
	teakoff();
//location.reload();
	$('#refresh').click(function(){
		location.reload();
	});
	$('#liczbyForm').submit(function(){
		var los = $('input[name=liczba]').val();
		$.ajax({
			url: 'akcje.php?op=sprLiczbe&losUser=' + los,
			success: function(data){
				//alert(data);
				dajNapis(data);
			}
		});
		return false;
	});

});

function dajNapis(data){
	var ile = parseInt($('#teakoff').attr('data-woff'));
	if(ile == 3){
		gamepp();
	}
	if(ile == 1){
		pokRest();
		zablokuj();
		$('#teakoff').css('color', 'red');
	}
	ile--;
	$('#teakoff').attr('data-woff', ile);
	teakoff();
	$('#malo').css('display', 'none');
	$('#duzo').css('display', 'none');
	$('#rowno').css('display', 'none');
	$('#rownofirst').css('display', 'none');
	switch(data){
		case 'malo':
			$('#malo').css('display', 'block');
			break;
		case 'duzo':
			$('#duzo').css('display', 'block');
			break;
		case 'rowno':
			zablokuj();
			$('#rowno').css('display', 'block');
			$('#teakoff').css('color', 'green');
			pokRest();
			break;
		case 'rownofirst':
			zaPierpp();
			zablokuj();
			pokRest();
			$('#rownofirst').css('display', 'block');
			$('#teakoff').css('color', 'green');
			break;
		default:
			alert(data);
			break;
	}
	
	
}
function zablokuj(){
	$('input[name=submit]').attr('disabled','disabled');
}
function teakoff(){
	var woff = $('#teakoff').attr('data-woff');
	$('#teakoff').text(woff);
}
function zaPierpp(){
	var first = $('#first').text();
	first = parseInt(first);
	$('#first').text(first+1);
}
function gamepp(){
	var game = $('#games').text();
	game = parseInt(game);
	$('#games').text(game+1);
}
function pokRest(){
	$('#refresh').css('display', 'inline-block');
}