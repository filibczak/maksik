function pokazUp()
{
	$("#up").stop().fadeOut(0);
	
	var stt_is_shown = false;
	$(window).scroll(function(){
		var win_height = 100;
		var scroll_top = $(document).scrollTop(); 
		if (scroll_top > win_height && !stt_is_shown)
		{
			stt_is_shown = true;
			$("#up").stop().fadeIn();
		}
		else if (scroll_top < win_height && stt_is_shown)
		{
			stt_is_shown = false;
			$("#up").stop().fadeOut();
		}
	});
   
	$('#up').click(function(e){
		e.preventDefault();
		$('htmml, body').stop().animate({scrollTop: 0},400);
	});
	
}