<?php
echo '<pre>';
require_once('../scripts.ini');
//$licznik = licznik();

if(isset($_GET['op'])){
	switch ($_GET['op']) {
		case 1:
			$array = sql2array("SELECT * FROM `k_dane`");
			break;
		case 2:
			$array = sql2array("SELECT DISTINCT(imie) AS 'Imię' FROM k_dane ORDER BY imie ASC");
			break;
		case 3:
			$array = sql2array("SELECT * FROM `k_dane` WHERE right(imie, 1) = 'a' AND wiek BETWEEN 30 AND 40 ORDER BY wiek ASC");
			break;
		case 4:
			$array = sql2array("SELECT * FROM `k_dane` NATURAL JOIN k_zaint WHERE zainteresowania = 'sport'");
			break;
		case 5:
			$array = sql2array("SELECT * FROM `k_dane` WHERE wzrost > 180");
			break;
		
		default:
			break;
	}
	$html = array2HTMLtable($array, 'tabele');
}

echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style>
	#menu{
		width: 100%;
		height: 50px;
		background-color: green;	
	}
	#menu > a{
		display: block;
		float: left;
		font-size: 1.2em;
		text-decoration: none;
		margin-left: 20px;
		margin-top: 14px;
		color: black;
	}
	#menu > a:hover{
		color: darkgreen;
	}
	.tabele{
		float: left;
		margin: 5px;
		border-collapse: collapse;
	}
	.tabele th,
	.tabele td{
		box-sizing: border-box;
		padding: 5px;
		text-align: center;
		padding: 10px;
	}
	.tabele >  thead > tr{
		background-color: grey;
	}
	.tabele >  tbody > tr{
		position: relative;
		
		background-color: darkgrey;
	}
	.tabele >  tbody > tr:nth-child(2n){
		background-color: lightgrey;
	}
</style>
<body>
	<div id="menu">
		<a href="?op=1">Pokaz wszystko</a>
		<a href="?op=2">Nie powtarzalne się imiona</a>
		<a href="?op=3">k 30-40</a>
		<a href="?op=4">eSport</a>
		<a href="?op=5">Osoby wyszsze niż 180</a>
	</div>
	<?php echo @$html ?>
</body>
</html>