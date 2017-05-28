$(function(){
	
	$('#zgoda1').submit(function(){

		var nick = $('input[name="nick"]').val();
		alert(nick);
		var chce = $('#chce:checked').val();

		var komunikat = '';
		if (chce == undefined){
			komunikat = 'należy zaznaczyć opcje chce';
		}else{
			var takNie = $('input[name="zgoda"]:checked').val();
			if (takNie == undefined){
				komunikat = 'należy zaznaczyć tak lub nie';
			}
		}

		$('#konsola').text(komunikat).fadeIn('slow',function(){
			$(this).delay(300).fadeOut();
		})


		return false;
	});

	$('#chce').change(function(){
		if( $('input[name="zgoda"]').attr('disable') == 'disable' ){
			$('[name="zgoda"]').removeAttr('disable');
		}else{
			$('input[name="zgoda"]').attr('disable','disable');
		}
	});

});