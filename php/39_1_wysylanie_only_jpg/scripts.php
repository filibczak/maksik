<?php
session_start();
if($_SESSION['captcha'] = $_POST['captcha']){
	$plik_tmp = $_FILES['plik']['tmp_name'];
	$plik_nazwa = $_FILES['plik']['name'];
	$plik_rozmiar = $_FILES['plik']['size'];
	$plik_typ = $_FILES['plik']['type'];

	$new_name = explode('/', $plik_tmp);
	$new_name = $new_name[count($new_name)-1];

	if(is_uploaded_file($plik_tmp)){
		/*	czy .jpg	*/
		if($plik_typ == 'image/jpeg'){
			if( !empty($_POST['width']) && !empty($_POST['height']) ){

    			$img = imagecreatefromjpeg($plik_tmp);
    			list($width, $height) = getimagesize($plik_tmp);

    			$tmp = imagecreatetruecolor($_POST['width'], $_POST['height']);
    			imagecopyresampled($tmp, $img, 0, 0, 0, 0, $_POST['width'], $_POST['height'], $width, $height);

    			imagejpeg($tmp, "img/$new_name.jpg");
				header("Location: index.php?kom=Wyslano2");
			}else{
				move_uploaded_file($plik_tmp, "img/$new_name.jpg");
				header("Location: index.php?kom=Wyslano1");
			}
		}else{
			header("Location: index.php?kom=Przyjmujemy%0tylko%20jpg");
		}
	}else{
		header("Location: index.php?kom=Brak%20pliku");
	}
}else{
	header("Location: index.php?kom=Nie%20dla%20robotów");
}
?>