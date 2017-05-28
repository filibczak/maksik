<?php
	 $directory = 'upload';
	 $dir = opendir($directory);
	 while ($fil_name == readdir($dir)) {
	 	if(	$fil_name != '.' &&
	 		$fil_name != '..' ){
	 		$nazwy[] = $fil_name;
	 	}
	 }
	 closedir();

	 sort($nazwy);
	 echo '<pre>';
	 print_r($nazwy);
	 echo '</pre>';
?>