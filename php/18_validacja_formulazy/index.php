<?php

	session_start();


?>

<!DOCTYPE html>
<html lang='pl'>
<head>
	<meta charset="utf-8">
	<title>elo</title>
	<style>
		body{
			background-color: black;
			color: white;
		}
		#dane_os{
			position: absolute;
			top: calc(50% - 100px/2);
			left: calc(50% - 170px/2);
			height: 100px;
			width: 170px;
		}
		#dane_os fieldset{
			height: 100%;
			width: 100%;
		}
		#error{
			position: absolute;
			top: calc(50% - 48px/2 + 100px);
			left: calc(50% - 540px/2);
			font-size: 40px;
			color: red;
			text-align: center;
		}
	</style>
</head>
<body>
	<form id="dane_os" action="dane.php" method="POST">
		<fieldset><legend>Dane osobowe</legend>
			<label for="imie">
				<input type="text" id="imie" name="imie" placeholder="Imię" required pattern="([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}">
			</label>
			<label for="nazwisko">
				<input type="text" id="nazwisko" name="nazwisko" placeholder="Nazwisko" required pattern="([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}">
			</label>
			<br>

			<label>Płeć: </label>
			<label><input type="radio" name="plec" value="k" checked>Kobita</label>
			<label><input type="radio" name="plec" value="m">Chłop</label>
			<br>

			<label for="wyslij">
				<input type="submit" id="wyslij" name="wyslij" value="Wyślij">
			</label>
			<label for="reset">
				<input type="reset" id="reset" name="reset" value="Czyść">
			</label>
		</fieldset>
	</form>
	<div id="error">
		<?php 
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
		?>
	</div>
</body>
</html>