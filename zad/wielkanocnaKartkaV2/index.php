<?php

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Życzenia wielkanocne</title>
	<link rel="stylesheet" href="bin/layout/screen.css">
	<script src="bin/lib/jquery-3.1.1.min.js"></script>
	<script>
		var key=0,
				bRun = true
		;
		//------------------------------------------------------
		
		$(function(){ //jq
			/*pobiera wcisniety klawisz*/
			if(bRun){//run
				/*klawisz*/
				$(document).keydown(function(event) {
					key = event.keyCode;
					$('#tips').text(key)
					event.preventDefault();
				});//klawisz END

				/*rabbit default animation*/
				rabbAnim();
				//rabbit default animation END
			}//run END

		});//jq END
		//------------------------------------------------------
		
		function rabbAnim(){
			var defoult = 'bin/img/inGame/character/rabbit/default.png';
			var imgsrc = $('#rabbit img').attr('src');
			if(defoult == imgsrc){
				$('#rabbit img').attr('src', 'bin/img/inGame/character/rabbit/animacja.gif')
			}
			$('#rabbit img').stop().animate({
				bottom: 25
			},333,function(){//animate 1 END
				$(this).stop().animate({
					bottom: 25
				},333,function(){//animate 2 END
					$(this).stop().animate({
						bottom: 0
					},334,function(){//animate 3 END
						rabbAnim();
					});//function 3 END
				});//function 2 END
			});//function 1 END
		}
	</script>
</head>
<body>
<div id="box">
	<section id="game">
		<div id="rabbit">
			<img src="bin/img/inGame/character/rabbit/default.png" alt="rabbit_animation">
		</div>
		<div id="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
			<img src="bin/img/inGame/grass.png" alt="grass">
		</div>
	</section>
	<aside id="tips"></aside>
	<section id="topTen"></section>
</div>
</body>
</html>