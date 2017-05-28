<?php 
require_once('../scripts.php');

$connect = polacz_db();

//statystyki
	//ile lat i urzydkownikuw na operatora
	$sql = 
		"SELECT 
		  DISTINCT(op_operator) operator,
		  SUM(op_ileLat) years,
		  COUNT(op_imie) users
		FROM op_operatorKom
		GROUP BY operator";
	if($result = $connect->query($sql)){
		echo '<table border="1">';
			echo '<tr>';
				echo '<th>Operator</th>';
				echo '<th>Ile użydkowników</th>';
				echo '<th>Ile lacznie lat</th>';
				echo '<th>Średnia lat na użytkownika</th>';
			echo '</tr>';
		while($row = $result->fetch_assoc()){
			$operator = int2operator($row['operator']);
			$users = $row['users'];
			$years = $row['years'];
			$avarge = (float)$years / (float)$users; // srednia lat na usera
			echo '<tr>';
			echo '<td>'.$operator.'</td>';
			echo '<td>'.$users.'</td>';
			echo '<td>'.$years.'</td>';
			echo '<td>'.$avarge.'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}//query end
	//ile lat i urzydkownikuw lacznie
	$sql = 
		"SELECT
		  count(DISTINCT(op_operator)) ile_op,
		  SUM(op_ileLat) years,
		  COUNT(op_imie) users
		FROM `op_operatorKom";
	if($result = $connect->query($sql)){
		echo '<table border="1">';
			echo '<tr>';
				echo '<th>Ile operatorow</th>';
				echo '<th>Łączna liczba userów</th>';
				echo '<th>Łączna liczba lat</th>';
				echo '<th>Średnia liczba userów</th>';
				echo '<th>Średnia liczba lat</th>';
			echo '</tr>';
		while($row = $result->fetch_assoc()){
			$ile_op = $row['ile_op'];
			$users = $row['users'];
			$yers = $row['years'];
			$avargr_U = (float)$users / (float)$ile_op;
			$avargr_Y = (float)$yers / (float)$ile_op;
			echo '<tr>';
				echo '<td>'.$ile_op.'</td>';
				echo '<td>'.$users.'</td>';
				echo '<td>'.$yers.'</td>';
				echo '<td>'.$avargr_U.'</td>';
				echo '<td>'.$avargr_Y.'</td>';
			echo '</tr>';
		}//pojedynczy rekord z db
		echo '</table>';
	}//query end
//wszystkie dane
$sql = "SELECT op_imie AS imie, op_ileLat AS lata, op_operator AS operator, op_IP AS ip, op_data AS data FROM op_operatorKom";
if($result = $connect->query($sql)){
	echo '<table border="1">';
		echo '<tr>';
			echo '<th>Imie</th>';
			echo '<th>Ile lat u operatora</th>';
			echo '<th>operator</th>';
			echo '<th>ip klienta</th>';
			echo '<th>data dodania</th>';
		echo '</tr>';
	while($row = $result->fetch_assoc()){
		echo '<tr>';
		$imie = $row['imie'];
		$lata = $row['lata'];
		$operator = int2operator($row['operator']);
		$ip = $row['ip'];
		$data = $row['data'];
			echo '<td>'.$imie.'</td>';
			echo '<td>'.$lata.'</td>';
			echo '<td>'.$operator.'</td>';
			echo '<td>'.$ip.'</td>';
			echo '<td>'.$data.'</td>';
		echo '<tr>';
	}//jedna wartosc w db END
	echo '</table>';
}//query end


function int2operator($op = 0){
	switch ($op) {
		case 1:
			$op = 'T-Mobile';
			break;
		case 2:
			$op = 'PLUS';
			break;
		case 3:
			$op = 'Play';
			break;
		case 4:
			$op = 'Orange';
			break;
		case 5:
			$op = 'njuMobile';
			break;
		case 6:
			$op = 'Heyah';
			break;
		default:
			$op = 'inne';
			break;
	}//switch END
	return $op;
}



?>