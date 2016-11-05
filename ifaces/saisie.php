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
<select name="forma" onchange="location = this.value;">

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
</p></div>
    
      <select id="type"style="display: none;">
        <option value="Point">Poser les points</option>
        <option value="None">None</option>
      </select>
    <div id="map" class="map" id="popup" ></div>
      <body>
    <div id="map" class="map"></div>
    <div id="mouse-position"></div>
    
      
      <input id="precision" type="number" min="0" max="12" value="4"/>
    
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Fait peter le spot!</h4>
      </div>
      <div class="modal-body">
        <input id="coordos" </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script>


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
            color: 'rgba(255, 255, 255, 0.2)'
          }),
          stroke: new ol.style.Stroke({
            color: '#ffcc33',
            width: 2
          }),
          image: new ol.style.Circle({
            radius: 4,
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
  document.getElementById('cordos').value = document.getElementById('mouse_pos').textContent;
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






