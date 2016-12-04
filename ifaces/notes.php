<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 
//Oressource 2014, formulaire de référencement des conventions avec les partenaires de la structure
//Simple formulaire de saisie , liste des conventions déjà référencées et possibilité de les cacher à l'utilisateur ou de modifier les données
//
?>

    <div class="container">
        <h1>Gestion du calcul des notes</h1> 
         <div class="panel-heading">Gérez ici les coef. de chaque note.</div>
         <p>Permet de de configurer la note finale en fonction du poid  </p>
      <div class="panel-body">
        <div class="row">
          <form action="../moteur/edition_notes_post.php" method="post">
  <div class="col-md-1"><label for="note1">Coef. qualité:</label> <input name="note1" id="note1" type="number" value ="" required autofocus></div>
  <div class="col-md-1"><label for="note2">Coef. risque de dépose:</label> <input name="note2" id="note2" type="number" value ="" required ></div>
  <div class="col-md-1"><label for="note3">Coef. complexité de traitement:</label> <input name="note3" id="note3" type="number" value ="" required ></div>
  <div class="col-md-1"><label for="note4">Coef. complexité conditionnement et stockage:</label> <input name="note4" id="note4" type="number" value ="" required ></div> 
  <br>
  </div>
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
