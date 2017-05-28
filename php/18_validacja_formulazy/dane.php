<?php
	session_start();
	if( isset($_POST['imie'])		&&
		isset($_POST['nazwisko'])	&&
		isset($_POST['plec'])		){

		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$plec = $_POST['plec'];
		if(	preg_match('/^([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}$/', $imie)	&&
			preg_match('/^([a-zA-Zę€óąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}$/', $nazwisko)	&&
			preg_match('/^([km])$/', $plec)	){
			/*dane sa poprawne*/
			$plec = $_POST['plec'] == 'm'?'Mężczyzna':'Kobieta';
		}else{
			/*dane nie sa poprawne*/
			$_SESSION['error'] = 'błąd w danych, spróbuj jescze raz';
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}
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
		a{
			color: white;
		}
		h1,
		p{
			text-align: left;
		}
	</style>
</head>
<body>
	<h1>Twoje Dane: </h1>
	<ul>
		<li>Imię: <?php echo $imie ?></li>
		<li>Nazwisko: <?php echo $nazwisko ?></li>
		<li>Płeć: <?php echo $plec ?></li>
	</ul>
	<a href="index.php">Come back</a>
</body>
</html>