<?php
if(isset($_POST)){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}
if(isset($_POST['akcja'])){
	switch ($_POST['akcja']) {
		case 'ok':
			$where = 'dane.txt';
			if(is_writable($where) && $handle = fopen($where, 'a+')){
				if(flock($handle, 2)){
					foreach ($_POST as $key => $value) {
						if($key != 'wyslij' && $key != 'akcja')
							fwrite($handle, $value.'|');
					}
					echo 'wysłano';
					flock($handle, 3);
				}
				fclose($handle);
			}
			break;
		
		default:
			# code...
			break;
	}
	unset($_POST['akcja']);
}
header('Location: index.php?th=x');