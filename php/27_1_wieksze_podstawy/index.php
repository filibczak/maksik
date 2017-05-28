<?php
require_once('/home/d14.kukiz.krzysztof/public_html/script/scripts.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Auto-komis</title>
	<style>
		body{
			background-color: darkgrey;
			color: white;
		}
		fieldset{
			display: block;
			float: left;
			margin-left: 20px;
			margin-top: 20px;
			width: 300px;
			height: 220px;
			border: 3px solid WHITE;
			border-radius: 3px;
			box-shadow: 0 0 6px -2px black;
		}
		legend{
			font-weight: 900;
			padding: 2px 5px;
			border-radius: 3px;
			border: 1px solid WHITE;
			box-shadow: 0 0 6px -2px black;
			background-color: darkgrey;
		}
		img{
			float: left;
			width: 120px;
			border: 3px solid WHITE;
			border-radius: 3px;
			box-shadow: 0 0 6px -2px black;
			background-color: WHITE;
		}
		ul{
			float: right;
		}
		li{
			list-style-type: none;
		}
		.cena{
			float: right;
			width: 100%;
			text-align: right;
			font-size: 36px;
		}
		span{
			font-size: 1.1em;
			color: #ededed;
			font-weight: 900;
		}
	</style>
</head>
<body>
	<?php
	$connect = polacz_db('test');
	if($result = $connect->query("SELECT * FROM autoKomis")){
		while($row = $result->fetch_assoc()){// ids, marka, model, rocznik, typ, drzwi, silnik, pojemnosc, przebieg, cenas
			$marka = $row['marka'];
			if(	$marka == 'Syrena' 		||
				$marka == 'Warszawa' 	||
				$marka == 'Wo3ga' 		||
				$marka == 'Zastawa' 	||
				$marka == 'Chevrolet' 	||
				$marka == 'Daweoo' 		||
				$marka == 'Polonez'		){
				$img = 'marki/notFound.jpg';
			}else{
				$mk_dl = strlen($marka);
				for($i = 0; $i < $mk_dl; $i++){
					if($marka[$i] == ' ')
						$marka[$i] = '_';
				}
				$marka = strtolower($marka);
				$img = 'marki/'.$marka.'.gif';
			}
			echo '<fieldset><legend>'.$row['marka'].' '.$row['model'].'</legend>';
				echo '<img src="'.$img.'" alt="'.$img.'">';
				echo '<ul>';
					echo '<li>Rocznik:<span> '.$row['rocznik'].'</span></li>';
					echo '<li>Typ:<span> '.$row['typ'].'</span></li>';
					echo '<li>Liczba drzwi:<span> '.$row['drzwi'].'</span></li>';
					$silnik = $row['silnik'] == 'D' ? 'Diesle':'Benzyna';
					echo '<li>Silnik:<span> '.$silnik.'</span></li>';
					echo '<li>Pojemnosc:<span> '.$row['pojemnosc'].'</span></li>';
					echo '<li>Przebieg:<span> '.$row['przebieg'].'</span></li>';
				echo '</ul>';
				echo '<div class="cena">'.$row['cenas'].'zł</div>';
			echo '</fieldset>';
		}
	}
	?>

</body>
</html>