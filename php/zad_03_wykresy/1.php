<?php

/*wczytanie xml'a*/
$xmlfile = 'dane.xml';
$wykresy = simplexml_load_file($xmlfile);

/*dane do wykresu 1*/
$daneWykres1 = '';
$dane = $wykresy->wykres[0];
$ile = count($dane);
for($i = 0; $i < $ile; $i++){
	$data 		= $dane->dane[$i]->data;
	$wartosc 	=	$dane->dane[$i]->wartosc;
	
	$daneWykres1 .= "['$data', $wartosc]";
	if($i < $ile-1) $daneWykres1 .= ', ';
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content="kkukiz">
	<title>Wykres 1</title>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script>
		google.load('visualization', '1.0', {'packages':['corechart']});
		google.setOnLoadCallback(drawChart);
		
		function drawChart(){
			
			var data = google.visualization.arrayToDataTable([
				['Data', 'Wartość'], <?php echo $daneWykres1; ?>
			]);
			
			var options = {
				title:	'Wykres 1',
				curveType: 'function',
				legend: { position: 'right' }
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('wyk1'));
			chart.draw(data, options);
			
		}
	</script>
</head>
<body>
	<div id="wyk1" style="width: 900px; height: 500px;"></div>
</body>
</html>