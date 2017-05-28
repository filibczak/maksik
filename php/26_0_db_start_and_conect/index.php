<?php
require_once('../connect.php');
?>
<table border="1">
	<tr>
		<th>ID pracownika</th>
		<th>Imie</th>
		<th>Nazwisko</th>
		<th>Data zatrudnienia</th>
		<th>Dział</th>
		<th>Stanowisko</th>
		<th>Pensja</th>
		<th>Nadgodziny</th>
		<th>Numer miejsca</th>
		<th>Numer Telefonu</th>
	</tr>
	<?php
	$lacz = polacz_db('test');
	if($result = $lacz -> query("SELECT * FROM samPRACOWNICY")){//wykonano zapytanie
		while($row = $result->fetch_assoc()){
			echo '<tr>';
				echo '<th>'.$row['NR_PRACOWNIKA'].'</th>';
				echo '<td>'.$row['IMIE'].'</td>';
				echo '<td>'.$row['NAZWISKO'].'</td>';
				echo '<td>'.$row['DATA_ZATR'].'</td>';
				echo '<td>'.$row['DZIAL'].'</td>';
				echo '<td>'.$row['STANOWISKO'].'</td>';
				echo '<td>'.$row['PENSJA'].'</td>';
				echo '<td>'.$row['DODATEK'].'</td>';
				echo '<td>'.$row['NR_MIEJSCA'].'</td>';
				echo '<td>'.$row['NR_TELEFONU'].'</td>';
			echo '</tr>';
		}
		$result->close();
	}
	$lacz->close();
	?>
</table>