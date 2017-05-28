<?php
$where = 'dane.txt';
if(is_readable($where)){
	$html = '';
	$content = file_get_contents($where);
	$content = explode('|', $content);
	array_pop($content);
	$dl = count($content);
	$lp = 1;
	$uczySie = 0;
	$pracuje = 0;
	$zaGranico = 0;


	$html .= '<table border="1">
	<tr>
		<td>lp.</td>
		<td>Uczy się</td>
		<td>Uczelnia</td>
		<td>Kierunek</td>
		<td>Pracuje</td>
		<td>Przebywa z a granicą</td>';
	for($i = 0; $i < $dl; $i++){
		switch ($i%5) {
			case 0:
				$html .= '</tr><tr><td>'.$lp++.'</td>';
				if($content[$i] != 'nie') $uczySie++;
				break;
			case 3:
				if($content[$i] == 'tak') $pracuje++;
				break;
			case 4:
				if($content[$i] == 'tak') $zaGranico++;
				break;
			
			default:
				break;
		}
		$html .= '<td>'.$content[$i].'</td>';
	}
	$html .= '</tr></table>';
	$html .= '<br>Uczy sie:'.$uczySie;
	$html .= '<br>Pracuje:'.$pracuje;
	$html .= '<br>Przebya za granica:'.$zaGranico;

}
?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<title>Absolwenci - dane</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     	google.load('visualization', '1.0', {'packages':['corechart']});
     	google.setOnLoadCallback(drawChart);
	  	function drawChart(){
     	//uczy sie
		      var data = new google.visualization.DataTable();
		      data.addColumn('string', 'Topping');
		      data.addColumn('number', 'Slices');
		      data.addRows([
		        ['Uczą sie', <?php echo $uczySie; ?>],
		        ['Nie uczą sie', <?php echo $dl/5 - $uczySie; ?>]
		      ]);

		      var options = {
		      	'title':'Ile osób się uczy',
             	'width':200,
             	'height':150,
             	colors: ['pink', 'grey']
             	};

		      var chart = new google.visualization.PieChart(document.getElementById('uczySie'));
		      chart.draw(data, options);

		//pracuje
		      var data2 = new google.visualization.DataTable();
		      data2.addColumn('string', 'Topping');
		      data2.addColumn('number', 'Slices');
		      data2.addRows([
		        ['Pracuje', <?php echo $pracuje; ?>],
		        ['Nie pracuje', <?php echo $dl/5 - $pracuje; ?>]
		      ]);

		      var options2 = {'title':'Ile osób pracuje',
             	'width':200,
             	'height':150,
             	colors: ['green', 'blue']
             	};

		      var chart2 = new google.visualization.PieChart(document.getElementById('pracuje'));
		      chart2.draw(data2, options2);

		//zaGranico
		      var data3 = new google.visualization.DataTable();
		      data3.addColumn('string', 'Topping');
		      data3.addColumn('number', 'Slices');
		      data3.addRows([
		        ['Za granicą', <?php echo $zaGranico; ?>],
		        ['Przed granicą', <?php echo $dl/5 - $zaGranico; ?>]
		      ]);

		      var options3 = {'title':'Ile osób przebywa za granicą',
             	'width':200,
             	'height':150,
             	colors: ['#888', '#444']
             	};

		      var chart3= new google.visualization.PieChart(document.getElementById('zaGranico'));
		      chart3.draw(data3, options3);
	    }
    </script>
    <style type="text/css">
    	.kolo{
    		float: left;
    	}
    </style>
</head>
<body>
<?php
echo $html;
?>
<br>
	<button><a href="index.php">Cofnij</a></button>
    <div id="uczySie" class="kolo" style="width:200; height:150"></div>
    <div id="pracuje" class="kolo" style="width:200; height:150"></div>
    <div id="zaGranico" class="kolo" style="width:200; height:150"></div>
</body>
</html>
