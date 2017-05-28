var timeAnime = 200;

function wysunSocial()
{
	/*=== Po najechaniu mysza ===*/
		$('#socialAll').mouseenter(function(){
			$(this).stop().animate({left:-2}, timeAnime);
		});
	
	/*=== Po odjechaniu mysza ===*/
	
		$('#socialAll').mouseleave(function(){
			$(this).stop().animate({left:-72}, timeAnime);
		});
	
}