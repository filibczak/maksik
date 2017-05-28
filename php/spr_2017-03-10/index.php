<?php
echo "<pre>";
/*
gr. b.
1. odczytaj plik 3i_programowanieAplikacji_pliki_grB.txt
2. zapisz w pliku minimum.txt nr rej auta, które dosta³o najmniejsze odszkodowanie za wypadek
3. wyswietl w postaci listy wypunktowanej numery rejestracyjne aut maj¹cych wypadek w kwietniu
4. utwórz zestawienie tabelaryczne wypadków dla poszczególnych lat
5. stwórz formularz pozwalaj¹cy sprawdziæ czy samochód o podanym nr rejestracyjnym mia³ wypadek
*/

$ILE_DANYCH = 500;

/*	zad 1	*/
$filename = 'dane.txt';
if(is_readable($filename) && $handle = fopen($filename, 'r')){
	while(($line = fgets($handle)) !== false){
		$line = explode(" ", $line);
		$data[$line[0]]= $line[1];
		$data2[$line[0]]= $line[1];
		$rejestracja[$line[0]] = $line[2];
		$piniondz[$line[0]] = (float)$line[3];
	}
	fclose($handle);
}

/*	zad 2	*/
asort($piniondz);
$rejestr_najmiejszego;
foreach ($piniondz as $key => $value) {
	$rejestr_najmiejszego = $key;
	break;
}

$filenameMin = 'minimum.txt';
if(is_writeable($filenameMin) && $handle = fopen($filenameMin, 'w')){
	if(flock($handle, 2)){
		fwrite($handle, $rejestracja[(string)$rejestr_najmiejszego]);
		flock($handle, 3);
	}
	fclose($handle);
}

/*	zad 3	*/
$lista = '';
foreach ($data as $key => $data) {
	$data = explode('-', $data);
	if($data[1] == '04' || $data[1] == '4' || $data[1] == 4){
		$rej = $rejestracja[$key];
		$lista .= "<li>$rej</li>";
	}
}

/*	zad 4	*/
asort($data);
foreach ($data2 as $key => $data) {
	$data = explode('-', $data);
	$rok = $data[0];
	#array_push($table[$rok], $rejestracja[$key]);
	$table[$rok][] = $rejestracja[$key];
}
$tableHTML = '';
foreach ($table as $key => $value) {
	$value = implode(', ', $value);
	$tableHTML .= "<tr><th>$key</th><td>$value</td></tr>";
}

/*	zad 5	*/
if( isset( $_GET['rej'] ) ){
	$rej = $_GET['rej'];
	if(array_search($rej, $rejestracja)){
		$kom = "jest";
	}else{
		$kom = 'nie ma';
	}
}

echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>spr</title>
</head>
<body>

<!-- zad 5 -->
<form action="?czy_wyp=1" method="get" accept-charset="utf-8">
<label>Rejestracja: <input type="text" name="rej"></label>
<input type="submit" value="Sprawć">
<?php echo "<label style='color: red'>".@$kom."</label>" ?>
</form>

<!-- zad 3 -->
<ul> <?php echo $lista; ?></ul>

<!-- zad 4 -->
<table border="1">
<?php echo $tableHTML; ?>
</table>

</body>
</html>