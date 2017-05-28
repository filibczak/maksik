<?php
	session_start();
	$los = rand(1,10);
	$_SESSION['los'] = $los;
	$_SESSION['teakoff'] = 3;

	$wheVie = 'views.txt';
	$wheGam = 'games.txt';
	$wheFir = 'first.txt';
	$views = (int)file_get_contents($wheVie) + 1;
	$games = (int)file_get_contents($wheGam);
	$first = (int)file_get_contents($wheFir);
	/*laczy do pliku view*/
	$where = 'views.txt';
	if(is_writable($where) && $file = fopen($where, 'w')){
		if(flock($file, 2)){
			fwrite($file, $views);
			flock($file, 3);
		}else
			echo 'nie zalocowano';
		fclose($file);
	}else
		echo 'nie otwarto';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>to nie jest odpowiedź: <?php echo $los ?></title>
	<link rel="stylesheet" href="screen.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="main.js"></script>
</head>
<body>
	
	<div id="box">
		<header id="head">Zgadnij wylosowana liczbę</header>
		<section id="liczby">
			<form id="liczbyForm">
				<label for="liczba">Podaj liczbe z zakresy 1 - 10: <input type="number" name="liczba" value="5" min="1" max="10" autofocus required></label><br>
				<label for="submit"><input type="submit" name="submit" value="Sprawdź"></label>
			</form>
			<p id="malo">Liczba jest za <span>mała</span>, sprubuj ponownie!</p>
			<p id="duzo">Liczba jest za <span>duża</span>, sprubuj ponownie!</p>
			<p id="rownofirst">Brawo, <span>zgadłeś</span> za pierwszym razem!</p>
			<p id="rowno">Brawo, <span>zgadłeś!</span></p>
		</section>
		<aside id="wynik">
			<section id="ileProb">Pozostałe próby:<br><span id="teakoff" data-woff='<?php echo $_SESSION['teakoff'] ?>'></span></section>
			<section>Liczba odświeżeń: <span id="views"><?php echo $views; ?></span></section>
			<section>Liczba zagrań: <span id="games"><?php echo $games; ?></span></section>
			<section>Ile razy trafionych za<br>pierwszym razem: <span id="first"><?php echo $first; ?></span></section>
			<section id="sprubujPonownieStart"><input type="submit" id="refresh" value="Zagraj ponownie"></section>
		</aside>
	</div>
	
</body>
</html>