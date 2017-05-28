<?php
require_once('/home/d14.kukiz.krzysztof/public_html/script/scripts.php');
?>
<p style="text-align: justify">
	<?php
	$lacz = polacz_db('test');
	if($result = $lacz -> query("SELECT imie FROM imiona WHERE imie LIKE 'e%' ORDER BY imie ASC")){
		while($row = $result->fetch_assoc()){
			echo $row['imie'].', ';
		}
		$result->close();
	}
	$lacz->close();
	?>
</p>