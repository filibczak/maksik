<?php
if(isset($_GET['op'])){
	require_once('../scripts.php');
			$connect = polacz_db();
	switch ($_GET['op']) {
		case 'send':
			$wiek = $_POST['wiek'];
			$plec = $_POST['plec'];
			$avg_placa = $_POST['avg_placa'];
			$sql = "INSERT INTO ankPlace VALUES(null, $wiek, '$plec', $avg_placa)";
			$connect->query($sql);
			break;

		case 'szczeg':

			if(	isset($_POST['plecK'])		&&	
				isset($_POST['plecM'])		&&	
				isset($_POST['wiek18'])		&&	
				isset($_POST['wiek1949'])	&&	
				isset($_POST['wiek50'])		){

				$plecK = $_POST['plecK'] ? "=":"!=";
				$plecM = $_POST['plecM'] ? "=":"!=";
				if($plecK == $plecM) $plecK = $plecM = "=";

				$wiek['18'] 	= $_POST['wiek18'] 		? "(wiek <= 18)"				:"";
				$wiek['1949'] 	= $_POST['wiek1949'] 	? "(wiek > 18 AND wiek < 50)"	:"";
				$wiek['50'] 	= $_POST['wiek50'] 		? "(wiek >= 50)"				:"";

				foreach ($wiek as $key => $val) {
					if(!empty($val)){
						$wiekG[] = $val;
					}
				}
				$ln = count(@$wiekG);
				$weikS = "";
				if($ln > 0){
					for($i = 0; $i < $ln; $i++){
						$weikS .= $wiekG[$i];
						if($i < $ln-1) $weikS .= " OR ";
					}
					$weikS = "AND ( ".$weikS." )";
				}


				//srednia hajs
				$select = "avg(avg_placa) avg";
				$sql = "SELECT $select FROM ankPlace WHERE (plec $plecK 'k' OR plec $plecM 'm') $weikS";
				if($result = $connect->query($sql)){
					$data = $result->fetch_assoc();
					$avg = $data['avg'];
				}

				//max hajs
				$select = "max(avg_placa) max";
				$sql = "SELECT $select FROM ankPlace WHERE (plec $plecK 'k' OR plec $plecM 'm') $weikS";
				if($result = $connect->query($sql)){
					$data = $result->fetch_assoc();
					$max = $data['max'];
				}

				//min hajs
				$select = "min(avg_placa) min";
				$sql = "SELECT $select FROM ankPlace WHERE (plec $plecK 'k' OR plec $plecM 'm') $weikS";
				if($result = $connect->query($sql)){
					$data = $result->fetch_assoc();
					$min = $data['min'];
				}
				//ile
				$select = "count(*) ile";
				$sql = "SELECT $select FROM ankPlace WHERE (plec $plecK 'k' OR plec $plecM 'm') $weikS";
				if($result = $connect->query($sql)){
					$data = $result->fetch_assoc();
					$ile = $data['ile'];
				}
			?>
			<strong>Zapytania like: </strong><span style="font-size: .6em"><?php echo "SELECT * FROM ankPlace WHERE (plec $plecK 'k' OR plec $plecM 'm') $weikS"; ?></span><br>
			<strong>Średnia</strong> <?php echo $avg; ?><br>
			<strong>Min</strong> <?php echo $min; ?><br>
			<strong>Max</strong> <?php echo $max; ?><br>
			<strong>Ile</strong> <?php echo $ile; ?><br>

			<?php

			}

			break;

		case 'wiek':
			$avg=''; $min=''; $max=''; $ile = 0;
			//ile
			$sql = "SELECT * FROM ankPlace";
			if($result = $connect->query($sql)){
				$ile = $result->num_rows;
			}
			//avg
			$sql = "SELECT avg(wiek) avg FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$avg = $data['avg'];
			}
			//min
			$sql = "SELECT min(wiek) min FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$min = $data['min'];
			}

			//min
			$sql = "SELECT max(wiek) max FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$max = $data['max'];
			}
			?>
			<strong>Średnia</strong> <?php echo $avg; ?><br>
			<strong>Min</strong> <?php echo $min; ?><br>
			<strong>Max</strong> <?php echo $max; ?><br>
			<strong>Ile</strong> <?php echo $ile; ?><br>

			<?php
			break;

		case 'plci':
			$avg=''; $min=''; $max=''; $ile = 0;
			//ile k
			$sql = "SELECT count(*) ile FROM ankPlace WHERE plec = 'k'";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$ileK = $data['ile'];
			}
			//ile m
			$sql = "SELECT count(*) ile FROM ankPlace WHERE plec = 'm'";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$ileM = $data['ile'];
			}
			?>
			<strong>Ilość kobiet</strong> <?php echo $ileK; ?><br>
			<strong>Ilość menrzczyzn</strong> <?php echo $ileM; ?><br>

			<?php
			break;

		case 'placa':
			$avg=''; $min=''; $max=''; $ile = 0;
			//ile
			$sql = "SELECT * FROM ankPlace";
			if($result = $connect->query($sql)){
				$ile = $result->num_rows;
			}
			//avg
			$sql = "SELECT avg(avg_placa) avg FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$avg = $data['avg'];
			}
			//min
			$sql = "SELECT min(avg_placa) min FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$min = $data['min'];
			}

			//min
			$sql = "SELECT max(avg_placa) max FROM ankPlace";
			if($result = $connect->query($sql)){
				$data = $result->fetch_assoc();
				$max = $data['max'];
			}
			?>
			<strong>Średnia</strong> <?php echo $avg; ?><br>
			<strong>Min</strong> <?php echo $min; ?><br>
			<strong>Max</strong> <?php echo $max; ?><br>
			<strong>Ile</strong> <?php echo $ile; ?><br>

			<?php
			break;
	}
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ankieta place</title>
	<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<style>
		body{
			background-color: grey;
			color: white;
		}
		fieldset{
			margin: 0 auto;
			margin-bottom: 15px;
			background-color: darkgrey;
			border: 2px solid black;
			width: 400px;
		}
		legend{
			background-color: darkgrey;
			border: 2px solid black;
			padding: 5px 15px;
		}
		li{
			cursor: pointer;
		}
		li:hover{
			color: red;
		}
		#szczegulyPlac{
			display: none;
		}
	</style>
	<script>
		$(function(){
			$('#dane').submit(function(){
				var wiek = $('[name="wiek"]').val();
				var plec = $('[name="plec"]:checked').val();
				var avg_placa = $('[name="avg-placa"]').val();
				$.post('?op=send', {
					wiek: wiek,
					plec: plec,
					avg_placa: avg_placa
				});//ajax END
				return false;
			});//ankieta send EDN


			//anSczeg
			$('#anSczeg').click(function(){
				$('#szczegulyPlac').css('display', 'block');
				szczeg();
			});//anSczeg END

			//anWieku
			$('#anWieku').click(function(){
				howaj();
				$.post('?op=wiek').done(function(data){
					$('#result').html(data);
				});
			});//anWieku END

			//anPlci
			$('#anPlci').click(function(){
				howaj();
				$.post('?op=plci').done(function(data){
					$('#result').html(data);
				});
			});//anPlci END

			//anPlaca
			$('#anPlaca').click(function(){
				howaj();
				$.post('?op=placa').done(function(data){
					$('#result').html(data);
				});
			});//anPlaca END

			//szczeg
			$('#szczegulyPlac').submit(function(){
				szczeg();
				return false;
			}).change(function(){
				szczeg();
			});//szczeg END

		});//jq END

		function szczeg(){
				//plec
				var plecK		= $('#plecK').is(':checked') ? 1:0;
				var plecM		= $('#plecM').is(':checked') ? 1:0;
				//wiek
				var wiek18		= $('#wiek18').is(':checked') ? 1:0;
				var wiek1949	= $('#wiek1949').is(':checked') ? 1:0;
				var wiek50		= $('#wiek50').is(':checked') ? 1:0;

				$.post('?op=szczeg',{
					plecK: 		plecK,
					plecM: 		plecM,
					wiek18: 	wiek18,
					wiek1949: 	wiek1949,
					wiek50: 	wiek50
				}).done(function(data){
					$('#result').html(data);
				});
		}

		function howaj(){
			$('#szczegulyPlac').css('display', 'none');
		}
	</script>
</head>
<body>

	<form id="dane">
	<fieldset>
		<legend>dane</legend>
		<p><label for="wiek">Wiek:<input type="number" min="1" name="wiek" value="18"></label></p>
		<p>
			<label for="m"><input type="radio" id="m" name="plec" value="m" checked>Męrzczyzna</label>
			<label for="k"><input type="radio" id="k" name="plec" value="k">Kobieta	</label>
		</p>
		<p><label for="avg-placa">Średnia płaca<input type="number" min="0" name="avg-placa" value="2500">(zł)</label></p>
		<p>
			<input type="submit" value="Wyslij">
			<input type="reset" value="Resetuj">
		</p>
	</fieldset>
	</form>

	<fieldset>
		<legend>Analiza</legend>
		<ul>
			<li id="anSczeg">Szczegółowa płac</li>
			<li id="anWieku">Wieku</li>
			<li id="anPlci">Płci</li>
			<li id="anPlaca">Płac</li>
		</ul>
	</fieldset>

	<fieldset>
		<legend>Wynik analizy</legend>
		<form id="szczegulyPlac" action="?op=szeguly" method="POST">
			<p>
				<strong>Płeć: </strong>
				<label for="plecK"><input id="plecK" type="checkbox"> Kobieta</label>
				<label for="plecM"><input id="plecM" type="checkbox"> Menrzcyzna</label>
			</p>
			<p>
				<strong>Wiek: </strong>
				<label for="wiek18"><input id="wiek18" type="checkbox">Do 18</label>
				<label for="wiek1949"><input id="wiek1949" type="checkbox">Od 19 do 49</label>
				<label for="wiek50"><input id="wiek50" type="checkbox">Powyrzej 50</label>
			</p>
			<!--<input type="submit" value="Podgląd">-->
			<hr>
		</form>
		<p id="result"></p>
	</fieldset>

</body>
</html>
<?php } ?>