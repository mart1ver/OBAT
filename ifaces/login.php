<?php session_start(); 

require_once('../moteur/dbconfig.php');


?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once('../moteur/dbconfig.php'); ?>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Bootstrap theme -->
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chosen.css">
     <link rel="stylesheet" href="../css/ol.css" type="text/css">


<script src="../js/ol.js" type="text/javascript"></script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $(".chzn-select").chosen();
});
</script>
    <script src="../js/bootstrap.min.js"></script>
    



  </head>

  <body>

   <?php

// Afficher l'erreur si elle existe
if (isset($_GET['err'])) echo "<br><div class='alert alert-danger' style='width:80%;margin:auto;'>$_GET[err]</div>";

// Affiche le message s'il existe
if (isset($_GET['msg'])) echo "<br><div class='alert alert-success alert-dismissable' style='width:80%;margin:auto;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$_GET[msg]</div>";

?>

    <div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-offset-4 col-md-3">
            <div class="form-login">
            <h4>Bienvenue.</h4>
            <form action="../moteur/login_post.php" method="post">
            <input type="text" id="login" name="login" class="form-control input-sm chat-input" placeholder="Identifiant" />
            </br>
            <input type="password" id="pass" name="pass" class="form-control input-sm chat-input" placeholder="Mot de pasee" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button name="login" class="btn btn-primary btn-md">login</button>

            </span>
            </form>
            </div>
            </div>
        
        </div>
    </div>
    </div><!-- /.container -->
  
<?php include "pied.php"; 

?>
