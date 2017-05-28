<?php
	$text = 'Alo Alo mano mano';
	$text = preg_replace("/s(w+s)1/i", "$1", $text);
	echo $text;
?>