$(function(){

	$('#click').click(function(){
		$('#area').load('jestemcwelem12.html', function(response, status, xhr) {
			if(status == 'error'){
				var msg = "sorry, but ... it's not work :<";
				$('#area').text(msg);
			}
		});
	});

});