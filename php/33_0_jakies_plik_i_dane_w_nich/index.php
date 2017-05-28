<?php
echo '<pre>';
$where = array('dane_k.txt', 'wojew.txt', 'zain_wyk.txt');

$data[0] = file2array($where[0]); #print_r($data[0]);
$data[1] = file2array($where[1]);
$data[2] = file2array($where[2]);

$table[0] = array2table($data[0]);
$table[1] = array2table($data[1]);
$table[2] = array2table($data[2]);



function array2table($data){
	$first = true;
	$table = '<table border="1">';
	foreach ($data as $row) {
		#$row = trim(preg_replace('/\t+/', ' ', $row));
		$row = explode("\t", $row);
		array_pop($row);
		#print_r($row);
		$thtd = $first ? '<th>':'<td>';
		$sthtd = $first ? '</th>':'</td>';

		$table .= '<tr>';
		foreach ($row as $value) {
			$table .= $thtd.$value.$sthtd;
		}
		$table .= '</tr>';
		$first = false;
	}
	$table .= '</table>';

	return @$table;
}

function file2array($where){
	if(is_readable($where) && $handle = fopen($where, 'r')){
		while( ($data[] = fgets($handle)) !== false ){}
		fclose($handle);
	}

	#$array = array('1', '2', '4');
	return @$data;
}

echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>jakieś pliki i dane w nich</title>
</head>
<body>

<?php echo $table[0]; ?>
<?php echo $table[1]; ?>
<?php echo $table[2]; ?>

</body>
</html>