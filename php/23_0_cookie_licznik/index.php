<?php

	setcookie('views', 1, time()+60); //nazwa, wartosc, czas konca

	$fileName='views';
	if(file_exists($fileName))
	{
		$file=fopen($fileName,'r');
		flock($file,LOCK_SH);
		$ile=fread($file,255);//odzczytruje 255 bajtow
		flock($file,LOCK_UN);
		fclose($file);

		if(!isset($_COOKIE['views']))
			$ile++;
	}
	else
		$ile=1;

	$file=fopen($fileName,'w');
	flock($file,LOCK_EX);
	fwrite($file,$ile);
	flock($file,LOCK_UN);
	fclose($file);

	echo $ile;
?>