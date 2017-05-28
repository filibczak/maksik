function czas()
{
	var now = new Date();
		var godzina = now.getHours();
			if (godzina < 10) godzina = '0' + godzina;
		var minuta = now.getMinutes();
			if (minuta < 10) minuta = '0' + minuta;
		var secunda = now.getSeconds();
			if (secunda < 10) secunda = '0' + secunda;
		
	$('#czas').text(godzina + ' : ' + minuta + ' : ' + secunda);
	
	setTimeout('czas()', 1000);
}