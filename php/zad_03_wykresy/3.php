<?php

/*wczytanie xml'a*/
$xmlfile = 'dane.xml';
$wykresy = simplexml_load_file($xmlfile);

echo '<pre>';
/*dane do wykresu 2*/
$daneWykres3 = '';
$dane = $wykresy->wykres[2];
$ile = count($dane);

for($i = 0; $i < $ile; $i++){
	$produkt 		= $dane->dane[$i]->produkt;
	$ilosc 	=	$dane->dane[$i]->ilosc;
	
	$daneWykres3 .= "['$produkt', $ilosc]";
	if($i < $ile-1) $daneWykres3 .= ', ';
}
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content="kkukiz">
	<title>Wykres 3</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		
		function drawChart(){
			
			var data = google.visualization.arrayToDataTable([
				['Produkt', 'Ilość'], <?php echo $daneWykres3; ?>
			]);
			
			var options = {
				title: 'Wykres 3',
				is3D: true,
			}
			
			var chart = new google.visualization.PieChart(document.getElementById('wyk3'));
			chart.draw(data, options);
		}
		
	</script>
</head>
<body>
	<div id="wyk3" style="width: 900px; height: 500px;"></div>
</body>
</html>