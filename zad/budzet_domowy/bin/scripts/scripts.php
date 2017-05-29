<?php
require_once('../../../../php/scripts.php');
foreach($_POST as &$p) $p = filtruj($p);
if(isset($_POST['op'])){
	switch($_POST['op']){
		case 'val_update':			val_update($_POST);				break;
		case 'name_update':			name_update($_POST);			break;
		case 'cat_name_update':	cat_name_update($_POST);	break;
		case 'add_chil':				add_chil($_POST);					break;
		case 'add_cat':					add_cat($_POST);					break;
	}
}

function val_update($p){
	print_r($p);
	if($p['pw']=='p'){
		$tabela = 'bd_chil_przy';
		$recordW = 'chil_przy_id';
	}else{
		$tabela = 'bd_chil_wyd';
		$recordW = 'chil_wyd_id';
	}
	$id = $p['id'];
	$val = $p['val'];
	$sql = "UPDATE $tabela SET value = '$val' WHERE $recordW = $id;";
	echo $sql;
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}//val_update END

function name_update($p){
	print_r($p);
	if($p['pw']=='p'){
		$tabela = 'bd_chil_przy';
		$recordW = 'chil_przy_id';
	}else{
		$tabela = 'bd_chil_wyd';
		$recordW = 'chil_wyd_id';
	}
	$id = $p['id'];
	$name = $p['name'];
	$sql = "UPDATE $tabela SET name = '$name' WHERE $recordW = $id;";
	echo $sql;
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}//name_update END

function cat_name_update($p){
	print_r($p);
	if($p['pw']=='p'){
		$tabela = 'bd_cat_przy';
		$recordU = 'cat_przy_name';
		$recordW = 'cat_przy_id';
	}else{
		$tabela = 'bd_cat_wyd';
		$recordU = 'cat_wyd_name';
		$recordW = 'cat_wyd_id';
	}
	$id = $p['id'];
	$name = $p['name'];
	$sql = "UPDATE $tabela SET $recordU = '$name' WHERE $recordW = $id";
	echo $sql;
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}//cat_name_update END

function add_chil($p){
	print_r($p);
	if($p['pw']=='p'){
		$tabela = 'bd_chil_przy';
	}else{
		$tabela = 'bd_chil_wyd';
	}
	$id = $p['id'];
	$sql = "INSERT INTO $tabela VALUES(null, '$id', 'Nowa wartość', '100')";
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}

function add_cat($p){
	print_r($p);
	if($p['pw']=='p'){
		$tabela = 'bd_cat_przy';
	}else{
		$tabela = 'bd_cat_wyd';
	}
	$sql = "INSERT INTO $tabela VALUES(null, 'Nowa kategorja')";
	if($connect = polacz_db()){
		if(!$connect->query($sql)) echo 'błąd w wysyłaniu do bazy';
	}else echo 'błąd połączenia z bazą';
}	
	
?>