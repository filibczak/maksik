<?php
//ile first last czy_jest

	/*ktura opcja*/
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}else{
		$op = 'ile';
	}
	/*tekst*/
	if(isset($_GET['text'])){
		$text = $_GET['text'];
	}else{
		$text = 'Ala ma kota';	
	}
	/*szukany znak*/
	if(isset($_GET['znak'])){
		$znak = $_GET['znak'];
	}else{
		$znak = ' ';	
	}
	switch ($op) {
		/*ile znakow wyspepuje w text*/
		case 'ile':
				$odp = strlen($text); //ile znakow
			break;

		/*pierwsza litera*/
		case 'first':
				$odp = substr($text, 0, 1);	//pierwszy jeden znak
			break;

		/*ostatnia litera*/
		case 'last':
				$odp = substr($text, -1, 1);//ostatni jeden znak
			break;

		/*ile razy wystepuje podany znak*/
		case 'jest':
				$ile_jest = 0;
				for($i = 0; $i < strlen($text); $i++){
					if($text[$i] == $znak){
						$ile_jest++;
					}
				}
				$odp = 'znak "'.$znak.'" wystepuje '.$ile_jest.' razy';
			break;

		/*ile wyrazow*/
		case 'ile_wyr':
				$ile_jest = 1;
				for($i = 0; $i < strlen($text); $i++){
					if($text[$i] == ' '){
						$ile_jest++;
					}
				}
				$odp = 'jest '.$ile_jest.' wyrazow';
			break;
		
		default:
			$odp = 'none';
			break;
	}

	/*jaki mamy dzien */

	$dzis = date('l');
	switch ($dzis) {
		case 'Monday':
			$dzis = 'Poniedziałek';
			break;
		case 'Tuesday':
			$dzis = 'Wtorek';
			break;
		case 'Wednesday':
			$dzis = 'Środa';
			break;
		case 'Thursday':
			$dzis = 'Czwartek';
			break;
		case 'Friday':
			$dzis = 'Piątek';
			break;
		case 'Saturday':
			$dzis = 'Sobota';
			break;
		case 'Sunday':
			$dzis = 'Niedziela';
			break;
		
		default:
			$dzis = 'none';
			break;
	}



?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<?php echo '<meta charset="utf-8">' ?>
		<title>elo</title>
	</head>
	<body>
		<h1><?php echo 'Dziś mamy '.$dzis; ?></h1>
		<p>
			<?php echo $text; ?>
			<br>
			<?php echo $odp; ?>
		</p>
	</body>
</html>