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
    <div class="col-md-4"><label for="Adresse">Adresse:</label> <input type="text" value ="<?php echo $_GET['adresse']?>" name="Adresse" id="Adresse" class="form-control " required ></div>
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
            <th>Commentaire</th>
            <th>Nombre de folios</th>
            <th>Visible?</th>
            <th>Éditer</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            // On recupère tout le contenu de la table affectations
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
<form action="../moteur/chantier_visible.php" method="post">

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

<form action="editions_chantiers.php" method="post">

<input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
<input type="hidden" name ="adresse" id="adresse" value="<?php echo $donnees['adresse']?>">
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
