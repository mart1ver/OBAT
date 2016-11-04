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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  ajouter un folio
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Importer un folio</h4>
      </div>
      <div class="modal-body">
       <form action="../moteur/import_folio_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $id?>">

  <label for="nom">Nom:</label><br><br> <input type="text" value ="<?php echo $_POST['nom'].$_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus>
  <label for="commentaire">Commentaire:</label><br><br> <input type="text" value ="<?php echo $_POST['commentaire'].$_GET['commentaire']?>" name="commentaire" id="commentaire" class="form-control " required >
  <form enctype="multipart/form-data" action="_URL_" method="post">
  <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
  Envoyez ce fichier : <input name="userfile" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>


      </div>
      <div class="modal-footer">
        <button type="button" type="submit" class="btn btn-default" >Sauvegarder</button>
        </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Anuler</button>
      </div>
    </div>
  </div>
</div>
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
