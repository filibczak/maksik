<?php
session_start();
if(isset($_SESSION['rezerwacja']) && $_SESSION['rezerwacja'] != '#'){
	$rezerwacja_id = $_SESSION['rezerwacja'];
	
}else{
	$miejsce_id = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
	$_SESSION['rezerwacja'] = $rezerwacja_id = stwRezerwacje();
	if(isset($_POST['miejsca']) && isset($_POST['sala'])){
		$miejsca2 = $miejsca = $_POST['miejsca'];
		$sala = (int)$_POST['sala'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$email = $_POST['email'];
	}else header('Location: index.php');


	$miejsca = explode(' [] ', $miejsca);
	array_pop($miejsca);
	foreach($miejsca as $miejsce){
		$miejsce = explode('.', $miejsce);
		if(!czy_zajete($sala, $miejsce[0], $miejsce[1])){
			$miejsca3[] = array($miejsce[0], $miejsce[1]);
		}
	}
	dodaj_do_xml($sala, $imie, $nazwisko, $email, $rezerwacja_id, @$miejsca3);
	#header('Location: index.php');
}




function dodaj_do_xml($sala, $imie, $nazwisko, $email, $rezerwacja_id, $miejsca){
	$xml = simplexml_load_file('dane.xml');
	$sala = $xml->sala[$sala];
	$ileJestJuzSal = count($sala);
	$ileJestJuzRezerwacji = count($sala->rezerwacja);
	$ileMiejsc = count($miejsca);
	
	$sala->addChild('rezerwacja');
	$rezerwacja = $sala->rezerwacja[($ileJestJuzRezerwacji)];
	
	$rezerwacja->addChild('imie', $imie);
	$rezerwacja->addChild('nazwisko', $nazwisko);
	$rezerwacja->addChild('email', $email);
	$rezerwacja->addChild('nr_rezerwacji', $rezerwacja_id);
	
	for($i = 0; $i < $ileMiejsc; $i++){
		$rezerwacja->addChild('miejsce');
		$rezerwacja->miejsce[$i]->addChild('rzad', $miejsca[$i][0]);
		$rezerwacja->miejsce[$i]->addChild('miejsce_nr', $miejsca[$i][1]);
	}
	
	$xml->asXML('dane.xml');

}

function stwRezerwacje(){
	$ch = '1234567890QWERTYUIOPLKJHGFDSAZXCVBNM';
	$ch_i = strlen($ch);
	$ileZ = 5;
	$id = '';
	for($i = 0; $i < $ileZ; $i++){
		$id.= $ch[rand(0,($ch_i-1))];
	}
	return $id;
}

function czy_zajete($sala, $rzad, $nr){
	$xml = simplexml_load_file('dane.xml');
	foreach($xml->sala[$sala] as $rezerwacja){
		foreach($rezerwacja->miejsce as $miejsce){
			if(
				$miejsce->rzad 				== $rzad 	&&
				$miejsce->miejsce_nr	== $nr 		){
				//----
				return true;
			}
		}
	}
	return false;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Twoja rezerwacja (<?php echo $rezerwacja_id;?>)</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<style>
		body{
			background-color: black;
			color: white;
		}
		label{
			display: block;
			width: 300px;
			margin: 0 auto;
		}
		input{
			background-color: black;
			color: white;
			width: 100%;
			font-size: 80px;
			padding: 0;
			margin: 0;
			outline: 0;
			border: 0;
		}
		h1, h2, input{
			text-align: center;
		}
		a{
			color: white;
			text-decoration: none;
		}
		a:hover{
			color: grey;
		}
	</style>
	<script>
		$(function(){
			$('#rezerwacja').focus().select();

		})
	</script>
</head>
<body>
	<h1>numer twoeje rezerwacji</h1>
	<label><input type="text" id="rezerwacja" value="<?php echo $rezerwacja_id;?>"></label>
	<h2><a href="index.php?sala=<?php echo $sala; ?>">Cofnij</a></h2>
</body>
</html>