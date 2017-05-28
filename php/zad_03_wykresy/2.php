<?php

/*wczytanie xml'a*/
$xmlfile = 'dane.xml';
$wykresy = simplexml_load_file($xmlfile);

/*dane do wykresu 2*/
$daneWykres2 = '';
$dane = $wykresy->wykres[1];
$ile = count($dane);
for($i = 0; $i < $ile; $i++){
	$kierunek 		= $dane->dane[$i]->kierunek;
	$r2001 	=	$dane->dane[$i]->r2001;
	$r2002 	=	$dane->dane[$i]->r2002;
	
	$daneWykres2 .= "['$kierunek', $r2001, $r2002]";
	if($i < $ile-1) $daneWykres2 .= ', ';
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content="kkukiz">
	<title>Wykres 2</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawChart);
		
		function drawChart(){
			
			var data = google.visualization.arrayToDataTable([
				['kierunek', '2001', '2002'], <?php echo $daneWykres2; ?>
			]);

        var options = {
          chart: {
            title: 'Wykres 2',
          }
        };
        var chart = new google.charts.Bar(document.getElementById('wyk2'));
        chart.draw(data, options);
			
		}
	</script>
</head>
<body>
	<div id="wyk2" style="width: 900px; height: 500px;"></div>
</body>
</html>