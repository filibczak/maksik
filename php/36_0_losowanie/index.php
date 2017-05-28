<?php
function losuj(){
	/*dane*/
	$od = (int)$_POST['od'];
	$do = (int)$_POST['doo'];
	if($od > $do){
		$max = $od;
		$min = $do;
	}else{
		$max = $do;
		$min = $od;
	}
	$ile = (int)$_POST['ile'];
	$czyParzyste = $_POST['parzyste'];
	if(isset($_POST['bezPowturzen']))
		$bezPowturzen = $_POST['bezPowturzen'];
	else
		$bezPowturzen = 'n';

	/*losuje*/
	for($i = 0; $i < $ile; $i++){
		$los = rand($min, $max);

		//czy parzyste
		if($czyParzyste == 'y' && $los%2!=0) $los++;
		if($czyParzyste == 'n' && $los%2!=1) $los++;
		//czy parzyste END

		//bezpowturzen
		if($bezPowturzen == 'y' && $i != 0){
			do{
				$nieMa = true;
				foreach ($losy as $value) {
					if($value == $los){
						$nieMa = false;
						$los = rand($min, $max);
						//czy parzyste
						if($czyParzyste == 'y' && $los%2!=0) $los++;
						if($czyParzyste == 'n' && $los%2!=1) $los++;
						//czy parzyste END
						break;
					}
				}
			}while(!$nieMa);
		}//bez powturzen END

		$losy[] = $los;
	}//for losy END
	$sLosy = '';
	$ile = count($losy);
	for($i = 0; $i< $ile; $i++){
		$sLosy .= $losy[$i];
		if($i != $ile-1) $sLosy .= ', ';
	}
	return $sLosy;
}//losuj() END

$where = "losy.txt";

if(isset($_GET['op'])){
	switch ($_GET['op']) {
		case 'losuj':
			$losy = losuj();
			if(is_writable($where) && $handle = fopen($where, 'a')){
				if(flock($handle, 2)){
					fwrite($handle, $losy.'||');
					flock($handle, 3);
				}
				fclose($handle);
			}
			break;
		
		default:
			# code...
			break;
	}
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>losy</title>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<style>
		
	body{
		background-color: grey;
		color: darkgrey;
	}

	</style>
	<script>
		$(function(){
			//losuje
			$('#losuj').submit(function(){
				var od = $('[name="od"]').val();
				var doo = $('[name="do"]').val();
				var ile = $('[name="ile"]').val();
				var parzyste = $('[name="czyparzyste"]:checked').val();
				var bezPowturzen = $('[name="bezPowturzen"]:checked').val();

				$.post('?op=losuj', {
					od: od,
					doo: doo,
					ile: ile,
					parzyste: parzyste,
					bezPowturzen: bezPowturzen
				}).done(function(data){
					alert(data);
				}).fail(function(){
					alert('nie wyslano :/');
				});

				return false;
			});//losuje END

			$('[name="bezPowturzen"]').change(function(){
					alert('nie');
				var od = parseInt($('[name="od"]').val());
				var doo = parseInt($('[name="do"]').val());
				var ile = parseInt($('[name="ile"]').val());
				var ruz = doo - od;
				if(ruz < 0) ruz *= -1;
				if(ile > ruz){
					alert('nie');
				}
			});

			function pokazLosyZPliku(){
				$.ajax({
					url: '?op=pokaz',
					success: function(){
						
					}
				});
			}

		});//jq END
	</script>
</head>
<body>

<form id="losuj">
	<fieldset>
		<legend>Losuj</legend>
		<p>
			<label for="od">Od <input type="number" name="od" value="0"></label>
			<label for="do">do <input type="number" name="do" value="100"></label>
		</p>
		<p>
			<label for="ile">Ile <input type="number" name="ile" value="10" min=0></label>
		</p>
		<p>
			<label for="oba"><input type="radio" name="czyparzyste" value="w" id="oba" checked>Oba</label>
			<label for="parzyste"><input type="radio" name="czyparzyste" value="y" id="parzyste">Parzyste</label>
			<label for="nieparzyste"><input type="radio" name="czyparzyste" value="n" id="nieparzyste">Nie parzyste</label>
		</p>
		<p>
			<label><input type="checkbox" name="bezPowturzen" value="y"> Bez powturzen</label>
		</p>
		<p>
			<input type="submit" value="Losuj">
		</p>
		</fieldset>
	</fieldset>
</form>

<fieldset>
	<legend>losy</legend>
</fieldset>

</body>
</html>
<?php } ?>