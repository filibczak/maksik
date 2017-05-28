<?php

	function koloruj_wyraz($zd){
		$zd = trim($zd);
		$zd_len = strlen($zd);
		$zd2 = '<span style="color:'.colorRand().'; font-size: 32px">';
		for($i = 0; $i < $zd_len; $i++){
		
			if($zd[$i] == ' ')
			{
				$zd2 .='</span> <span style="color:'.colorRand().'; font-size: 32px">';
			}
			else
			{
				$zd2 .= $zd[$i];
			}
		}
		$zd2 .= '</span>';
		return $zd2;
	}

	function colorRand(){
		$r = rand(0, 255);
		$g = rand(0, 255);
		$b = rand(0, 255);

		return 'rgb('.$r.', '.$g.', '.$b.')';
	}

	if(isset($_GET['zd'])){
		$zd = $_GET['zd'];
		echo koloruj_wyraz($zd);
	}else{
		echo 'noc ni ma';
	}

?>