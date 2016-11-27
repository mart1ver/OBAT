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
<div class="alert alert-info" role="alert" id = "tete">
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

<?php $req->closeCursor(); // Termine le traitement de la requête 

$rcorps = $_GET["rcorps"];
$rtypo = $_GET["rtypo"];

if($_GET["ro"] == 0)
{
$ro = 1000000000000  ;
}else
{
$ro = 0;
}

if($_GET["rm"] == 0)
{
$rm = 1000000000000;  
}else
{
$rm = 0;
}

?>






 <div id="mouse-position"></p></div></div>
 <div class="row">
<p><b>Filtrer les spots sur ce folio:    corps de metier: <select class="chzn-select" name="forma" onchange="location = this.value;">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM corps ");
    $req->execute();
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
<option value="recherche.php?id=<?php echo $_GET["id"];?>&fid=<?php echo($_GET["fid"]);?>&rcorps=<?php echo($donnees['id']);?>&rtypo=<?php echo($_GET["rtypo"]);?>&rnature=<?php echo($_GET["rnature"]);?>&ro=<?php echo($_GET["ro"]);?>&rm=<?php echo($_GET["rm"]);?>"<?php if($donnees['id'] == $_GET["rcorps"] ){echo'selected="selected"';} ?>><?php echo($donnees['nom']);?></option>
 <?php }?>

</select>, typo:<select class="chzn-select" name="forma" onchange="location = this.value;">

<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM typologies ");
    $req->execute();
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
          
<option value="recherche.php?id=<?php echo $_GET["id"];?>&fid=<?php echo($_GET["fid"]);?>&rcorps=<?php echo($_GET["rcorps"]);?>&rtypo=<?php echo($donnees['id']);?>&rnature=<?php echo($_GET["rnature"]);?>ro=<?php echo($_GET["ro"]);?>&rm=<?php echo($_GET["rm"]);?>"<?php if($donnees['id'] == $_GET["rtypo"] ){echo'selected="selected"';} ?>><?php echo($donnees['nom']);?></option>
 <?php }?>

</select>
<label><input type="checkbox" id="objets" onchange="location = this.value;" value="recherche.php?id=<?php echo $_GET["id"];?>&fid=<?php echo($_GET["fid"]);?>&fid=<?php echo($_GET["fid"]);?>&rcorps=<?php echo($_GET["rcorps"]);?>&rtypo=<?php echo($_GET["rtypo"]);?>&rnature=<?php echo($_GET["rnature"]);?>&ro=<?php if($_GET["ro"] == "0"){echo("1");}else{echo("0");}; ?>&rm=<?php echo($_GET["rm"]);?>"<?php if($_GET["ro"] == "1" ){echo'checked';} ?>> Materiels</label>
<label><input type="checkbox" id="materiaux" onchange="location = this.value;" value="recherche.php?id=<?php echo $_GET["id"];?>&fid=<?php echo($_GET["fid"]);?>&fid=<?php echo($_GET["fid"]);?>&rcorps=<?php echo($_GET["rcorps"]);?>&rtypo=<?php echo($_GET["rtypo"]);?>&rnature=<?php echo($_GET["rnature"]);?>&ro=<?php echo($_GET["ro"]);?>&rm=<?php if($_GET["rm"] == "0"){echo("1");}else{echo("0");}; ?>"<?php if($_GET["rm"] == "1" ){echo'checked';} ?>> Materiaux</label>
     </b>

      <a href="#liste">
   <button>Liste des spots</button>
</a></p> </div>
   
<div id="map" class="map"><div id="popup"></div></div>
   
     <div id="liste" >
<p>liste précise des spots:</p> 










<div id="dvData">


      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Date de création</th>
            <th>coordnées</th>
            <th>corp de metier</th>
            <th>type d'objet ou de materiaux</th>
            <th>note globale</th>
            
            <th></th>
            
          </tr>
        </thead>
        <tbody>
        <?php 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->prepare('SELECT spots.* FROM spots 
WHERE id_folio=:fid AND (id_objets > :ro OR id_materiaux > :rm )');
 $reponse->execute(array('ro' => $ro,'rm' => $rm,'fid' => $_GET["fid"]));
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

           ?>
            <tr> 
            <td><?php echo $donnees['id']?></td>
            <td><?php echo $donnees['timestamp']?></td>
            <td><?php echo $donnees['coordos']?></td>
            <td><?php echo $donnees['coordos']?></td>
            <td><?php echo $donnees['description']?></td>
            <td> note</td>







<td>

<form action="modification_spot.php" method="post">

<input type="hidden" name ="id" id="id" value="<?php echo $donnees['id']?>">
<input type="hidden" name ="nom" id="nom" value="<?php echo $donnees['nom']?>">
<input type="hidden" name ="description" id="description" value="<?php echo $donnees['description']?>">
<input type="hidden" name ="couleur" id="couleur" value="<?php echo substr($_POST['couleur'],1)?>">

  <button  class="btn btn-warning btn-sm" >Modifier!</button>


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
</div>
            <div class='button'>
                <a href="#" id ="export" role='button'>Click On This Here Link To Export The Table Data into a CSV File
                </a>
            </div>

<a href="#tete">
   <button>Carte</button>
</a>



</div>
      
      <input id="precision" type="hidden" min="0" max="12" value="4"/>
    








<script type='text/javascript'>
        $(document).ready(function () {

            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character

                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';

                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';

                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                // For IE (tested 10+)
                if (window.navigator.msSaveOrOpenBlob) {
                    var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                        type: "text/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, filename);
                } else {
                    $(this)
                        .attr({
                            'download': filename
                            ,'href': csvData
                            //,'target' : '_blank' //if you want it to open in a new window
                    });
                }

                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  

                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();

                    return $text.replace('"', '""'); // escape double quotes

                }
            }


            // This must be a hyperlink
            $("#export").click(function (event) {
                // var outputFile = 'export'
                var outputFile = window.prompt("What do you want to name your output file (Note: This won't have any effect on Safari)") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData > table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>













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
        code: 'xkcd-image',
        units: 'pixels',
        extent: extent
      });

// ,php while1 placement des spots

<?php 
            // On recupère tout les spots materiaux 
           
             $req = $bdd->prepare("SELECT spots.id, spots.coordos, materiaux.nom  FROM spots, materiaux   WHERE id_folio = :id_folio AND  materiaux.id = spots.id_materiaux ORDER BY id");
    $req->execute(array('id_folio' => $_GET["fid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
           var <?php echo("a".$donnees['id']);?> = new ol.Feature({
        geometry: new ol.geom.Point([<?php echo($donnees['coordos']);?>]),
        name: '<?php echo("Point N:".$donnees['id']." ,".$donnees['nom']);?>'

      });

               

 <?php };
 $req->closeCursor(); // Termine le traitement de la requête ?>




<?php 
            // On recupère tout les spots objets
           
             $req = $bdd->prepare("SELECT spots.id, spots.coordos, objets.nom  FROM spots, objets   WHERE id_folio = :id_folio AND  objets.id = spots.id_objets ORDER BY id");
    $req->execute(array('id_folio' => $_GET["fid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
            
           var <?php echo("a".$donnees['id']);?> = new ol.Feature({
        geometry: new ol.geom.Point([<?php echo($donnees['coordos']);?>]),
        name: '<?php echo("Point N:".$donnees['id']." ,".$donnees['nom']);?>'

      });

               

 <?php };
 $req->closeCursor(); // Termine le traitement de la requête ?>


      


// ,php while2 , atributs des spots


<?php 
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM spots WHERE id_folio = :id_folio ");
    $req->execute(array('id_folio' => $_GET["fid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {

           ?>
                                
       <?php echo("a".$donnees['id']);?>.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          color: 
          <?php if($donnees['id_objets'] == 0 ) {
          
             $req2 = $bdd->prepare("SELECT spots.id, corps.couleur
FROM corps, spots, materiaux
WHERE corps.id = materiaux.id_corp
AND materiaux.id = spots.id_materiaux
AND spots.id = :id_spot");
    $req2->execute(array('id_spot' => $donnees['id']));
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req2->fetch())
           {
 echo("'".$donnees2['couleur']."'");

     

               

 };
 $req2->closeCursor(); // Termine le traitement de la requête 
          
          }else{
               $req2 = $bdd->prepare("SELECT spots.id, corps.couleur
FROM corps, spots, objets
WHERE corps.id = objets.id_corp
AND objets.id = spots.id_objets
AND spots.id = :id_spot");
    $req2->execute(array('id_spot' => $donnees['id']));
    
 
           // On affiche chaque entree une à une
           while ($donnees2 = $req2->fetch())
           {
echo("'".$donnees2['couleur']."'");

     

               

 };
 $req2->closeCursor(); // Termine le traitement de la requête 

          };?>,

          src: '<?php if($donnees['id_objets'] == 0 ) {echo("../images/images/cross.png");}else{echo("../images/images/dot.png");};?>'
        }))
      }));





 <?php };
 $req->closeCursor(); // Termine le traitement de la requête ?>

      
// ,php while3 




<?php 

 $features = "";
            // On recupère tout le contenu de la table chantiers
           
             $req = $bdd->prepare("SELECT * FROM spots WHERE id_folio = :id_folio ");
    $req->execute(array('id_folio' => $_GET["fid"]));
    
 
           // On affiche chaque entree une à une
           while ($donnees = $req->fetch())
           {
   $features = "a".$donnees['id'].",".$features;
 };
 $req->closeCursor(); // Termine le traitement de la requête ?>






      var vectorSource = new ol.source.Vector({
        features: [<?php echo($features) ?>]
        // ,projection: projection
      });




      var vectorLayer = new ol.layer.Vector({
        source: vectorSource
      });


      var mapLayer = new ol.layer.Image({
            source: new ol.source.ImageStatic({
              attributions: [
                new ol.Attribution({
                  html: '<a href="http://www.emancipo.tk">© Martin VERT</a>'
                })
              ],
              url: '<?php echo("../images/folios/".$nom_fichier_folio); ?>',
              projection: projection,
              imageExtent: extent
            })
          });


      var map = new ol.Map({
         controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }).extend([mousePositionControl]),
        interactions : ol.interaction.defaults({doubleClickZoom :false}),
        layers: [
          mapLayer,
          vectorLayer
        ],
        target: 'map',
        logo: false,
        view: new ol.View({
          projection: projection,
          center: ol.extent.getCenter(extent),
          zoom: 2,
         
        })
      });






      

     

      var precisionInput = document.getElementById('precision');
      precisionInput.addEventListener('change', function(event) {
        var format = ol.coordinate.createStringXY(event.target.valueAsNumber);
        mousePositionControl.setCoordinateFormat(format);
      });

var element = document.getElementById('popup');

      var popup = new ol.Overlay({
        element: element,
        positioning: 'bottom-center',
        stopEvent: false,
        offset: [0, 0]
      });
      map.addOverlay(popup);

      // display popup on click
      map.on('click', function(evt) {
        var feature = map.forEachFeatureAtPixel(evt.pixel,
            function(feature) {
              return feature;
            });
        if (feature) {
          
          var coordinates = feature.getGeometry().getCoordinates();
          popup.setPosition(coordinates);
          $(element).popover({
            'placement': 'top',
            'html': true,
            'content': feature.get('name')
          });

          $(element).popover('show');

        
        } else {

          $(element).popover('destroy');
        }
      });

    

    </script>
  

<?php include "pied.php";?>






