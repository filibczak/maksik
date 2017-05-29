<?php
require_once('../scripts.php');
$connect = polacz_db();

if(isset($_POST['op'])){
	switch ($_POST['op']) {
		case 'kli':
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$wiek = $_POST['wiek'];
			if(!juz_jest_imie_nazwisko($connect, $imie, $nazwisko, $wiek)){
				$sql = "INSERT INTO filKlient VALUES(NULL, '$imie','$nazwisko', '$wiek')";
 				send($connect, $sql);
			}else echo 'Już istnieje ten klient!';
			break;
		case 'kliUpd':
			$id = $_POST['id'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$wiek = $_POST['wiek'];
			$sql = "UPDATE filKlient SET klImie = '$imie', klNazwisko = '$nazwisko', klWiek = '$wiek' WHERE klID = '$id' OR klID = $id";
			send($connect, $sql);
			break;
		case 'rez':
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$wiekU = $_POST['wiekU'];
			if(!jest_juz_rez($connect, $imie, $nazwisko, $wiekU)){
				$sql = "INSERT INTO filRezyser VALUES(NULL, '$imie','$nazwisko', '$wiekU')";
 				send($connect, $sql);
			}else echo 'Już jest ten rezyswer!';
			break;
		case 'rezUpd':
			$id = $_POST['id'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$wiekU = $_POST['wiekU'];
			$sql = "UPDATE filRezyser SET rezImie = '$imie', rezNazwisko = '$nazwisko', rezDataUrodzenia = '$wiekU' WHERE rezID = '$id' OR rezID = $id";
			send($connect, $sql);
			break;
		case 'gat':
			$nazwa = $_POST['nazwa'];
			if(!jest_juz_gat($connect, $nazwa)){
				$sql = "INSERT INTO filGatunek VALUES(NULL, '$nazwa')";
 				send($connect, $sql);
			}else echo 'Już jest ten gatuenk!';
			break;
		case 'gatUpd':
			$id = $_POST['id'];
			$nazwa = $_POST['nazwa'];
			$sql = "UPDATE filGatunek SET gatNazwa = '$nazwa' WHERE gatID = '$id' OR gatID = $id";
			send($connect, $sql);
			break;
		case 'flm':
			$tytul = $_POST['tytul'];
			$rez = $_POST['rez'];
			$gat = $_POST['gat'];
			$rok = $_POST['rok'];
			$czas = $_POST['czas'].':00';
			$sql = "INSERT INTO filFilmy VALUES (NULL, '$tytul', '$rez', '$rok', '$gat', '$czas');";
			send($connect, $sql);
			break;
		case 'flmUpd':
			$id = $_POST['id'];
			$nazwa = $_POST['nazwa'];
			$sql = "UPDATE filGatunek SET gatNazwa = '$nazwa' WHERE gatID = '$id' OR gatID = $id";
			send($connect, $sql);
			break;
		case 'wyp':
			$flm = $_POST['flm'];
			$kln = $_POST['kln'];
			$wyp = $_POST['wyp'];
			$odd = $_POST['odd'];
			$sql = "INSERT INTO filWypozyczenia VALUES (NULL, '$wyp', '$odd', '$flm', '$kln');";
			send($connect, $sql);
			break;
		
		default:
			# code...
			break;
	}
}

function juz_jest_imie_nazwisko($connect, $imie, $nazwisko, $wiek){
	$sql = "SELECT * FROM filKlient WHERE klImie = '$imie' AND klNazwisko = '$nazwisko' AND ( klWiek = $wiek OR klWiek = '$wiek')";
	if($result = $connect->query($sql)){
		if($result->num_rows) return 1;
		else return 0;
	}
	return 1;
}
function jest_juz_rez($connect, $imie, $nazwisko, $wiekU){
	$sql = "SELECT * FROM filRezyser WHERE rezImie = '$imie' AND rezNazwisko = '$nazwisko' AND rezDataUrodzenia = '$wiekU'";
	if($result = $connect->query($sql)){
		if($result->num_rows) return 1;
		else return 0;
	}
	return 1;
}
function jest_juz_gat($connect, $nazwa){
	$sql = "SELECT * FROM filGatunek WHERE gatNazwa = '$nazwa';";
	if($result = $connect->query($sql)){
		if($result->num_rows) return 1;
		else return 0;
	}
	return 1;
}
function send($connect, $sql){
	if($connect->query($sql)) echo '1';
	else echo '0';
}
?>