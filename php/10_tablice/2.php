<?php
	
	$losy = [];
	for($i = 0; $i < 100; $i++){
		$losy[$i] = rand(0, 1000);
	}
	rsort($losy);
	for($i = 0; $i < 100; $i++){
		echo $losy[$i].'<br>';
	}

?>