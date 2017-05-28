<?php
require_once('../scripts.php');
//zapytania
$sql[0] = "SELECT DISTINCT(rasa) Rasy FROM `psPsy` ORDER BY rasy ASC";
$sql[1] = "SELECT `imie` Imie, `nazwisko` Nazwisko, `nr telefonu` FROM `psOsoby` NATURAL JOIN psPsy WHERE wiek = 1";
$sql[2] = "SELECT (SELECT COUNT(`plec`) FROM psPsy WHERE `plec` = 'samica') Samice, (SELECT COUNT(`plec`) FROM psPsy WHERE `plec` = 'samiec') Samce FROM `psPsy` LIMIT 1";
$sql[3] = "SELECT DISTINCT(CONCAT_WS(' ', imie, nazwisko)) `Imie i Nazwisko`, COUNT(id_psa) Ile FROM `psPsy` NATURAL JOIN psOsoby GROUP BY CONCAT_WS(' ', imie, nazwisko) HAVING ile > 8";
$sql[4] = "SELECT DISTINCT(CONCAT_WS(' ', imie, nazwisko)) `Imie i Nazwisko`, SUM(`liczba zdobytych medali`) 'Ilość medali' FROM `psPsy` NATURAL JOIN psOsoby GROUP BY CONCAT_WS(' ', imie, nazwisko) ORDER BY `Imie i Nazwisko` DESC LIMIT 1";
$sql[5] = "SELECT COUNT(DISTINCT(id_osoby)) 'Ilość osub posiadające owczarki' FROM `psPsy` WHERE rasa LIKE '%owczarek%' ORDER BY id_osoby ASC";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="autor" charset="Krzysztof Kukiz">
	<title>Document</title>
	<link rel="stylesheet" href="screen.css">
</head>
<body>
<div id="box">
	
	<header id="logo">Logo</header>
	<section id="content">
		<nav id="menu">
			<ol>
			<?php
			if(isset($_GET['op'])){
				$op = (int)$_GET['op'];
				$tresc[0] = 'Lista Wsystkich ras';
				$tresc[1] = 'Imie, nazwisko, nr relefonu osub z rocznymi psami';
				$tresc[2] = 'liczba samców / samic';
				$tresc[3] = 'Osoby posiadajace wiecej niz 8 psów';
				$tresc[4] = 'Osoba z najwększą liczbą medali';
				$tresc[5] = 'Ile osób posiada owczarki';
				for($i = 0; $i < 6; $i++){
					if($op == $i){
						echo '<li><a href="?op='.$i.'" class="checked">'.$tresc[$i].'</a></li>';
					}else{
						echo '<li><a href="?op='.$i.'">'.$tresc[$i].'</a></li>';
					}
				}
			}else{
			?>
				<li><a href="?op=0">Lista Wsystkich ras</a></li>
				<li><a href="?op=1">Imie, nazwisko, nr relefonu osub z rocznymi psami</a></li>
				<li><a href="?op=2">liczba samców / samic</a></li>
				<li><a href="?op=3">Osoby posiadajace wiecej niz 8 psów</a></li>
				<li><a href="?op=4">Osoba z najwększą liczbą medali</a></li>
				<li><a href="?op=5">Ile osób posiada owczarki</a></li>
			</ol>
			<?php
			}
			?>
		</nav>
		<article id="tresc">
			<?php
			if(isset($_GET['op'])){
				$op = $_GET['op'];
				$array = sql2array($sql[$op]);
				$table = array2HTMLtable($array);
				echo $table;
			}
			?>
		</article>
	</section>
	<footer id="stopka">&copy; Krzysztof Kukiz IIIi</footer>
	
</div>
</body>
</html>