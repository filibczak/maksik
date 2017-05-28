<?php	
	$imiona = array('Imienislaw','kristof','przemki','gucik');//0,1,2,3
	$imiona[] = 'dawid';//4
	array_push($imiona,'kowalski','jacek','zelus','kacper'); //5,6,7,8
	$ile_imion = count($imiona);
	//echo $ile_imion;

	if(isset($_GET['imie'])){
		$podane_imie = $_GET['imie'];
	}else{
		$podane_imie = '';
	}

	for($i = 0; $i < $ile_imion; $i++){
		if($imiona[$i] == $podane_imie){
			echo 'imie '.$podane_imie.' wystepuje w dablicy.<br>';
			break;
		}
	}
	echo '<br><br>';
	for($i = 0; $i < $ile_imion; $i++){
		echo $imiona[$i].'<br>';
	}
	echo '<br>';
	sort($imiona);//sortuje od a do z
	for($i = 0; $i < $ile_imion; $i++){
		echo $imiona[$i].'<br>';
	}
	echo '<br>';
	rsort($imiona);//sortuje od z do a
	for($i = 0; $i < $ile_imion; $i++){
		echo $imiona[$i].'<br>';
	}
	echo '<br>';

	/*przekstałcza wszystkie elementy z tablicy w jedno*/
	$text = implode(' | ', $imiona);
	echo $text;
	$imiona2 = explode(' | ', $text);
?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title>elo</title>
	</head>
	<body>
			<p><?php  ?></p>
	</body>
</html>