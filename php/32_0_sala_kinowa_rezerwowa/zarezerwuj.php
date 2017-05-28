<?php
$miejsce_id = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
if(isset($_POST['miejsca']) && isset($_POST['sala'])){
	$miejsca2 = $miejsca = $_POST['miejsca'];
	$sala = (int)$_POST['sala'];
}else header('Location: index.php');
echo '<pre>';
print_r($_POST);
echo '</pre>';



$miejsca = explode(' [] ', $miejsca);
array_pop($miejsca);
$miejsca_html = '';
foreach($miejsca as $miejsce){
	$miejsce = explode('.', $miejsce);
	
	$miejsca_html .= '<div class="miejsce '.spr_czy_zajete($sala, $miejsce[0], $miejsce[1]).'">';
		$miejsca_html .= '<span class="rzad">Rząd: '.$miejsce_id[$miejsce[0]].'</span>';
		$miejsca_html .= '<span class="nr">Miejsce: '.($miejsce[1]+1).'</span>';
	$miejsca_html .= '</div>';
}

function spr_czy_zajete($sala, $rzad, $nr){
	$xml = simplexml_load_file('dane.xml');
	foreach($xml->sala[$sala] as $rezerwacja){
		foreach($rezerwacja->miejsce as $miejsce){
			if(
				$miejsce->rzad 				== $rzad 	&&
				$miejsce->miejsce_nr	== $nr 		){
				//----
				return ' zajete';
			}
		}
	}
	return ' wolne';
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>kino</title>
	<link rel="stylesheet" href="screen2.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

	<form action="dodaj.php" method="post">
	
		<?php echo $miejsca_html; ?>
		
		<div style="clear: both"></div>
		<label for="imie">
			<span>Imie:</span>
			<input type="text" name="imie" required>
		</label>
		
		<label for="nazwisko">
			<span>nazwisko:</span>
			<input type="text" name="nazwisko" required>
		</label>
		
		<label for="email">
			<span>e-mail:</span>
			<input type="text" name="email" required>
		</label>
		
		<input type="text" name="miejsca" hidden value="<?php echo $miejsca2; ?>">
		<input type="text" name="sala" value="<?php echo $sala; ?>" hidden>
		
		<input type="submit" value="Potwierdź">
		
	</form>

</body>
</html>