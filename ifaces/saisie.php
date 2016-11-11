<?php session_start(); 

require_once('../moteur/dbconfig.php');

include "tete.php" ;
// on extrait le nom du chantier
           
             $req = $bdd->prepare("SELECT * FROM chantiers WHERE id = :id_chantier ");
    $req->execute(array('id_chantier' => $_GET["id"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

       
            $nom_chantier = $donnees['nom'];
          
               

           }
              $req->closeCursor(); // Termine le traitement de la requête

// on extrait le nom du folio et le nom du fichier à afficher 
               $req = $bdd->prepare("SELECT * FROM folios WHERE id = :id_folio AND id_chantier = :id_chantier ");
    $req->execute(array('id_folio' => $_GET["fid"], 'id_chantier' => $_GET["id"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

       
            $nom_folio = $donnees['nom'];
            $nom_fichier_folio = $donnees['nom_fichier'];
          
               

           }
              $req->closeCursor(); // Termine le traitement de la requête
// on determine la resolution de notre fichier folio
              $fichier = "../images/folios/".$nom_fichier_folio;
              $dimensions = getimagesize($fichier);
              $LONG = $dimensions[0];
              $LARG = $dimensions[1];
                ?>





<br>
<div class="alert alert-info" role="alert">
<p><b>
Chantier N° <?php echo($_GET["id"]); ?>: <?php echo($nom_chantier); ?>  , Folio: 
<select class="chzn-select" name="forma" onchange="location = this.value;">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM folios WHERE id_chantier = :id_chantier ");
    $req->execute(array('id_chantier' => $_GET["id"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="saisie.php?id=<?php echo $_GET["id"]?>&fid=<?php echo($donnees['id'])?>" <?php if($donnees['id'] == $_GET["fid"] ){echo'selected="selected"';} ?>><?php echo($donnees['nom']);?></option>

 <?php }?>

</select> (<?php echo($_GET["id"]); ?>-<?php echo($_GET["fid"]); ?>)</b>

<?php $req->closeCursor(); // Termine le traitement de la requête ?>





<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Poser des points
<input type="checkbox" id="pose" name="pose" checked>
</label>
</p> <div id="mouse-position"></div></div>
    
      <select id="type"style="display: none;">
        <option value="Point">Poser les points</option>
        <option value="None">None</option>
      </select>
    <div id="map" class="map" id="popup" ></div>
      <body>
    <div id="map" class="map"></div>
   
    
      
      <input id="precision" type="hidden" min="0" max="12" value="4"/>
    
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>&nbsp&nbspDéposer un point!</b></h4>
      </div>
      <div class="modal-body">

        <form>
   <script type="text/javascript">
$(function(){
    $(".chzn-select").chosen({
    disable_search_threshold: 10,
    no_results_text: "Oops, nothing found!",
    width: "30px"
  });
});
</script>
        <input type="hidden" id="coordos"> 
        <label for="bat">localisation:&nbsp</label><input type="text" name="bat" id="bat" placeholder="Bat." maxlength="6" size="6" ><input type="text" name="entree" id="entree" placeholder="Entrée" maxlength="6" size="6"><input type="text" name="cage" id="cage" placeholder="Cage" maxlength="6" size="6" ><input type="text" name="etage" id="etage" placeholder="Étage" maxlength="6" size="6"><input type="text" name="numero" id="numero" placeholder="Numéro" maxlength="6" size="6"><br>
        
        <label for="corps">Corps de metier: </label>
<select name="corps" id="corps">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM corps ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>"><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>


        <br>

        <label for="materiaux">Matériaux:&nbsp </label><select name="materiaux" id="materiaux">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM materiaux ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>"><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select>

<label for="objet">  &nbspObjets:&nbsp </label><select  data-placeholder="Your Favorite Types of Bear" multiple class="chzn-select" style="width:350px;">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM objets ");
    $req->execute(array());
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
                <option value="<?php echo($donnees['id']);?>"><?php echo($donnees['nom']);?></option>

 <?php };
  $req->closeCursor(); // Termine le traitement de la requête ?>

</select><br>
        
        <label for="description">Description:&nbsp</label><input  name="description" id="description" type="text" size="35" ><label for="quantite">&nbspQuantité:&nbsp</label><input name="quantite" style="width: 50Px;" id="quantite" type="number" min="1" value="1" ><br>
        <label for="longueur">Longueur:&nbsp</label><input type="number" name="longueur" id="longueur" style="width: 50Px;" min="0"  size="3" placeholder="cm." ><label for="largeur">&nbspLargeur:&nbsp</label><input type="number" name="largeur" id="largeur" style="width: 50Px;" min="0" size="3" placeholder="cm."><label for="hauteur"> &nbspHauteur:&nbsp</label><input type="number"  name="hauteur" id="hauteur" style="width: 50Px;" min="0" size="3" placeholder="cm."><br><br>
        



<script language="javascript" type="text/javascript">
            document.getElementById("objet_chosen").style.width = 400;
        
    
</script>


<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="qualite">Qualité:</label> <input  type="range"  style="width: 150px;display: inline;"  name="qualite" id="qualite" value="0" min="0" max="5" onchange="updatenote_qualite(this.value)"><b>&nbsp<font name="label_qualite" id="label_qualite" size="4">0</font><font size="4">/5</font></b><br><label for="c2">commentaire:&nbsp</label><input name="c1" id="c1" type="text"  ><br>
 </div>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="risque">Risque dépose: </label> <input type="range" style="width: 150px;display: inline;" name="risque" id="risque" value="0" min="0" max="5" onchange="updatenote_risque(this.value)"><b>&nbsp<font name="label_risque" id="label_risque" size="4">0</font><font size="4">/5</font></b><br><label for="c2">commentaire:&nbsp</label><input type="text" name="c2" id="c2" ><br>
 </div>
</div>  
</div>
</div>
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
        <label for="traitement">Compléxité traitement: </label><input type="range" style="width: 150px;display: inline;" name="traitement"  id="traitement" value="0" min="0" max="5" onchange="updatenote_traitement(this.value)"><b>&nbsp<font name="label_traitement" id="label_traitement" size="4">0</font><font size="4">/5</font></b><br><label for="c3">commentaire:&nbsp</label><input type="text" name="c3" id="c3" ><br>
 </div>
</div>
   </div>
</div>     
<div class="row">
  <div class="col-md-11">
<div class="panel panel-default">
  <div class="panel-body">
    <label for="stockage">Compléxité conditionnement et stockage: </label> <input type="range" style="width: 150px;display: inline;" name="stockage" id="stockage" value="0" min="0" max="5" onchange="updatenote_stockage(this.value)"><b>&nbsp<font name="label_stockage" id="label_stockage" size="4">0</font><font size="4">/5</font></b><br><label for="c4">commentaire:&nbsp</label><input type="text" name="c4" id="c4" ><br>
  </div>
</div>
</div>
</div>
<label for="fileToUpload">Photo:</label><input name="fileToUpload" id="fileToUpload" type="file"  ><br>
        <label for="remarques">Remarques:&nbsp</label><input name="remarques"  id="remarques" type="text" size="50" >
      
      </div>
        
        
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        
      </div>
    </div>
  </div>
</div>
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


var mousePositionControl = new ol.control.MousePosition({
        coordinateFormat: ol.coordinate.createStringXY(4),
        projection: 'EPSG:4326',
        // comment the following two lines to have the mouse position
        // be placed within the map.
        className: 'custom-mouse-position',
        target: document.getElementById('mouse-position'),
        undefinedHTML: '&nbsp;'
      });

      // Map views always need a projection.  Here we just want to map image
      // coordinates directly to map coordinates, so we create a projection that uses
      // the image extent in pixels.

 var extent = [0, 0, <?php echo($LONG); ?>, <?php echo($LARG); ?> ];
      var projection = new ol.proj.Projection({
        code: 'EPSG:4326',
        units: 'pixels',
        extent: extent
      });
    

      var source = new ol.source.Vector({wrapX: false});

      var vector = new ol.layer.Vector({
        source: source,
        style: new ol.style.Style({
          fill: new ol.style.Fill({
            color: 'rgba(40, 255, 0, 1.2)'
          }),
          stroke: new ol.style.Stroke({
            color: '#ccff33',
            width: 2
          }),
          image: new ol.style.Circle({
            radius: 10,
            fill: new ol.style.Fill({
              color: '#ffcc33'
            })
          })
        })
      });

      var map = new ol.Map({
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }).extend([mousePositionControl]),
        layers: [
          new ol.layer.Image({
            source: new ol.source.ImageStatic({
              attributions: '<a href="http://www.emancipo.tk">© Martin VERT</a>',
              url: '<?php echo("../images/folios/".$nom_fichier_folio); ?>',
              projection: projection,
              imageExtent: extent
            })
          }),vector
        ],

        target: 'map',
        logo: false,
        view: new ol.View({
          projection: projection,
          center: ol.extent.getCenter(extent),
          
          zoom: 2,
          maxZoom: 6
        })
      });

      var typeSelect = document.getElementById('type');

      var draw; // global so we can remove it later
      function addInteraction() {
        var value = typeSelect.value;
        if (document.getElementById('pose').checked) {
          var geometryFunction, maxPoints;
         
          draw = new ol.interaction.Draw({
            source: source,
            type: /** @type {ol.geom.GeometryType} */ (value),
            geometryFunction: geometryFunction,
            maxPoints: maxPoints
          });
          map.addInteraction(draw);
          
        }
      }

function spot_add() {
  document.getElementById('coordos').value = document.getElementsByClassName('custom-mouse-position')[0].innerText;
  $('#myModal').modal();
}

map.on("click", function(e) {
    map.forEachFeatureAtPixel(e.pixel, function (feature, layer) {
       spot_add()
    })
});
      /**
       * Handle change event.
       */
      pose.onchange = function() {
        map.removeInteraction(draw);
        addInteraction();
      };

      addInteraction();
        

var projectionSelect = document.getElementById('projection');

     

      var precisionInput = document.getElementById('precision');
      precisionInput.addEventListener('change', function(event) {
        var format = ol.coordinate.createStringXY(event.target.valueAsNumber);
        mousePositionControl.setCoordinateFormat(format);
      });
    </script>
  

<?php include "pied.php";?>






