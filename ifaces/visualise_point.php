<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 

?>

    <div class="container">
        <h1>Visualisation du point N°:<?php echo($_GET['pid']); ?></h1> 
       
        <div class="col-md-7">
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
// on extrait la definition
$definition = $donnees['definition'];            
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
            $ha = $pieces[2]; // hauteur/epaisseur
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



  $req->closeCursor(); // Termine le traitement de la requête 

if(intval($definition) === 0){};
if(intval($definition) === 1){$msg_definition = "Volume: ".(($lo*$la*$ha)/1000000).' mètres cubes';};
if(intval($definition) === 2){$msg_definition = "Longueur: ".$lo/100.' mètres linéaires';};
if(intval($definition) === 3){$msg_definition = "Surface: ".(($lo*$la*$ha)/10000). ' mètres carés';};
  ?>




  

        <input type="hidden" id="coordos" name="coordos"> 
        <input type="hidden" id="cid" name="cid" value="<?php echo($_GET['cid']); ?>"> 
        <input type="hidden" id="fid" name="fid" value="<?php echo($_GET['fid']); ?>"> 
        <input type="hidden" id="pid" name="pid" value="<?php echo($_GET['pid']); ?>"> 
        <div class="panel panel-default">
  <div class="panel-body">
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


 <?php 


};
  $req->closeCursor(); // Termine le traitement de la requête ?>
<?php 
// on détermine le corps de métier pour le materiaux de cette fiche
  $req = $bdd->prepare("SELECT spots.id, corps.nom  FROM corps, spots, materiaux  WHERE 
materiaux.id = spots.id_materiaux AND 
corps.id = materiaux.id_corp 
AND spots.id = :id");
    $req->execute(array('id' => $_GET["pid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {
$nomcorpsmat = $donnees['nom'];
          }
$req->closeCursor();
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<label for="objet">  &nbspMateriels:&nbsp </label><select disabled name="objet" id="objet" onchange="document.getElementById('materiaux').disabled = true; document.getElementById('materiaux').value = '';">
<option value="0" >-</option><br>



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
<?php 
// on détermine le corps de métier pour le materiaux de cette fiche
  $req = $bdd->prepare("SELECT spots.id, corps.nom  FROM corps, spots, objets  WHERE 
objets.id = spots.id_objets AND 
corps.id = objets.id_corp 
AND spots.id = :id");
    $req->execute(array('id' => $_GET["pid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {
$nomcorpsobj = $donnees['nom'];
          }
$req->closeCursor();
?>
</select>
<br>
         <label>Corps de métier:&nbsp<?php echo($nomcorpsobj.$nomcorpsmat);?></label><br>
        <label for="description">Description:&nbsp</label><p id="description" name="description"><?php echo($description) ;?></p>
        <label>Longueur:&nbsp<?php echo($lo);?></label>
        <label>&nbspLargeur:&nbsp<?php echo($la);?></label>
        <label>&nbspHauteur:&nbsp<?php echo($ha);?></label><br>
        <label>&nbsp<?php echo($msg_definition);?></label><br>
<label >&nbspQuantité:&nbsp<?php echo($quantite);?></label>
        
        

</div></div></div>




<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="qualite">Qualité:</label> <input disabled type="range"  style="width: 150px;display: inline;"  name="qualite" id="qualite" value="<?php echo($qualite);?>" min="0" max="5" onchange="updatenote_qualite(this.value)"><b>&nbsp<font name="label_qualite" id="label_qualite" size="4"><?php echo($qualite);?></font><font size="4">/5</font></b><br>
        <label for="c1">commentaire:&nbsp</label>  <p id="c1" name="c1"><?php echo($comm_qualite);?></p>
      
 </div>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="risque">Risque dépose: </label> <input disabled type="range" style="width: 150px;display: inline;" name="risque" id="risque" value="<?php echo($risque_depose);?>" min="0" max="5" onchange="updatenote_risque(this.value)"><b>&nbsp<font name="label_risque" id="label_risque" size="4"><?php echo($risque_depose);?></font><font size="4">/5</font></b><br>
        <label for="c2">commentaire:&nbsp</label>  <p id="c2" name="c2"><?php echo($comm_risque_depose);?></p>
 </div>
</div>  
</div>
</div>
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="traitement">Compléxité traitement: </label><input disabled type="range" style="width: 150px;display: inline;" name="traitement"  id="traitement" value="<?php echo($complexite_traitement);?>" min="0" max="5" onchange="updatenote_traitement(this.value)"><b>&nbsp<font name="label_traitement" id="label_traitement" size="4"><?php echo($complexite_traitement);?></font><font size="4">/5</font></b><br>
        <label for="c3">commentaire:&nbsp</label><p id="c3" name="c3"><?php echo($comm_complexite_traitement);?></p>
 </div>
</div>
   </div>
</div>     
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
    <label for="stockage">Compléxité conditionnement et stockage: </label> <input disabled type="range" style="width: 150px;display: inline;" name="stockage" id="stockage" value="<?php echo($complexite_stockage);?>" min="0" max="5" onchange="updatenote_stockage(this.value)"><b>&nbsp<font name="label_stockage" id="label_stockage" size="4"><?php echo($complexite_stockage);?></font><font size="4">/5</font></b><br>
    <label for="c4">commentaire:&nbsp</label><p id="c4" name="c4"><?php echo($comm_complexite_stockage);?></p>
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
  <label for="remarques">Remarques:&nbsp</label>
        <p id="remarques" name="remarques"><?php echo($remarque);?></p><br>
       <br>
</div>
<div class="col-md-5">
<?php if($photo == ''){}else{ ?>
<label for="photo">Photo:</label> 
 <a href="../images/photos/<?php echo($photo)?>"><img name="photo"id="photo" src="../images/photos/<?php echo($photo)?>"  height="80" width="100"> </a> 
<?php }?>
 </div>
         
      

</div>

<br>




<button type="button" class="btn btn-default" onclick="history.go(-1);">Retour</button>
<?php if($_SESSION['user'] === "root"){?>
<button type="button" class="btn btn-danger" onclick="location = '<?php echo('edite_point.php?pid='.$_GET["pid"].'&cid='.$_GET["cid"].'&fid='.$_GET["fid"]);?>'";>Éditer fiche</button>

<?php } ?>


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
