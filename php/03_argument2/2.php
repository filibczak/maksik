<?php

if(isset($_GET['color']))
	$color = $_GET['color'];
else
	$color = 'black';
if(isset($_GET['text']))
	$text = $_GET['text'];
else
	$text = 'jelito gróbe';

echo "<h1 style='color: $color'>$text</h1>"

?>