<?php
	//r, r+ - tylko odczyt
	//w, w+ - nadpisywanie
	//a, a+ - dopisywanie,
	// + - odczytywanie

	//blokaty
	//LOCK_SH 1 - blokata dzielona
	//LOCK_EX 2 - dla pierwszej
	//LOCK_UN 3 - zdejmuje blkade
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$nazwa_pliku = "ip.txt";
	if(is_writable($nazwa_pliku) && $plik = fopen($nazwa_pliku, 'a+')){
		if(flock($plik, LOCK_EX)){
			$dzien = date('d/m/Y');
			$h=date('H');
			$m=date('i') +1;
			$s=date('s') +1;
			$dzis = $dzien.' '.$h.'.'.$m.'.'.$s.', ';
			//123.123.123.123 - 14.15.16 15:44.16
			fwrite($plik, $ip.' - '.$dzis);
			flock($plik, LOCK_UN);
			echo fread($plik, 1);
		}else{
			echo "error<br>nie zablokowano<br><br>";
		}
	}else{
		echo "error<br>NIe otworzono pliku<br><br>";
	}

	if(file_exists($nazwa_pliku)){
		$zawartosc_pliku = file_get_contents($nazwa_pliku);
		echo '<p>lista ipków: '.$zawartosc_pliku.'</p><br><br>';

		$dane = explode(', ', $zawartosc_pliku);
		echo 'Lista ip:<br>';
		foreach ($dane as $kay => $value) {
				echo $value.'<br>';
		}
	}





?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>22_1</title>
</head>
<body>
	
</body>
</html>