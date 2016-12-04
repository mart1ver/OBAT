<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" ;
//Oressource 2014, formulaire de référencement des conventions avec les partenaires de la structure
//Simple formulaire de saisie , liste des conventions déjà référencées et possibilité de les cacher à l'utilisateur ou de modifier les données
//

//on extrait les coefs...
 $req2 = $bdd->prepare("SELECT *  FROM notes  ");
    $req2->execute();
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req2->fetch())
           {
$coef_qualité = $donnees2['coef_qualité'];
$coef_depose = $donnees2['coef_depose'];
$coef_traitement = $donnees2['coef_traitement'];
$coef_stockage = $donnees2['coef_stockage'];

           }



 $req2->closeCursor(); // Termine le traitement de la requête 


?>

    <div class="container">
        <h1>Gestion du calcul des notes</h1> 
         <div class="panel-heading">Gérez ici les coef. de chaque note.</div>
         <p>Permet de de configurer la note finale en fonction du poid  </p>
      <div class="panel-body">
        
          <form action="../moteur/edition_notes_post.php" method="post">
  <div class="row"><label for="note1">Coef. qualité:</label> <input name="note1" id="note1" type="number" value ="<?php echo($coef_qualité)?>" required autofocus></div>
  <div class="row"><label for="note2">Coef. risque de dépose:</label> <input name="note2" id="note2" type="number" value ="<?php echo($coef_depose)?>" required ></div>
  <div class="row"><label for="note3">Coef. complexité de traitement:</label> <input name="note3" id="note3" type="number" value ="<?php echo($coef_traitement)?>" required ></div>
  <div class="row"><label for="note4">Coef. complexité conditionnement et stockage:</label> <input name="note4" id="note4" type="number" value ="<?php echo($coef_stockage)?>" required ></div> 
  <br>
 
  <br>


  <div class="col-md-1"><br>
    




    <button name="creer" class="btn btn-default">Créer!</button></div>
</form>

      </div>
      <!-- Table -->
      
      <br>
      
  </div>
  
    </div><!-- /.container -->
   
<?php include "pied.php"; 

?>
