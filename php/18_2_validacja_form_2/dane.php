<?php
/*
	echo '<pre>';
	print_r($_POST);
	echo '<pre>';
*/
	if( isset($_POST['imie'])		&&
		isset($_POST['nazwisko'])	&&		
		isset($_POST['wiek'])		&&
		isset($_POST['plec'])		&&
		isset($_POST['hobby'])		&&
		isset($_POST['opis'])		){

		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$plec = $_POST['plec'];
		$wiek = $_POST['wiek'];
		$hobby = $_POST['hobby'];
		$opis = $_POST['opis'];

		if(	preg_match('/^([a-zA-ZęóąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}$/', $imie)	&&
			preg_match('/^([a-zA-ZęóąśłżźćńĘ€ÓĄŚŁŻŹĆŃ]){1,20}$/', $nazwisko)	&&
			preg_match('/^([0-9]){1,3}$/', $wiek)	&&
			preg_match('/^([km])$/', $plec)	){
			/*dane sa poprawne*/
			$plec = $_POST['plec'] == 'm'?'Mężczyzna':'Kobieta';
		}else{
			/*dane nie sa poprawne*/
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
	</style>
</head>
<body>
	<h1>Dane dla <?php echo $imie.'a '.$nazwisko.'a: ' ?></h1>
	<ul>
		<li><h3>Wiek: <?php echo $wiek?> lat</h3></li>
		<li><h3>Płeć: <?php echo $plec?></h3></li>
		<li><h3>Hobby: </h3>
			<ul>
				<?php
					foreach ($hobby as $key => $value) {
						echo '<li>'.$value.'</li>';
					}
				?>
			</ul>
		</li>
		<li><h3>Opis:</h3><p><?php echo $opis ?></p></li>
	</ul>
	<a href="index.php">Come back</a>
</body>
</html>