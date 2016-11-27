


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
          <a class="navbar-brand" href="../">Obat.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Saisie <span class="caret"></span></a>
              <ul class="dropdown-menu">
<?php 
            // On recupère tout le contenu de la table chantiers
            $reponse = $bdd->query('SELECT * FROM chantiers WHERE visible = "oui"');
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

?>
            <li><a href="saisie.php?id=<?php echo $donnees['id']?>&fid=<?php 









$req2 = $bdd->prepare("SELECT MIN(id) as fid FROM folios WHERE id_chantier = :id_chantier ");
    $req2->execute(array('id_chantier' => $donnees['id']));
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req2->fetch())
           {
echo($donnees2['fid']);
           }



 $req2->closeCursor(); // Termine le traitement de la requête 











              ?>">chantier <?php echo $donnees['id']?>, <?php echo $donnees['nom']?></a></li>

<?php }
              $reponse->closeCursor(); // Termine le traitement de la requête
?>
              </ul>
            </li>
            


<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recherche <span class="caret"></span></a>
              <ul class="dropdown-menu">
<?php 
            // On recupère tout le contenu de la table chantiers
            $reponse = $bdd->query('SELECT * FROM chantiers WHERE visible = "oui"');
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

?>
            <li><a href="recherche.php?id=<?php echo $donnees['id']?>&fid=<?php 









$req2 = $bdd->prepare("SELECT MIN(id) as fid FROM folios WHERE id_chantier = :id_chantier ");
    $req2->execute(array('id_chantier' => $donnees['id']));
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req2->fetch())
           {
echo($donnees2['fid']);
           }



 $req2->closeCursor(); // Termine le traitement de la requête 










              ?>&rcorps=0&rtypo=0&rm=1&ro=1">chantier <?php echo $donnees['id']?>, <?php echo $donnees['nom']?></a></li>

<?php }
              $reponse->closeCursor(); // Termine le traitement de la requête
?>
              </ul>
            </li>

           
            <li class="dropdown navbar-right">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuration <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edition_materiaux.php">Natures de Materiaux</a></li>
                <li><a href="edition_materiels.php">Natures de Materiels</a></li>
                <li><a href="edition_corps.php">Corps d'état</a></li>
                <li><a href="edition_typologies.php">Typologies</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="chantiers.php">Éditer les chantiers</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container -->
    </nav>
 
<br><br>
<?php

// Afficher l'erreur si elle existe
if (isset($_GET['err'])) echo "<br><div class='alert alert-danger' style='width:80%;margin:auto;'>$_GET[err]</div>";

// Affiche le message s'il existe
if (isset($_GET['msg'])) echo "<br><div class='alert alert-success alert-dismissable' style='width:80%;margin:auto;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$_GET[msg]</div>";

?>
