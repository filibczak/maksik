<?php
	
	$liczba = rand(0,255);
	if($liczba%2){	//NIE parzysta
		echo 'Liczba '.$liczba.' nie jest parzysta';
	}else{	//parzysta
		echo 'Liczba '.$liczba.' jest parzysta';
	}

	$red = rand(0,255);
	$green = rand(0,255);
	$blue = rand(0,255);
	$rgb = $red.', '.$green.', '.$blue;


?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<?php echo '<meta charset="utf-8">' ?>
		<title>elo</title>
		<style>
			body{
				background-color: rgb( <?php echo $rgb; ?> );
			}
		</style>
	</head>
	<body>
	</body>
</html>