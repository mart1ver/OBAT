<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 

?>

    <div class="container">
        <h1>Visualisation du point N°:<?php echo($_GET['pid']); ?></h1> 
         <div class="panel-heading">Vous vous apretez à éditer ou supprimer un point</div>
        
      <div class="panel-body">
        <div class="row">
          



<?php 
            // On recupère les infos concernant ce point:
           
             $req = $bdd->prepare("SELECT * FROM spots WHERE id = :id ");
    $req->execute(array('id' => $_GET["pid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {
//on extrait la localisation en 5 variables
            $pizza  = $donnees['bat_entree_cage_etage_numero'];
            $pieces = explode("|", $pizza);
            $bat = $pieces[0]; // bat
            $entree = $pieces[1]; // entree
            $cage = $pieces[2]; // cage
            $etage =  $pieces[3]; // etage
            $numero = $pieces[4]; // numero

//on extrait le type de materiau et de materiel

$id_objets = $donnees['id_objets'];
$id_materiaux = $donnees['id_materiaux'] ;
// on extrait le description
$description = $donnees['description'] ;
// on extrait le quantitatif
$quantite = $donnees['quantite'] ;

//on extrait les cotes en 3 variables
            $pizza  = $donnees['encombrement'];
            $pieces = explode("|", $pizza);
            $lo = $pieces[0]; // lonuger
            $la = $pieces[1]; // largeur
            $ha = $pieces[2]; // hauteur
//on extrait les notes , 4 variables      
$risque_depose = $donnees['risque_depose'] ;
$complexite_traitement = $donnees['complexite_traitement'] ;
$complexite_stockage = $donnees['complexite_stockage'] ;
$qualite = $donnees['qualite'] ;   

//on extrait les 4 commentaires et la remarque 
$comm_risque_depose = $donnees['comm_risque_depose'] ;
$comm_complexite_traitement = $donnees['comm_complexite_traitement'] ;
$comm_complexite_stockage = $donnees['comm_complexite_stockage'] ;
$comm_qualite = $donnees['comm_qualite'] ;  
$remarque = $donnees['remarque'] ;
// on extrait le chemin de la photo
$photo = $donnees['photo'] ;
          };



  $req->closeCursor(); // Termine le traitement de la requête ?>








<form name="formspot" id="formspot" enctype="multipart/form-data" action="../moteur/edite_point_post.php" method="post">
  

        <input type="hidden" id="coordos" name="coordos"> 
        <input type="hidden" id="cid" name="cid" value="<?php echo($_GET['cid']); ?>"> 
        <input type="hidden" id="fid" name="fid" value="<?php echo($_GET['fid']); ?>"> 
        <input type="hidden" id="pid" name="pid" value="<?php echo($_GET['pid']); ?>"> 
        <label for="bat">localisation:&nbsp</label><input disabled type="text" name="bat" id="bat" placeholder="Bat." maxlength="6" size="6" value="<?php echo($bat);?>" ><input disabled type="text" name="entree" id="entree" placeholder="Entrée" maxlength="6" size="6" value="<?php echo($entree);?>"><input disabled type="text" name="cage" id="cage" placeholder="Cage" maxlength="6" size="6" value="<?php echo($cage);?>"><input  disabled type="text" name="etage" id="etage" placeholder="Étage" maxlength="6" size="6" value="<?php echo($etage);?>"><input disabled type="text" name="numero" id="numero" placeholder="Numéro" maxlength="6" size="6" value="<?php echo($numero);?>"><br>
        



        

        <label for="materiaux">Matériaux:&nbsp </label><select disabled name="materiaux" id="materiaux"  onchange="document.getElementById('objet').disabled = true; document.getElementById('objet').value = '';"> 
<option value="0" >-</option>
<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM materiaux WHERE visible = 'oui' ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>" <?php if ($donnees['id'] == $id_materiaux){echo('selected');}  ?> ><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<label for="objet">  &nbspMateriels:&nbsp </label><select disabled name="objet" id="objet" onchange="document.getElementById('materiaux').disabled = true; document.getElementById('materiaux').value = '';">
<option value="0" >-</option>
<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM objets WHERE visible = 'oui' ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>" <?php if ($donnees['id'] == $id_objets){echo('selected');}  ?> ><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>
<br>
        
        <label for="description">Description:&nbsp</label><input disabled name="description" id="description" type="text" size="35" value="<?php echo($description) ;?>"><label for="quantite">&nbspQuantité:&nbsp</label><input disabled name="quantite" style="width: 50Px;" id="quantite" type="number" min="1" value="<?php echo($quantite);?>" ><br>
        <label for="longueur">Longueur:&nbsp</label><input disabled type="number" name="longueur" id="longueur" style="width: 50Px;" min="0"  placeholder="cm." value="<?php echo($lo);?>" ><label for="largeur">&nbspLargeur:&nbsp</label><input disabled type="number" name="largeur" id="largeur" style="width: 50Px;" min="0"  placeholder="cm." value="<?php echo($la);?>"><label for="hauteur"> &nbspHauteur:&nbsp</label><input disabled type="number"  name="hauteur" id="hauteur" style="width: 50Px;" min="0"  placeholder="cm." value="<?php echo($ha);?>"><br><br>
        






<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="qualite">Qualité:</label> <input disabled type="range"  style="width: 150px;display: inline;"  name="qualite" id="qualite" value="<?php echo($qualite);?>" min="0" max="5" onchange="updatenote_qualite(this.value)"><b>&nbsp<font name="label_qualite" id="label_qualite" size="4"><?php echo($qualite);?></font><font size="4">/5</font></b><br><label for="c2">commentaire:&nbsp</label><input disabled name="c1" id="c1" type="text" value="<?php echo($comm_qualite);?>" ><br>
 </div>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="risque">Risque dépose: </label> <input disabled type="range" style="width: 150px;display: inline;" name="risque" id="risque" value="<?php echo($risque_depose);?>" min="0" max="5" onchange="updatenote_risque(this.value)"><b>&nbsp<font name="label_risque" id="label_risque" size="4"><?php echo($risque_depose);?></font><font size="4">/5</font></b><br><label for="c2">commentaire:&nbsp</label><input disabled type="text" name="c2" id="c2" value="<?php echo($comm_risque_depose);?>" ><br>
 </div>
</div>  
</div>
</div>
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="traitement">Compléxité traitement: </label><input disabled type="range" style="width: 150px;display: inline;" name="traitement"  id="traitement" value="<?php echo($complexite_traitement);?>" min="0" max="5" onchange="updatenote_traitement(this.value)"><b>&nbsp<font name="label_traitement" id="label_traitement" size="4"><?php echo($complexite_traitement);?></font><font size="4">/5</font></b><br><label for="c3">commentaire:&nbsp</label><input disabled type="text" name="c3" id="c3" value="<?php echo($comm_complexite_traitement);?>" ><br>
 </div>
</div>
   </div>
</div>     
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
    <label for="stockage">Compléxité conditionnement et stockage: </label> <input disabled type="range" style="width: 150px;display: inline;" name="stockage" id="stockage" value="<?php echo($complexite_stockage);?>" min="0" max="5" onchange="updatenote_stockage(this.value)"><b>&nbsp<font name="label_stockage" id="label_stockage" size="4"><?php echo($complexite_stockage);?></font><font size="4">/5</font></b><br><label for="c4">commentaire:&nbsp</label><input disabled type="text" name="c4" id="c4" value="<?php echo($comm_complexite_stockage);?>" ><br>
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
  <label for="remarques">Remarques:&nbsp</label>
        <input disabled name="remarques"  id="remarques" type="text" size="50" value="<?php echo($remarque);?>" ><br>
       <br>
</div>
<div class="col-md-5">
<label for="photo">Photo:</label> 
 <a href="../images/photos/<?php echo($photo)?>"><img name="photo"id="photo" src="../images/photos/<?php echo($photo)?>" alt="Pas de photo pour cet objet" height="80" width="100"> </a> 
 </div>
         
      

</div>

<br>




<button type="button" class="btn btn-default" onclick="history.go(-1);">Retour</button>






      </div>
      <!-- Table -->

      <br>
  
  </div>
  </div>
    </div><!-- /.container -->
   <script>
    function updatenote_qualite(slideAmount) {
        var label_qualite = document.getElementById("label_qualite");
        label_qualite.innerHTML = slideAmount;
    }
function updatenote_risque(slideAmount) {
        var label_risque = document.getElementById("label_risque");
        label_risque.innerHTML = slideAmount;
    }
    function updatenote_traitement(slideAmount) {
        var label_traitement = document.getElementById("label_traitement");
        label_traitement.innerHTML = slideAmount;
    }
    function updatenote_stockage(slideAmount) {
        var label_stockage = document.getElementById("label_stockage");
        label_stockage.innerHTML = slideAmount;
    }
    </script> 
<?php include "pied.php"; 

?>