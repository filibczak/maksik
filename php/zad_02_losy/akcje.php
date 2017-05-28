<?php
session_start();
if(isset($_GET['op'])){
	$op = $_GET['op'];
	switch($op){
		case 'sprLiczbe':
			$ileoff = (int)$_SESSION['teakoff'];
			if($ileoff>=0){
				$ileoff--;
				$_SESSION['teakoff'] = $ileoff;
				echo sprLiczbe($_GET['losUser'],$ileoff);
			}else
				echo $ileoff;
			break;
		default:
			echo $op;
	}
}else{
	echo 'error17';
}

function sprLiczbe($losUser,$ileoff){
	$los = $_SESSION['los'];
	if($ileoff == 2){
		gamepp();
	}
	if ($los > $losUser){
		return 'malo';
	}else if ($los < $losUser){
		return 'duzo';
	}else if ($los == $losUser && $ileoff == 2){
		zaPier();
		return 'rownofirst';
	}else if ($los == $losUser){
		return 'rowno';
	}else{
		return $los.' - '.$losUser;
	}
}
function zaPier(){
	$where = 'first.txt';
	$first = (int)file_get_contents($where);
	if(is_writable($where) && $file = fopen($where, 'w')){
		if(flock($file, 2)){
			fwrite($file, $first+1);
			flock($file, 3);
		}
		fclose($file);
	}
}
function gamepp(){
	$where = 'games.txt';
	$games = (int)file_get_contents($where);
	if(is_writable($where) && $file = fopen($where, 'w')){
		if(flock($file, 2)){
			fwrite($file, $games+1);
			flock($file, 3);
		}
		fclose($file);
	}
}
?>