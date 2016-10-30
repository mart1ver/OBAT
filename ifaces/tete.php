<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Obat.</title>


<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
    <link href="../css/oressource.css" rel="stylesheet">
    <link rel="stylesheet" href="../js/morris/morris.css">

  </head>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Obat.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
     <link rel="stylesheet" href="http://openlayers.org/en/v3.18.2/css/ol.css" type="text/css">
      <script src="http://openlayers.org/en/v3.18.2/build/ol.js" type="text/javascript"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-right">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Obat.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chantier <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">chantier 1</a></li>
                <li><a href="#">chantier 2</a></li>
                <li><a href="#">chantier 3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="chantiers.php">Éditer les chantiers</a></li>
              </ul>
            </li>
            <li><a href="#about">Saisie</a></li>
            <li><a href="#contact">Recherche</a></li>
            <li class="dropdown navbar-right">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuration <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Materiaux</a></li>
                <li><a href="#">Materiels</a></li>
                <li><a href="#">Corps d'état</a></li>
                <li><a href="#">Typologies</a></li>
                <li><a href="#">Natures</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="chantiers.php">Éditer les chantiers</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 

<?php

// Afficher l'erreur si elle existe
if (isset($_GET['err'])) echo "<div class='alert alert-danger' style='width:80%;margin:auto;'>$_GET[err]</div>";

// Affiche le message s'il existe
if (isset($_GET['msg'])) echo "<div class='alert alert-success alert-dismissable' style='width:80%;margin:auto;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$_GET[msg]</div>";

?>