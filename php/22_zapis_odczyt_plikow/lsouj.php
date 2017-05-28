<?php

	if(isset($_GET['ile'])){
		$ile = $_GET['ile'];
	}else
		$ile = 15;

	for($i = 0; $i < $ile; $i++){
		$los[$i] = rand(0,255);
		echo $los[$i].' ';
	}
	$fileName = 'losy';
	if(is_writable($fileName) && $file = fopen($fileName, 'a+')){
		if(flock($file, LOCK_EX)){
			$los = implode(', ', $los);
			fwrite($file, $los.' | ');
			flock($file, LOCK_UN);
		}else
			echo 'nie zapisano';
	}else
		echo 'nie otworzono';

	echo '<br><br>';
	if(isset($_GET['all'])){
		if(file_exists($fileName)){
			$fileContent = file_get_contents($fileName);
			$losowania = explode(' | ', $fileContent);
			$i = 1;

			foreach ($losowania as $key => $value) {
				echo $i.': ';
				$los = explode(', ', $value);
				foreach ($los as $key1=> $value1) {
					$value1 = (int)$value1;
					if($value1%2){
						echo '<span style="color:red;">'.$value1.'</span>';
					}else{
						echo '<span style="color:blue;">'.$value1.'</span>';
					}
					echo ', ';
				}
					echo '<br>';
			}
		}
	}
?>