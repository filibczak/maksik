<?php 
require_once('../scripts.php');

if(	isset($_GET['imie'])		&&
	isset($_GET['operator'])	&&
	isset($_GET['ileLat'])		){

	$imie = $_GET['imie'];
	$operator = $_GET['operator'];
	$ileLat = $_GET['ileLat'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('Y-m-d');

	$connect = polacz_db();
	$sql = "SELECT * FROM op_operatorKom WHERE op_IP = '$ip'";
	if($result = $connect->query($sql)){
		if($result->num_rows > 0){//juz wyslano z tego ipecho 'to ip juz sie pojawiło';
				echo 'wyslano już dane z tego IP';
		}else{//jeszcze nie ma i zostanie dopisane
			echo $date.'<br>';
			$sql = "INSERT INTO op_operatorKom VALUES (NULL, '$imie', $operator, $ileLat, '$ip', '$date')";
			if($connect->query($sql)){
				echo 'wyslano dane';
			}else{
				echo 'nie wyslano';
			}
		}
	}

}
?>