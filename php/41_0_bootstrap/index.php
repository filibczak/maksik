<!-- http://37.8.214.76/~jacquar/_materialy/05_mySQL/05_filmy/ -->

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyporzyczalnia filmów</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/screen.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>

  </head>
  <body>	
    <!-- navigacjia -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Wypożyczalnia filmów online</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#hom" class="glyphicon glyphicon-home clMenu"> Home</a></li>
            <li><a href="#wyp" class="glyphicon glyphicon-tag clMenu"> Wypożyczenia</a></li>
            <li><a href="#flm" class="glyphicon glyphicon-film clMenu"> Filmy</a></li>
            <li><a href="#stt" class="glyphicon glyphicon-signal clMenu"> Statystyki</a></li>
            <li class="dropdown">
              <a href="#adm" class="dropdown-toggle glyphicon glyphicon-lock" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#kli" class="clMenu">Lista klientów</a></li>
                <li><a href="#rez" class="clMenu">Lista reżyserów</a></li>
                <li><a href="#gat" class="clMenu">Lista gatunków</a></li>
                <li><a href="#usr" class="clMenu">Lista użytkowników</a></li>
                <li><a href="#inn" class="clMenu">Inne</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- navigacjia END -->

	<!-- gluwna czesc -->
  	<article id="mainContent"></article>



  </body>
</html>