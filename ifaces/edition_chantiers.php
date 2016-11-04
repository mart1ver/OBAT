<?php session_start(); 

require_once('../moteur/dbconfig.php');
$id = $_POST['id'];
//Vérification des autorisations de l'utilisateur et des variables de session requisent pour l'affichage de cette page:
    include "tete.php"; ?>
    <br><br>
    <div class="container">
        <h1>Édition du chantier n°: <?php echo $_POST['id']?></h1> 
         <div class="panel-heading">Vous éditez ou modifiez ici les données concernant le chantier numero <?php echo $_POST['id']?>, <?php echo $_POST['adresse']?>. </div>


      <div class="panel-body">
        <div class="row">
          <form action="../moteur/modification_chantier_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $_POST['id']?>">

  <div class="col-md-3"><label for="nom">Nom:</label><br><br> <input type="text" value ="<?php echo $_POST['nom'].$_GET['nom']?>" name="nom" id="nom" class="form-control " required autofocus></div>
  <div class="col-md-2"><label for="adresse">Adresse:</label><br><br> <input type="text"       value ="<?php echo $_POST['adresse'].$_GET['adresse']?>" name="adresse" id="adresse" class="form-control " required ></div>
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
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
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
       

  
  <form enctype="multipart/form-data" action="../moteur/import_folio_post.php" method="post">
            <input type="hidden" name ="id" id="id" value="<?php echo $id?>">
    <label for="nom">Nom:</label><input type="text"  name="nom" id="nom" class="form-control " required autofocus>
  <label for="commentaire">Commentaire:</label><input type="text" name="commentaire" id="commentaire" class="form-control " required >
  <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
  <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
  <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
  <label for="userfile">Folios:</label> <input name="userfile" type="file" required />
  


      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-primary" value="Enregistrer le folio" />
</form>
        <button type="button" class="btn btn" data-dismiss="modal">Anuler</button>
      </div>
    </div>
  </div>
</div>
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
            <th>Éditer</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM folios WHERE id_chantier = :id_chantier ");
    $req->execute(array('id_chantier' => $id));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            <tr> 
            <td><?php echo $donnees['id']?></td>
            <td><?php echo $donnees['timestamp']?></td>
            <td><?php echo $donnees['nom']?></td>
            <td><?php echo $donnees['commentaire']?></td>





<td>

<form action="edition_folios.php" method="post">

<input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
<input type="hidden" name ="nom" id="nom" value="<?php echo $donnees['nom']?>">
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
