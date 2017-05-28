<?php

if(isset($_GET['op'])){
	switch ($_GET['op']) {
		case 'wyslij':
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ulubiony pzedmiot szkolny</title>
	<style>
		
		body{
			background-color: grey;
			color: darkgrey;
		}
		fieldset{
			margin: 0 auto;
			text-align: center;
			max-width: 500px;
		}

	</style>
</head>
<body>

	<fieldset>
		<legend>Odebrane Dane</legend>
		<?php
			$doPliku = '';
			foreach ($_POST as $key => $value) {
				echo "<div><span>$key:</span><span>$value<span></div>";
				$doPliku .= '|'.$value;
			}
			if(is_writable('dane.txt') && $handle = fopen('dane.txt', 'a')){
				echo 'wysyla ';
				if(flock($handle, 2)){
					echo 'zapisuje ';
					fwrite($handle, $doPliku.' |:| ');
					echo 'zapisalo ';
					flock($handle, 3);
				}
				fclose($handle);
			}else{
				echo 'nie wyslano';
			}
		?>
	</fieldset>

</body>
</html>
<?php
			//header('Location: ?');
			break;
		
		default:
			break;
	}
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ulubiony pzedmiot szkolny</title>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<style>
		
		body{
			background-color: grey;
			color: darkgrey;
		}
		fieldset{
			margin: 0 auto;
			text-align: center;
			max-width: 500px;
		}
		.jed span{
			display: inline-block;
			width: 150px;
			margin-right: 15px;
			text-align: right;
		}

	</style>
	<script>
		$(function(){

		});//jq END
	</script>
</head>
<body>

<form id='wyslij' action='?op=wyslij' method="POST">
<fieldset><legend>ulubiony przedmiot szkolny</legend>
		<label class="jed"><span>Klasa:</span><input type="text" name="klasa" placeholder="np. 3i, 3I, IIIi"></label><br>
		<label class="jed"><span>Imie:</span><input type="text" name="imie"></label><br>
		<label class="jed"><span>Nazwisko:</span><input type="text" name="nazwisko"></label><br>
		<br>
		<label class="jed"><span></span><input type="text" name="przed_1" placeholder="1"></label><br>
		<label class="jed"><span>Ulubiony przedmiot</span><input type="text" name="przed_2" placeholder="2"></label><br>
		<label class="jed"><span></span><input type="text" name="przed_3" placeholder="3"></label><br>
		<br>
		<label class="jed"><span>uzasadnij wybur 1</span><textarea name="usad_wyb_1"></textarea><label>
		<br><br>
		<label>
			<input type="reset" value="Resetuj">
			<input type="submit" value="Wyślij">
		</label>

	<p>
		
	</p>
</fieldset>
</form>


</body>
</html>
<?php } ?>