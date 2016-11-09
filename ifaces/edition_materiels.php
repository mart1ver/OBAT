<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 
//Oressource 2014, formulaire de référencement des conventions avec les partenaires de la structure
//Simple formulaire de saisie , liste des conventions déjà référencées et possibilité de les cacher à l'utilisateur ou de modifier les données
//
?>

    <div class="container">
        <h1>Gestion de la liste des objets</h1> 
         <div class="panel-heading">Gérez ici votre liste d'objets et materiels ré-employables.</div>
         <p>Permet de différencier les objets au moment des recherches </p>
      <div class="panel-body">
        <div class="row">
        	<form action="../moteur/edition_objets_post.php" method="post">
  <div class="col-md-3"><label for="nom">Nom:</label> <input type="text"                 value ="<?php echo $_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
    <div class="col-md-2"><label for="description">Description:</label> <input type="text" value ="<?php echo $_GET['description']?>" name="description" id="description" class="form-control " required ></div>
    
  <div class="col-md-1"><label for="couleur">Couleur:</label> <input type="color"        value ="<?php echo "#".$_GET['couleur']?>" name="couleur" id="couleur" class="form-control " required ></div>
  <br>
  
    <div class="col-md-5">
  <label for="corp">corp d'état: </label>
<select name="corp">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM corps ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>



<label for="typologie">typologie: </label>
<select name="typologie">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM typologies ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>
</select>
<label for="nature">nature: </label>
  <select name="nature">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM natures ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>
</select>

</div>
  <div class="col-md-1"><br>
    




    <button name="creer" class="btn btn-default">Créer!</button></div>
</form>
</div>
      </div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Date de création</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Couleur</th>
            <th>Visible</th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
        <?php 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->query('SELECT * FROM objets');
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

           ?>
            <tr> 
            <td><?php echo $donnees['id']?></td>
            <td><?php echo $donnees['timestamp']?></td>
            <td><?php echo $donnees['nom']?></td>
            <td><?php echo $donnees['description']?></td>
            <td><span class="badge" style="background-color:<?php echo$donnees['couleur']?>"><?php echo$donnees['couleur']?></span></td>


<td>
<form action="../moteur/objet_visible.php" method="post">

  <input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
  <input type="hidden"name ="visible" id ="visible" value="<?php if ($donnees['visible'] == "oui") 
{echo "non";}
else 
{echo "oui";}?>">
<?php
if ($donnees['visible'] == "oui") // SI on a pas de message d'erreur
{?>
 <button  class="btn btn-info btn-sm " >
  <?php
}

else // SINON 
{?>
   <button  class="btn btn-danger btn-sm " >
 <?php
}
 echo $donnees['visible']?> 
  </button>
</form>
</td>




<td>

<form action="modification_objet.php" method="post">

<input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
<input type="hidden" name ="id_typologie" id="id" value="<?php echo $donnees['id_typologie']?>">
<input type="hidden" name ="id_nature" id="id" value="<?php echo $donnees['id_nature']?>">
<input type="hidden" name ="id_corp" id="id" value="<?php echo $donnees['id_corp']?>">
<input type="hidden" name ="nom" id="nom" value="<?php echo $donnees['nom']?>">
<input type="hidden" name ="description" id="description" value="<?php echo $donnees['description']?>">
<input type="hidden" name ="couleur" id="couleur" value="<?php echo substr($_POST['couleur'],1)?>">

  <button  class="btn btn-warning btn-sm" >Modifier!</button>


</form>



</td>






          </tr>
           <?php }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
       </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            
          </tfoot>
        
      </table>
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
