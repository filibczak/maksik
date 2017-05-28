<?php



?>

<!DOCTYPE html>
<html lang='pl'>
<head>
	<meta charset="utf-8">
	<title>elo</title>
	<style>
		body{
			background-color: black;
			color: #fff;
			line-height: 100%;
		}
		form{
			width: 250px;
			margin: 0 auto;
			margin-top: 50px;
		}
		label[data-for="zgoda"],
		label[data-for="hobby"],
		label[data-for="plec"]{
			cursor: pointer;
		}
		label[data-for="zgoda"]:hover,
		label[data-for="hobby"]:hover,
		label[data-for="plec"]:hover{
			color: #bcbcbc;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		
		$(function(){ 
				$('[name="zgoda"]').change(function(){
					if($('[name="Wyslij"]').attr('disabled') == 'disabled')
						$('[name="Wyslij"]').removeAttr('disabled');
					else
						$('[name="Wyslij"]').attr('disabled', 'disabled');
				}); //end zgoda.change
			}); // end jQ

		</script>
</head>
<body>
	<form action="dane.php" method="POST">
		<fieldset><legend>Formulaż kontaktowy</legend>

			<label for="imie"><input type="text" id="imie" name="imie" placeholder="Imię" autofocus required pattern="([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}"></label><br><br>
			<label for="nazwisko"><input type="text" id="nazwisko" name="nazwisko" placeholder="Nazwisko" required pattern="([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}"></label><br><br>
			<label for="wiek">Wiek: <input type="number" id="wiek" name="wiek" placeholder="Wiek" value="18" required min="0" max="200"></label><br><br>

			<label>Płeć: </label>
			<label data-for="plec"><input type="radio" name="plec" value="m" checked>Mężczyzna</label>
			<label data-for="plec"><input type="radio" name="plec" value="k">Kobieta</label><br><br>

			<label>Zaintersowania:</label><br>
			<label data-for="hobby"><input type="checkbox" name="hobby[]" value="gry">Ptfu! Gry kompuerowe</label><br>
			<label data-for="hobby"><input type="checkbox" name="hobby[]" value="programowanie">Programowanie</label><br>
			<label data-for="hobby"><input type="checkbox" name="hobby[]" value="muzyka">Muzyka</label><br>
			<label data-for="hobby"><input type="checkbox" name="hobby[]" value="kino">Kino</label><br>
			<label data-for="hobby"><input type="checkbox" name="hobby[]" value="inne">Inne</label><br><br>

			<label>Opis:</label><br>
			<textarea name="opis"></textarea><br><br>

			<label data-for="zgoda"><input type="checkbox" name="zgoda" value="zgoda">Wyrazam zgode na (...).</label><br><br>

			<label for="wyslij"><input type="submit" name="Wyslij" id="wyslij" value="Wyslij" disabled="disabled"></label>
			<label for="reset"><input type="reset" id="reset" name="reset" value="Wyczyść"></label>

		</fieldset>
	</form>
</body>
</html>