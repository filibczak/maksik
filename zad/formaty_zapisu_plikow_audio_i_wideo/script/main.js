$(function(){
		var top_article_music = $('#article_music').offset().top;
		var top_article_video = $('#article_video').offset().top;
		var img_src = new Array();
		img_src[0] = 'url(img/maxresdefault.png)';
		img_src[1] = 'url(img/video-streams-content-ss-1920.jpg)';
		img_src[2] = 'url(img/VideoMarketingHeader.jpg)';
	
	/*Pokaz/ukryj przycisk Up i menu*/
	$('#up').stop().fadeOut(0);
	$('#menu').stop().fadeOut(0);
	
	$(window).scroll(function(){
		var timeAnime = 200;
		var wysokosc_pokazania_up = window.innerHeight /2;
		var wysokosc_pokazania_nav = window.innerHeight;
		var scroll_top = $(document).scrollTop();
		
		/*up przycisk*/
		if(scroll_top > wysokosc_pokazania_up){//pokazuje up
			$('#up').stop().fadeIn(timeAnime);
		}else if(scroll_top < wysokosc_pokazania_up){//ukrywa up
			$('#up').stop().fadeOut(timeAnime);
		}
		/*menu*/
		if(scroll_top > wysokosc_pokazania_nav){//pokazuje up
			$('#menu').stop().fadeIn(timeAnime);
		}else if(scroll_top < wysokosc_pokazania_nav){//ukrywa up
			$('#menu').stop().fadeOut(timeAnime);
		}
	});
	
	var scrollTimeAnime = 400;
	/*po kliknieciu up przenosi do gury*/
	$('.up').click(function(){
		$('html, body').stop().animate({scrollTop: 0},scrollTimeAnime);
	});
	/*po klinkieciu ikonki muzyka przecodzi do akapitu*/
	$('.article_music_a').click(function(){
		$('html, body').stop().animate({scrollTop: $('#article_music').offset().top},scrollTimeAnime);
	});
	/*po klinkieciu ikonki video przecodzi do akapitu*/
	$('.article_video_a').click(function(){
		$('html, body').stop().animate({scrollTop: $('#article_video').offset().top},scrollTimeAnime);
	});
	
	
	/*zmienia tlo*/
	$(window).scroll(function(){
		
		var scroll_top = $(document).scrollTop();
		
		if(scroll_top-200 < top_article_music){
			$('#strona_content').css('background-image',img_src[0]);//muzyka
		}else if(scroll_top-200 < top_article_video){
			$('#strona_content').css('background-image',img_src[1]);//video
		}else{
			$('#strona_content').css('background-image',img_src[2]);//stopka
		}
		
	});
	
	/*resize*/
	var width = window.innerWidth;
	var width2 = 1260;
	if(width < width2){
		$('#strona_content article').css('width', '100%');
		$('#strona_content article').css('padding', '50px 0');
	}else{
		$('#strona_content article').css('width', 'calc(100% - 300px*2)');
		$('#strona_content article').css('padding', '50px 300px');
	}
	
	$(window).resize(function(){
		var width = window.innerWidth;
		if (width < width2){
			$('#strona_content article').css('width', '100%');
			$('#strona_content article').css('padding', '50px 0');
		}else{
			$('#strona_content article').css('width', 'calc(100% - 300px*2)');
			$('#strona_content article').css('padding', '50px 300px');
		}
	});
	
	
});