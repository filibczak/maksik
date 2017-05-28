<?php
require_once('../scripts.php');
if(isset($_GET['op'])){
	$connect = polacz_db();
	switch ($_GET['op']) {
		case 'wyslij':

			print_r($_POST);
			foreach ($_POST as &$value){
				$value = filtruj($value);
			}
			$wiek = $_POST['wiek'];
			$miejscowosc = $_POST['miejscowosc'];
			$plec = $_POST['plec'];
			$ileKs = $_POST['ileKs'];

			$sql = "INSERT INTO ankieta_ksiazki VALUES (NULL, $wiek, $miejscowosc, $plec, $ileKs)";
			$connect->query($sql);
			break;
		case 'pokWynik':
			$sql = "SELECT * FROM ankieta_ksiazki";
			$result = $connect->query($sql);
			$ile = $result->num_rows;
			$wiek_name = array("5-10", "11-15", "16-20", "21-30", "31-40", "41-50", "Powyzej 5-0");
			$data = '';
			for($i = 0; $i < 7; $i++){
				$wiek_nr = $i+1;
				$sql = "SELECT  COUNT(id) ile FROM `ankieta_ksiazki` WHERE plec = 2 AND wiek = $wiek_nr";
				$result = $connect->query($sql);
				$m = (int)$result->fetch_assoc()['ile'];
				$sql = "SELECT  COUNT(id) ile FROM `ankieta_ksiazki` WHERE plec = 1 AND wiek = $wiek_nr";
				$result = $connect->query($sql);
				$k = (int)$result->fetch_assoc()['ile'];

				$data .= "['".$wiek_name[$i]."', $m, $k]";
				if($i<7-1) $data .= ',';
			}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>da</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar', 'corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Wiek', 'Mężczyzni', 'kobiety'],
          <?php echo $data; ?>
        ]);

        var options = {
          chart: {
            title: 'Płci w wieku',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
	<h1>Wynik ankiety</h1>
	<p>ankietowanych: <?php echo $ile; ?></p>
	<h2>dane</h2>
	<div id="columnchart_material" style="width: 900px; height: 500px;"></div>
	<div id="piechart" style="width: 900px; height: 500px;"></div>
	<h3><a href="?">Cofnij</a></h3>
</body>
</html>

<?php
			break;

		default:
			# code...
			break;
	}

}else{
?>
<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<title>da</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
		
		$(function(){
			$('#form').submit(function(){
				var wiek = $('select[name=wiek]').val();
				var miejscowosc = $('input[name=miejscowosc]:checked').val();
				var plec = $('input[name=plec]:checked').val();
				var ileKs = $('select[name=ilosc]').val();
				$.post("?op=wyslij",{
					wiek: wiek,
					miejscowosc: miejscowosc,
					plec: plec,
					ileKs: ileKs
				}).done(function(data){
					alert(data);
				});
				return false;
			});//end submit
		})

	</script>

	<style type="text/css">
        
		body {
			background-color: #e8eddf;
		}
		fieldset {

			border: 1px solid brown;
			padding: 10px;
		}
		legend {
			padding: 5px;
			color: brown;
			background-color: #e8eddf;
			border: 1px solid brown;
			width: 450px;
			font-weight: bold;
			text-shadow: 1px 2px 3px #fff;
		}
		label {
			display: block;
			color: brown;
			font-weight: bold;
			text-shadow: 1px 2px 3px #fff;
		}
		li {
			padding: 3px 10px 3px 30px;
		}
		h3 {
			background-color: #a8ad8f;
		}
    </style>
	<script>

	</script>
</head>
<body>
<div style="margin: 0 auto; width: 600px;">
<fieldset><legend>BADANIA ANKIETOWE</legend>
	<form id="form">
		<p><label for="wiek">Wiek</label>
		 <select name="wiek">
				<option value="1">5 - 10</option>
				<option value="2">11 - 15</option>
				<option value="3">16 - 20</option>
				<option value="4">21 - 30</option>
				<option value="5">31 - 40</option>
				<option value="6">41 - 50</option>
				<option value="7">powyżej 50</option>
			</select>
		</p>
		<p><label for="miejscowosc">Miejscowość</label>
			<input type="radio" class="formularz" name="miejscowosc" value="1" checked="checked" /> miasto&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" class="formularz" name="miejscowosc" value="2" /> wieś</p>
		</p>
		<p><label for="plec">Płeć</label>
			<input type="radio" class="formularz" name="plec" value="1" checked="checked" /> kobieta&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" class="formularz" name="plec" value="2" /> mężczyzna
		</p>
		<p><label for="ilosc">Ilość książek przeczytanych w miesiącu</label> <select name="ilosc">
				<option value="1">0</option>
				<option value="2">1</option>
				<option value="3">2</option>
				<option value="4">więcej niż 2</option>
			</select>
		</p>

   
   <p style="text-align: center;">
        <input type="submit" value="OK" name="akcja">   &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Kasuj">   &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?op=pokWynik">Pokaż wyniki</a>   &nbsp;&nbsp;&nbsp;&nbsp;
   </p>
</form>
</fieldset>

</div>

</body>
</html>
<?php } ?>