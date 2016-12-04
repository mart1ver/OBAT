<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 
//Oressource 2014, formulaire de référencement des conventions avec les partenaires de la structure
//Simple formulaire de saisie , liste des conventions déjà référencées et possibilité de les cacher à l'utilisateur ou de modifier les données
//
?>

    <div class="container">
        <h1>Gestion de la liste des materiels</h1> 
          <div class="panel-heading">Gérez ici votre liste d'objets et materiels ré-employables.</div>
         <p>Permet de différencier les objets au moment des recherches </p>
      <div class="panel-body">
        <div class="row">
          <form action="../moteur/modification_materiels_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $_POST['id']?>">
  <div class="col-md-3"><label for="nom">Nom:</label> <input type="text"                 value ="<?php echo $_POST['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
    <div class="col-md-2"><label for="description">Description:</label> <input type="text" value ="<?php echo $_POST['description']?>" name="description" id="description" class="form-control " required ></div>
    
  <div class="col-md-1"><label for="couleur">Couleur:</label> <input type="color"        value ="<?php echo "#".$_POST['couleur']?>" name="couleur" id="couleur" class="form-control " required ></div>

  <br>
  </div>
  <br>

  <div class="row">
    <div class="col-md-7">
  <label for="corp">corp d'état: </label>
<select class="chzn-select" name="corp" id="corp">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM corps ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?> <?php if($donnees['id'] == $_POST["id_corp"] ){echo'selected="selected"';} ?>"><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>



<label for="typologie">typologie: </label>
<select  class="chzn-select" name="typologie" id="typologie">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM typologies ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>" <?php if($donnees['id'] == $_POST["id_typologie"] ){echo'selected="selected"';} ?>><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>
</select>

</div>
</div>
  <div class="col-md-1"><br>
    




    <button name="creer" class="btn btn-default">Modifier!</button></div>
</form>

      </div>
      <!-- Table -->

      <br>
      <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4"><br> </div>
  <div class="col-md-4"></div>
  </div>
  </div>
  </div>
    </div><!-- /.container -->
   
<?php include "pied.php"; 

?>
