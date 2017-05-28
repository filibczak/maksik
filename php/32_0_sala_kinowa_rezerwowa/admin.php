<?php
echo '<pre>';
$miejsce_id = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
$table = '';

$xml = simplexml_load_file('dane.xml');
$ileSal = count($xml);
for($i = 0; $i < $ileSal; $i++){
	$table .= '<table class="sala">';
		$table .= '<a name="sala_'.$i.'"></a>';
		$table .= '<thead>';
			$table .= '<tr style="background-color: green !important; color: black !important;"><th colspan="6">Sala '.($i+1).'</th></tr>';
			$table .= '<tr>';
				$table .= '<th>Numer rezerwacji</th>';
				$table .= '<th>Imie</th>';
				$table .= '<th>Nazwisko</th>';
				$table .= '<th>E-mail</th>';
				$table .= '<th>Miejsca</th>';
				$table .= '<th>Opcje</th>';
			$table .= '</tr>';
		$table .= '</thead>';
		$table .= '<tbody>';

			$ileRezerwacji = count($xml->sala[$i]) - 1;
			for($j = 0; $j < $ileRezerwacji; $j++){
				$rezerwacja = $xml->sala[$i]->rezerwacja[$j];
				$table .= '<tr>';
					$table .= '<td>'.($rezerwacja->nr_rezerwacji).'</td>';
					$table .= '<td>'.($rezerwacja->imie).'</td>';
					$table .= '<td>'.($rezerwacja->nazwisko).'</td>';
					$table .= '<td>'.($rezerwacja->email).'</td>';
					$table .= '<td>';
					foreach ($rezerwacja->miejsce as $miejsce){
						$rzad = (int)$miejsce->rzad;
						$nr = $miejsce->miejsce_nr;

						$table .= '<div>';
							$table .= $miejsce_id[$rzad].' '.($nr+1);
						$table .= '</div>';
					}
					$table .= '</td>';
					$table .= '<td class="opcjie"></td>';
				$table .= '</tr>';
			}

		$table .= '</tbody>';
	$table .= '</table>';
}

echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>kino - Admin</title>
	<link rel="stylesheet" href="screen3.css">
</head>
<body>
<div id="box">
	<?php echo $table; ?>
	<nav id="menu">
		<a href="#sala_0">sala 1</a>
		<a href="#sala_1">sala 2</a>
		<a href="#sala_2">sala 3</a>
		<a href="#sala_3">sala 4</a>
	</nav>
</div>
</body>
</html>