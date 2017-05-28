<?php
	session_start();
	$users = array(
		'123' => '123',
		'Qkiz' => '321',
		'F4ilur3' => '132'
	);

	$b_jest_user = false;
	if( isset($_GET['user']) && isset($_GET['pass']) ){//sa loginy
		$user = $_GET['user'];
		$pass = $_GET['pass'];

		foreach ($users as $key => $value) {
		
			if($key == $user && $value == $pass){
				$b_jest_user = true;
				break;
			}
		}

	}else{//nie ma loginow

	}


?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>SLogowanie w sesji</title>
		<meta charset="utf-8">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	   <![endif]-->
		<meta name="description" content="Moja strona - szablon">
		<meta name="keywords" content="HTML5, struktura, szablon">
		<meta name="author" content="Jacek Podgórski">
		<style>
			@font-face {
				font-family: "BonvenoCF-Light";
				src: url("BonvenoCF-Light.otf");
			}
			article, aside, footer, header, nav, section {
				display: block;
			}
			body {
				color: black;
				font-family: BonvenoCF-Light;
				font-size: 10pt;
				line-height: 140%;
				background-color: #FFF0D4;
				}
			 #top {
				margin: 0 auto;
				width: 1000px;
				background-color: #f2ebdb;
			  }
			#logo {
				padding: 1em;
				height: 175px;
				text-align: right;
				padding-right: 10px;
			 }
			#menu {
				padding: 1em;
				width: 155px;
				float: left;
				overflow: hidden;
				background-color: #d8c6b0;
				text-align: left;
				line-height: 1.5em;
			}
			#tresc {
				padding: 2em;
				width: 757px;
				min-height: 300px;;
				border-right: 4px solid #593b39;
				border-left: 4px solid #593b39;
				float: left;
			}
			.sec_art {
				padding: 1emx;
				text-align: justify;
			}
			.head_art   {
				background-color: #ddc692;
			}
			.head_art h1 {
				color: #501900;
				text-align: left;
				padding: 5px;
				font-size: 12pt;
			}
			.foot_art {
				padding: 5px;
				text-align: right;
				font-style: italic;
				font-size: 8pt;
				color: gray;
			}
			form div {
				line-height: 2.5em;
			}
			input[type=text], input[type=password] {
				padding: 0.2em;
				border: 0;
				border-bottom: 1px solid brown;
				background-color: #FFF0D4;	
			}
			input[type=submit] {
				margin: 0.5em;
				padding: 0.5em 1em;
				background-color: #FFF0D4;	
			}
		</style>
	</head>
	<body>
		<div id="top">
			<header id="logo">
				<h1>Strona z logowaniem</h1>
				<p>wykorzystanie mechanizmu sesji</p>
				<p class="foot_art">by Jacquar '2016</p>
			</header>

			<nav id="menu">
				<p>Menu strony</p>
				<ul>
					<li><a href="?op=wstep">Wstęp</a></li>
					<li><a href="?op=m1">Opcja 1</a></li>
					<li><a href="?op=m2">Opcja 2</a></li>
					<li><a href="?op=m3">Opcja 3</a></li>
				</ul>
			</nav>
			<section id="tresc">
		   </section>
		</div>
	 </body>
</html>