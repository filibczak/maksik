<?php

	echo date('d.M+=Y').'<br>';
	$sec = (int)date('s');
	if($sec % 2){
		echo "<style>body{background-color: pink}</style>";
		echo "nie jest parzyscie, więc czerwnoy<br>";
	}else{
		echo "<style>body{background-color: red}</style>";
		echo "jest parzyscie, więc czerwnoy<br>";
	}
	echo "sec = $sec<br>";

?>