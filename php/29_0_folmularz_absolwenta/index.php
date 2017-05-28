<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Folmularz absolwenta</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body>
	<div id="box">
		<form id="std" action="send.php" method="POST">
			<section class="typPytania">
				<label for="uczeSie">Ucze się: </label><br>
				<label for="uczeSie"><input type="radio" name="uczeSie" value="nie" checked>Nie</label><br>
				<label for="uczeSie"><input type="radio" name="uczeSie" value="dziennie">Dziennie</label><br>
				<label for="uczeSie"><input type="radio" name="uczeSie" value="zaocznie">Zaocznie</label><br>
				<br>
				<label for="uczelnia">Nazwa uczelni: <input type="text" name="uczelnia" value=""></label><br>
				<label for="keirunek">Kierunek: <input type="text" name="keirunek" value=""></label><br>
			</section>
			<section class="typPytania">
				<label for="pracuje">Pracuje:</label><br>
				<label for="pracuje"><input type="radio" name="pracuje" value="tak" checked>Tak</label><br>
				<label for="pracuje"><input type="radio" name="pracuje" value="nie">Nie</label><br>
			</section>
			<section class="typPytania">
				<label for="zagranicom">Przebywam za granicom: </label><br>
				<label for="zagranicom"><input type="radio" name="zagranicom" value="nie" checked>Nie</label><br>
				<label for="zagranicom"><input type="radio" name="zagranicom" value="tak">Tak</label><br>
			</section>
			<section class="typPytania">
				<input type="submit" name="wyslij">
				<input type="reset" name="reset">
				<input type="text" name="akcja" value="ok" style="display: none">
			</section>
		</form>
		<?php
		if(isset($_GET['th']) && $_GET['th'] == 'x'){
		?>
		<h1>Dzięuje za wypełnienie folmularza</h1>
		<button><a href="pok.php">Pokaż dane</a></button>
		<?php
		}
		?>
	</div>
</body>
</html>