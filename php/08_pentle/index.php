<?php
	//$sec = date('s');
	if(isset($_GET['liczba']) && is_numeric($_GET['liczba'])){
		$liczba = $_GET['liczba'];
	}else{
		$liczba = date('s');
	}
?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<?php echo '<meta charset="utf-8">' ?>
		<title>elo</title>
		<style>
			.nieparzyste{
				background-color: red;
				color: blue;
			}
			.parzyste{
				background-color: blue;
				color: red;
			}
		</style>
	</head>
	<body>
		<p>
			<?php
				/*
				//wypisuje od aktualnej sekundy do 0
				for($i = (int)$sec; $i >= 0; $i--){
					echo $i.'<br>';
				}
				*/
				/*
				//losuje tyle liczb ile jest sekund
				for($i = 0; $i < $liczba; $i++){
					$los = rand(0,50);
					if($los%2){//nie parzyste
						echo '<span class="nieparzyste">';
					}else{//parzyste
						echo '<span class="parzyste">';
					}
					echo $los.', ';
					echo '</span>';
				}
				*/
				/*
				$index = 0;
				do{
					$los = rand(0,50);
					echo $los.', ';
					$index++;
				}while($los!=13);
				echo '<br>"13" wylosowało się za '.$index.' razem.<br>';
*/
/*
				$licz = 0;
				for($i = 0; $i < 100; $i++){
					do{
						$los = rand(0,50);
						$licz++;
					}while($los != 13);
				}
				$srednia = $licz/100;
				echo 'w stó losowaniach liczba "13" srednio losuje sie za '.$srednia.' razem.';
				*/

				$los = 0;
				$index = 0;
				while($los!=13){
					$los = rand(0,50);
					$index++;
				}
				echo '<br>"13" wylosowało się za '.$index.' razem.<br>';

			?>
		</p>
		<p>
		</p>
	</body>
</html>