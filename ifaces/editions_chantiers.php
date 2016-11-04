<?php session_start(); 

require_once('../moteur/dbconfig.php');

//Vérification des autorisations de l'utilisateur et des variables de session requisent pour l'affichage de cette page:
    include "tete.php" ?>
    <div class="container">
        <h1>Édition du chantier n°: <?php echo $_POST['id']?></h1> 
         <div class="panel-heading">Vous éditez ou modifiez ici les données concernant le chantier numero <?php echo $_POST['id']?>, <?php echo $_POST['adresse']?>. </div>
<?php
//POST ou GET ?
if (isset($_POST['id']) !== false)
{
$id = $_POST['id'];
}
else
{
$id = $_GET['id'];
}
//on obtient la couleur de la localité dans la base

$req = $bdd->prepare("SELECT couleur FROM points_collecte WHERE id = :id ");
$req->execute(array('id' => $id));
$donnees = $req->fetch();

$couleur = $donnees['couleur'];
            
              $reponse->closeCursor(); // Termine le traitement de la requête
               

?>





      <div class="panel-body">
        <div class="row">
          <form action="../moteur/modification_points_collecte_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $id?>">

  <div class="col-md-3"><label for="nom">Nom:</label><br><br> <input type="text"                 value ="<?php echo $_POST['nom'].$_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
  <div class="col-md-2"><label for="addresse">Addresse:</label><br><br> <input type="text"       value ="<?php echo $_POST['adresse'].$_GET['adresse']?>" name="adresse" id="adresse" class="form-control " required ></div>
  <div class="col-md-2"><label for="commentaire">Commentaire:</label><br><br> <input type="text" value ="<?php echo $_POST['commentaire'].$_GET['commentaire']?>" name="commentaire" id="commentaire" class="form-control " required ></div>
   <div class="col-md-1"><label for="pesee_max">Pesée maxi:</label> <input type="text" value ="<?php echo $_POST['pesee_max'].$_GET['pesee_max']?>" name="pesee_max" id="pesee_max" class="form-control " required ></div>
  <div class="col-md-1"><label for="couleur">Couleur:</label><br><br> <input type="color"        value ="<?php echo $couleur ?>" name="couleur" id="couleur" class="form-control " required ></div>
  <div class="col-md-1"><br><br><button name="creer" class="btn btn-warning">Modifier</button></div>
</form>
<br><br>
<a href="edition_points_collecte.php">
<button name="creer" class="btn btn">Anuler</button>
</a>
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
