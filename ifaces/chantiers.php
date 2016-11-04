<?php session_start(); 

require_once('../moteur/dbconfig.php');

include "tete.php" ?>
<br><br>

    <div class="container">
        <h1>Édition de la liste des chantiers</h1> 
         <div class="panel-heading">Ici vous pouvez ajouter et éditer les chantiers.</div>
         <p>Vous pouvez aussi masquer les chantiers que vous ne souhaitez pas voir apparaitre dans les menus en ce momment</p>

      <div class="panel-body">
        <div class="row">
        	<form action="../moteur/chantiers_post.php" method="post">
  <div class="col-md-3"><label for="nom">Nom:</label> <input type="text"                 value ="<?php echo $_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
    <div class="col-md-4"><label for="adresse">Adresse:</label> <input type="text" value ="<?php echo $_GET['adresse']?>" name="adresse" id="adresse" class="form-control " required ></div>
    <div class="col-md-2"><label for="commentaire">commentaire:</label> <input type="text" value ="<?php echo $_GET['commentaire']?>" name="commentaire" id="commentaire" class="form-control " required ></div>
  
  <div class="col-md-1"><br><button name="creer" class="btn btn-default">Créer!</button></div>
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
            <th>Adresse</th>
            <th>Commentaire</th>
            <th>Nombre de folios</th>
            <th>Visible?</th>
            <th>Éditer</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            // On recupère tout le contenu de la table chantiers
            $reponse = $bdd->query('SELECT * FROM chantiers');
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

           ?>
            <tr> 
            <td><?php echo $donnees['id']?></td>
            <td><?php echo $donnees['timestamp']?></td>
            <td><?php echo $donnees['nom']?></td>
            <td><?php echo $donnees['adresse']?></td>
            <td><?php echo $donnees['commentaire']?></td>
        <td> 

     <?php $req = $bdd->prepare("SELECT COUNT(id) FROM folios WHERE id_chantier = :id_chantier ");
    $req->execute(array('id_chantier' => $donnees['id']));
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req->fetch())
           {

           ?>
            
            <?php echo $donnees2['COUNT(id)']?>
             <?php }
              $req->closeCursor(); // Termine le traitement de la requête
                ?>   </td>
        <td>   
<form action="../moteur/chantier_visible.php" method="post">

  <input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
  <input type="hidden"name ="visible" id ="visible" value="<?php if ($donnees['visible'] == "oui") 
{echo "non";}
else 
{echo "oui";}?>">
<?php
if ($donnees['visible'] == "oui") // SI visible == oui
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

<form action="edition_chantiers.php" method="post">

<input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
<input type="hidden" name ="nom" id="nom" value="<?php echo $donnees['nom']?>">
<input type="hidden" name ="adresse" id="adresse" value="<?php echo $donnees['adresse']?>">
<input type="hidden" name ="commentaire" id="commentaire" value="<?php echo $donnees['commentaire']?>">
  <button  class="btn btn-warning btn-sm" >Modifier</button>


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
   
<?php include "pied.php";?>
