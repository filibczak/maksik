<?php

	function zapisz($imie){
		$fileName = 'imiona.txt';
		if(is_writable($fileName) && $file = fopen($fileName, 'a')){
			if(flock($file, 2)){
				fwrite($file, $imie.' ||| ');
				flock($file, 3);
			}
			fclose($file);
		}
	}

	function pokaz(){
		$fileName = 'imiona.txt';
		if(file_exists($fileName) && $file = fopen($fileName, 'r')){
			$content = file_get_contents($fileName);
			$content = explode(' ||| ', $content);
			array_pop($content);
			echo '<ul>';
			foreach($content as $kay => $value){
				echo '<li>'.$value.'</li>';
			}
			echo '</ul>';
		}
	}

	function usun_plik(){
		$fileName = 'imiona.txt';
		if(is_writable($fileName) && $file = fopen($fileName, 'w')){
			if(flock($file, 2)){
				echo(30);
				fwrite($file, '');
				flock($file, 3);
			}
			fclose($file);
		}
	}

	if(isset($_GET['op'])){
		$op = $_GET['op'];
		switch($op){
			case 'zapisz':
				zapisz($_GET['imie']);
				break;

			case 'pokaz':
				pokaz();
				break;

			case 'usun':
				usun_plik();
				break;

			default:
				echo 'Brak wartości op';
				break;
		}//switch end
	}else{

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Imiona</title>
	<style>
		body{
			background-color: black;
			color: white;
		}
		span{
			display: block;
			width: 400px;
			margin: 0 auto;
			margin-top: 50px;
		}
		fieldset{
			width: 400px;
			margin: 0 auto;
			margin-top: 50px;
			border: 1px solid white;
		}
		legend{
			outline: 1px solid white;
			padding: 2px 15px;
		}
		.brb{
			float: right;
		}
		input[type="reset"],
		input[type="button"],
		input[type="submit"]{
			cursor: pointer;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){
			
			//zapisywanie
			$("#wpisy").submit(function(){
				var imie = $("#imie").val();
				$.ajax({
					url: "?op=zapisz&imie="+imie
				});
				$("#imie").val('');
				return false;
			});
			
			//pokazywanie
			$("#pokaz").click(function() {
				$.ajax({
					url: "?op=pokaz",
					success: function(data){
						$('#imiona').html(data);
					}
				});
				return false;
			});
			
			//czysci konsole
			$('#czysc').click(function(){
				$('#imiona').text('');
			});
			
			//kasuje zawartość pliku
			$('#usun').click(function(){
				if(confirm('Napewno usunąć zawartość pliku?')){
					$.ajax({
						url: "?op=usun"
					});
					$('#imiona').text('');
				}
				return false;
			});
			
			
		});
	</script>
</head>
<body>
	<fieldset><legend>Imiona</legend>
		<form id="wpisy" action="" method="POST">
			<label for="imie"><input id="imie" type="text" autofocus placeholder="Tu wpisz imie" required></label>
			<label class="brb"><input id="zapisz" type="submit" value="zapisz"></label><br><br>
			<label class="brb"><input id="pokaz" type="button" value="pokaz"></label>
		</form>
	</fieldset>
	<fieldset><legend>Konsola</legend>
		<form>
			<p id="imiona"></p>
			<label><input id="czysc" type="reset" value="Wyczyść konsole"></label>
			<label class="brb"><input id="usun" type="button" value="usun zawartosc pliku"></label>
		</form>
	</fieldset>
</body>
</html>
<?php
	}
?>