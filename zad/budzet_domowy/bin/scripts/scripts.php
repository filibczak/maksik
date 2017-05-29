<?php
require_once('../../../../php/scripts.php');
foreach($_POST as &$p) $p = filtruj($p);
if(isset($_POST['op'])){
	switch($_POST['op']){
		case 'val_update':	val_update($_POST);		break;
		case 'name_update':	name_update($_POST);	break;
	}
}

function name_update($p){
	print_r($p);
	$tabela = $p['pw']=='p'?"bd_chil_przy":"bd_chil_wyd";
	$id = $p['id'];
	$name = $p['name'];
	$sql = "UPDATE $tabela SET name = '$name' WHERE chil_przy_id = $id;";
	echo $sql;
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}//name_update END

function val_update($p){
	print_r($p);
	$tabela = $p['pw']=='p'?"bd_chil_przy":"bd_chil_wyd";
	$id = $p['id'];
	$val = $p['val'];
	$sql = "UPDATE $tabela SET value = '$val' WHERE chil_przy_id = $id;";
	echo $sql;
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}//val_update END
?>