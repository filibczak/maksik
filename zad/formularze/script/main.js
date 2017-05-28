$(function(){
	
	// pokazuje, ukrywa 'Wyślij'
	$('input[name="zgoda"]').change(function(){
		var zgoda = $('input[name="zgoda"]:checked').val();
		if(zgoda == 'on'){
			$('#wyslij').removeAttr('disabled');
		}else{
			$('#wyslij').attr('disabled','disabled');
		}
	});//end POKAZUJE / UKRWYA
	
	//pokazuje, ukrwya inny kolor
	$('input[value="inny"]').change(function(){
		var wybor = $('input[value="inny"]:checked').val();
		if (wybor == 'inny'){
			$('#inny').stop().fadeOut(400, function(){
				$(this).html('<input type="text" name="innyKolor" placeholder="Jaki?">').stop().fadeIn(400);	
			});
		}else{
			$('#inny').stop().fadeOut(400, function(){
				$(this).text('Inny').stop().fadeIn(400);	
			});
		}
	});
	//end pokazuje, ukrwya inny kolor
	
});