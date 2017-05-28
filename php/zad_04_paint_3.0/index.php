<?php

/*	which pic	*/
if(isset($_GET['w']) && (int)$_GET['w'] >= 0 && (int)$_GET['w'] <= 4)
	$which = (int)$_GET['w'];
else $which = 0;

/*	create nav	*/
$aTag = '';
for($i = 0; $i < 5; $i++){
	$checked = $i == $which ? ' checked':'';
	$aTag .= '<a class="pic'.$checked.'" href="?w='.$i.'">pic#'.($i+1).'</a>';
}

/*	load pic from xml file	*/
$where = 'obrazy.xml';
$xml = simplexml_load_file("obrazy.xml");
$pic = $xml->obraz[$which];

/*	last colors from cookies, or default from file	*/
if(isset($_COOKIE['last-colors'])){
	$color = $_COOKIE['last-colors'];
}else{
	$colorsFile = 'default-colors.txt';
	if(is_writable($colorsFile)){
		$color = file_get_contents($colorsFile);
		$color = substr($color, 3);	//<-- naprawia jakis blad ze na poczatku stringa za 3 nieznane znaki
	}else{
		$color = '#006400';
		for($i = 0; $i < 12; $i++) $color .= '#ffffff';
		
	}
}
$color = explode('#', $color);
array_shift($color);
$color = @array_map('trim', $color);
$active_color = $color[0];
@array_shift($color);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content="Krzysztof Kukiz">
	<meta name="Description" content="Paint 3.0 online">
	<title>Paint 3.0</title>
	<link rel="stylesheet" href="screen.css">
	<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="jquery.cookie.js"></script>
	<script>
		$(function(){
		/*paleta kolorów*/
			var color = $('#active-color2').val();
		//po kliknieciu ostatni kolor zmienia aktywny kolor
			$('.color').click(function(){
				color = $(this).attr('data-color');
				//przesuniecie ostatnich colorów
				psesun(color);
				//zmiania aktywny
				$('#active-color2').val(color);
				lastColors2Cookies();
			});
		//po zmienie aktywnego koloru
			$('#active-color2').change(function(){
				color = $(this).val();
				//przesuniecie ostatnich colorów
				psesun(color);
				lastColors2Cookies();
			});
		//resetuje cookies
			$('#restCookies').click(function(){
				$.removeCookie('last-colors');
			});
			
		/*rysowanie kolorem*/
			//czy wczisniety
			var down = false;
			$(document).mousedown(function() {
					down = true;
			}).mouseup(function() {
					down = false;  
			});
			//zmiana koloru jesli jest wczisniete
			$('.px').mouseenter(function(){
				if(down){
					$(this).css('background-color', color);
				}
			});
			//klikniety zmienia
			$('.px').click(function(){
				$(this).css('background-color', color);
			});
			
			
		/*wyczysczenie rysunku*/
			$('#clear button').click(function(){
				$('.px').css('background-color', '#ffffff');
			});
		
		/*zapisuje*/
			$('#save button').click(function(){
				var html = $('#draw').html();
				var which = <?php echo $which?>;
				$.post('save.php', { html: html, which: which})
					.done(function(data) {
						//alert( data );
					});
			});
			
			function psesun(color){
				for(i = (4*3)-1; i >= 0; i--){
					if(i){
						var color_pre = $('.color').eq(i-1).attr('data-color');
						$('.color').eq(i).attr('data-color', color_pre).css('background-color', color_pre);
					}else{
						$('.color').eq(i).attr('data-color', color).css('background-color', color);
					}
				}
			}
			function lastColors2Cookies(){
				var colors = '';
				colors += $('#active-color2').val();
				for(i = 0; i < 12; i++){
					colors += $('.color').eq(i).attr('data-color');
				}
				$.cookie('last-colors', colors);
			}
		});//jq end
	</script>
</head>
<body>
<div id="box">  
	<nav id="which-pic" style="overflow: hidden;">
		<?php echo $aTag; ?>
	</nav>

	<section id="gui">
		<section id="draw">
		<?php echo $pic; ?>
		<?php
			/*
		$width = 93;
		$height = 60;
		$ile_px = $width*$height;
		for($i = 0; $i < $ile_px; $i++){
			$bgc = "#ffffff";
			echo '<span class="px" data-id_px="'.$i.'" style="background-color: '.$bgc.'"></span>';
		}*/
		?>
		</section>
		<nav id="tools">
			<section id="colors">
				<label for="active-color2" id="active-color">
					<input type="color" name="active-color2" id="active-color2" value="#<?php echo $active_color; ?>">
					<span for="active-color" >Wybierz Kolor</span>
				</label>
				<section id="last-colors">
					<div>Ostatnie kolory:</div>
					<?php
						foreach($color as $color){
							echo "<div class='color' style='background-color: #$color' data-color='#$color'><span></span></div>";
						}
					?>
					<!--<div class='color' style='background-color: #08f'><span>#08f456</span></div>-->
				</section>
				<span id="restCookies">resetuj</span>
			</section>
			<section id="clear"><button>Wyczyść</button></section>
			
			<section id="save"><button>Zapisz</button></section>
		</nav>
	</section>	
	
</div>
</body>
</html>