<?php session_start(); 

require_once('../moteur/dbconfig.php');

include "tete.php" ?>


<br><br>
<h2>Chantier N° <?php echo($_GET["id"]); ?>, Folio N°<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">1</a>
    <a class="dropdown-item" href="#">2</a>
    <a class="dropdown-item" href="#">3</a>
      </div>
</div></h2>

<label>Poser des points
<input type="checkbox" id="pose" name="pose" checked>
</label>

    
      <select id="type"style="display: none;">
        <option value="Point">Poser les points</option>
        <option value="None">None</option>
      </select>
   

    <div id="map" class="map" id="popup"></div>

      <body>
    <div id="map" class="map"></div>
    <div id="mouse-position"></div>
    
      <label>Precision </label>
      <input id="precision" type="number" min="0" max="12" value="4"/>
    </form>
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

 var extent = [0, 0, 1024, 800];
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
              url: '../images/folios/1.jpg',
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






