<?php
	
	/*wyraz na odwrut*/
	if(isset($_GET['wyraz'])){
		$wyraz = $_GET['wyraz'];
	}else{
		$wyraz = 'wyraz';
	}
	$wyraz = (string)$wyraz;

	$wyraz_dl = strlen($wyraz);
	$wyraz2 = '';
	//$wyraz2 = (string)$wyraz2;
	$index = 0;
	for($i = $wyraz_dl-1; $i >= 0; $i--){
		$wyraz2 .= $wyraz[$i];
	}

	/*losuje jesli rozune od 13*/
		do{
			$los = rand(0,50);
			echo $wyraz2.' | wylosowana liczba: '.$los.'<br>';
		}while($los != 13)
	

?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title>elo</title>
	</head>
	<body>
			<p><?php //echo $wyraz2; ?></p>
	</body>
</html>