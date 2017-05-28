<?php
	//pobiera zawartość folderu
	$direction = 'upload';
	$dir = opendir($direction);
	while($name = readdir($dir)){
		if($name != '.' && $name != '..' && $name != '_notes')
			$nazwa[] = $name;
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Rodzaje plików</title>
	<!--<link href="screen.css" rel="stylesheet" type="text/css">-->
	<style>
		body{
			background-color: #323232;
			color: #DA9A5A;
		}
		a{
			color: #DA9A5A;
			text-decoration: none;
		}
		a:hover{
		color: #EAC6A2;
		}
		.ico {
			height: 40px;
		}
		ul > li{
			list-style-type: none;
			font-size: 40px;
		}
	</style>
</head>
<body>
	
	<ul>
	<?php
	
		foreach($nazwa AS $value){
			$typ = 	strpos($value,'.',0); 

			do{ 
				if(strpos($value,'.',$typ+1) != ''){ 
					$typ = strpos($value,'.',$typ+1); 
				} 
			}while(strpos($value,'.',$typ+1) != '');
			
			$typ = substr($value, $typ+1); 
			
			echo '<li><a href="upload/'.$value.'">';
			echo '<img src="format/'.$typ.'-icon.png" alt="'.$typ.'" class="ico">';
			echo " $value";
			echo '</a></li>';
		}
	?>
	</ul>
	
</body>
</html>