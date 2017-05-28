<?php
	requide_once('scripts.php');
	$connect = polacz_db();
	$sql = 'SELECT * FROM k_dane';
	if($result = $connect->query($sql)){
		while($row = $result->fetch_assoc()){

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>da</title>
</head>
<body>



</body>
</html>