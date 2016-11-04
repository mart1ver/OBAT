<?php session_start(); 

require_once('../moteur/dbconfig.php');

//Vérification des autorisations de l'utilisateur et des variables de session requisent pour l'affichage de cette page:
    include "tete.php" ?>
    <br><br>
    <div class="container">
        <h1>Édition du chantier n°: <?php echo $_POST['id']?></h1> 
         <div class="panel-heading">Vous éditez ou modifiez ici les données concernant le chantier numero <?php echo $_POST['id']?>, <?php echo $_POST['adresse']?>. </div>


      <div class="panel-body">
        <div class="row">
          <form action="../moteur/modification_points_collecte_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $id?>">

  <div class="col-md-3"><label for="nom">Nom:</label><br><br> <input type="text"                 value ="<?php echo $_POST['nom'].$_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
  <div class="col-md-2"><label for="addresse">Addresse:</label><br><br> <input type="text"       value ="<?php echo $_POST['adresse'].$_GET['adresse']?>" name="adresse" id="adresse" class="form-control " required ></div>
  <div class="col-md-2"><label for="commentaire">Commentaire:</label><br><br> <input type="text" value ="<?php echo $_POST['commentaire'].$_GET['commentaire']?>" name="commentaire" id="commentaire" class="form-control " required ></div>
   <div class="col-md-1"><br><br><button name="creer" class="btn btn-warning">Modifier</button></div>
</form>
<br><br>
<a href="edition_points_collecte.php">
<button name="anuler" class="btn btn">Anuler</button>
</a>
</div>
<div class="row">
  <h2>Folios:</h2>
<button name="ajouter_folio" class="btn btn">Ajouer un folio</button>
</div>
      </div>
     
      <br>
      <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4"><br> </div>
  <div class="col-md-4"></div>
  </div>
  </div>
  </div>
    </div><!-- /.container -->
   
<?php include "pied.php";?>
