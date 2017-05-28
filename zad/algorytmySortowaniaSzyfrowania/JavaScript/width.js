function paczSzerokosc()
{
	$(window).resize(function(){
		var w = window.innerWidth;
		
		if (w >= 1000)
		{
			$('#box').css('width','1000px');
			$('#box').css('left','calc(50% - 1000px/2)');
		}
		else
		{
			$('#box').css('width','100%');	
			$('#box').css('left','0');	
		}

	});
}