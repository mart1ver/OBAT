<?php
session_start();

require_once('../moteur/dbconfig.php');
require_once('../moteur/uploadPhotoConfig.php');
include "tete.php";
// on extrait le nom du chantier

$req = $bdd->prepare("SELECT * FROM chantiers WHERE id = :id_chantier ");
$req->execute(array('id_chantier' => $_GET["id"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {


    $nom_chantier = $donnees['nom'];
}
$req->closeCursor(); // Termine le traitement de la requête
// on extrait le nom du folio et le nom du fichier à afficher 
$req = $bdd->prepare("SELECT * FROM folios WHERE id = :id_folio AND id_chantier = :id_chantier ");
$req->execute(array('id_folio' => $_GET["fid"], 'id_chantier' => $_GET["id"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {


    $nom_folio = $donnees['nom'];
    $nom_fichier_folio = $donnees['nom_fichier'];
}
$req->closeCursor(); // Termine le traitement de la requête
// on determine la resolution de notre fichier folio
$fichier = "../images/folios/" . $nom_fichier_folio;
$dimensions = getimagesize($fichier);
$LONG = $dimensions[0];
$LARG = $dimensions[1];
?>





<br>
<div class="alert alert-warning" role="alert">
    <p><b>
            Chantier N° <?php echo($_GET["id"]); ?>: <?php echo($nom_chantier); ?>  , Folio: 
            <select class="chzn-select" name="forma" onchange="location = this.value;">

<?php
// On recupère tout le contenu de la table chantiers

$req = $bdd->prepare("SELECT * FROM folios WHERE id_chantier = :id_chantier ");
$req->execute(array('id_chantier' => $_GET["id"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    ?>


                    <option value="saisie.php?id=<?php echo $_GET["id"] ?>&fid=<?php echo($donnees['id']) ?>" <?php if ($donnees['id'] == $_GET["fid"]) {
                    echo'selected="selected"';
                } ?>><?php echo($donnees['nom']); ?></option>

                <?php } ?>

            </select> (<?php echo($_GET["id"]); ?>-<?php echo($_GET["fid"]); ?>)</b>

<?php $req->closeCursor(); // Termine le traitement de la requête  ?>






    <div id="mouse-position"></p></div></div>



<div id="map" class="map"><div id="popup"></div></div>



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

                <form name="formspot" id="formspot" enctype="multipart/form-data" action="../moteur/saisie_post.php" method="post">


                    <input type="hidden" id="coordos" name="coordos"> 
                    <input type="hidden" id="cid" name="cid" value="<?php echo($_GET['id']); ?>"> 
                    <input type="hidden" id="fid" name="fid" value="<?php echo($_GET['fid']); ?>"> 
                    <label for="bat">localisation:&nbsp</label><input type="text" name="bat" id="bat" placeholder="Bat." maxlength="6" size="6" ><input type="text" name="entree" id="entree" placeholder="Entrée" maxlength="6" size="6"><input type="text" name="cage" id="cage" placeholder="Cage" maxlength="6" size="6" ><input type="text" name="etage" id="etage" placeholder="Étage" maxlength="6" size="6"><input type="text" name="numero" id="numero" placeholder="Numéro" maxlength="6" size="6"><br>






                    <label for="materiaux">Matériaux:&nbsp </label><select name="materiaux" id="materiaux"  onchange="document.getElementById('objet').disabled = true; document.getElementById('objet').value = '';"> 
                        <option value="0" selected="selected">-</option>
<?php
// On recupère tout le contenu de la table chantiers

$req = $bdd->prepare("SELECT * FROM materiaux WHERE visible = 'oui' ");
$req->execute(array());


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    ?>


                            <option value="<?php echo($donnees['id']); ?>"><?php echo($donnees['nom']); ?></option>

                        <?php };
                        $req->closeCursor(); // Termine le traitement de la requête 
                        ?>

                    </select>
                    <a href="edition_materiaux.php?saisie=1&cid=<?php echo($_GET['id']); ?>&fid=<?php echo($_GET['fid']); ?>">

                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <label for="objet">  &nbspMateriels:&nbsp </label><select name="objet" id="objet" onchange="document.getElementById('materiaux').disabled = true; document.getElementById('materiaux').value = '';">
                        <option value="0" selected="selected">-</option>
                        <?php
                        // On recupère tout le contenu de la table chantiers

                        $req = $bdd->prepare("SELECT * FROM objets WHERE visible = 'oui' ");
                        $req->execute(array());


                        // On affiche chaque entree une à une
                        while ($donnees = $req->fetch()) {
                            ?>


                            <option value="<?php echo($donnees['id']); ?>"><?php echo($donnees['nom']); ?></option>

                        <?php };
                        $req->closeCursor(); // Termine le traitement de la requête 
                        ?>



                    </select>
                    <a href="edition_materiels.php?saisie=1&cid=<?php echo($_GET['id']); ?>&fid=<?php echo($_GET['fid']); ?>">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    <br>

                    <label for="description">Description:&nbsp</label><input  name="description" id="description" type="text" size="35" ><label for="quantite">&nbspQuantité:&nbsp</label><input name="quantite" style="width: 50Px;" id="quantite" type="number" min="1" value="1" ><br>
                    <label for="longueur">Longueur:&nbsp</label><input type="number" name="longueur" id="longueur" style="width: 50Px;" min="0"  placeholder="cm." ><label for="largeur">&nbspLargeur:&nbsp</label><input type="number" name="largeur" id="largeur" style="width: 50Px;" min="0"  placeholder="cm."><label for="hauteur"> &nbspÉpaisseur/Hauteur:&nbsp</label><input type="number"  name="hauteur" id="hauteur" style="width: 50Px;" min="0"  placeholder="cm.">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <label for="definition">l'objet sera definit par:</label><br>
                                    <input type="radio" name="definition" value="0" checked ><label for="definition"> sa quantité uniquement</label><br>
                                    <input type="radio" name="definition" value="1"><label for="definition"> son volume(l*L*ep)</label><br>
                                    <input type="radio" name="definition" value="2"><label for="definition"> par sa longueur(L)</label><br>
                                    <input type="radio" name="definition" value="3"><label for="definition"> sa surface (l*L)</label>
                                    <br>


                                </div></div>

                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <label for="destination">déstination de l'objet:</label><br>
                                    <input type="checkbox" name="destination1" value="1" ><label for="destination1">Réemploi,</label><br>
                                    <input type="checkbox" name="destination2" value="1"><label for="destination2">Réutilisation,</label><br>
                                    <input type="checkbox" name="destination3" value="1"><label for="destination3">Recyclage</label>

                                    <br>


                                </div></div>

                        </div>
                    </div>



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
                    <label for="fichier">Photo:</label><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                    <input name="fichier" type="file" id="fichier_a_uploader"
                           accept="image/*"  
                           /><br>
                    <label for="remarques">Remarques:&nbsp</label><input name="remarques"  id="remarques" type="text" size="50" >
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id ="submitForm" >Enregistrer</button>


                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <script>
                    $("#submitForm").on('click', function () {

                        if (document.getElementById("materiaux").value == 0) {

                            if (document.getElementById("objet").value == 0) {
                            } else {
                                $("#formspot").submit();

                            }



                        } else {
                            $("#formspot").submit();
                        }


                    });
                </script>
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

    var extent = [0, 0, <?php echo($LONG); ?>, <?php echo($LARG); ?>];


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
while ($donnees = $req->fetch()) {
    ?>

        var <?php echo("a" . $donnees['id']); ?> = new ol.Feature({
            geometry: new ol.geom.Point([<?php echo($donnees['coordos']); ?>]),
            name: '<?php echo('<a href="edite_point.php?pid=' . $donnees['id'] . '&cid=' . $_GET["id"] . '&fid=' . $_GET["fid"] . '">Point n°:' . $donnees['id'] . " ," . $donnees['nom'] . "</a>"); ?>'

        });



<?php };
$req->closeCursor(); // Termine le traitement de la requête 
?>




<?php
// On recupère tout les spots objets

$req = $bdd->prepare("SELECT spots.id, spots.coordos, objets.nom  FROM spots, objets   WHERE id_folio = :id_folio AND  objets.id = spots.id_objets ORDER BY id");
$req->execute(array('id_folio' => $_GET["fid"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    ?>

        var <?php echo("a" . $donnees['id']); ?> = new ol.Feature({
            geometry: new ol.geom.Point([<?php echo($donnees['coordos']); ?>]),
            name: '<?php echo('<a href="edite_point.php?pid=' . $donnees['id'] . '&cid=' . $_GET["id"] . '&fid=' . $_GET["fid"] . '">Point n°:' . $donnees['id'] . " ," . $donnees['nom'] . "</a>"); ?>'

        });



<?php };
$req->closeCursor(); // Termine le traitement de la requête 
?>





// ,php while2 , atributs des spots


<?php
// On recupère tout le contenu de la table chantiers

$req = $bdd->prepare("SELECT * FROM spots WHERE id_folio = :id_folio ");
$req->execute(array('id_folio' => $_GET["fid"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    ?>

    <?php echo("a" . $donnees['id']); ?>.setStyle(new ol.style.Style({
            image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
                color:
    <?php
    if ($donnees['id_objets'] == 0) {

        $req2 = $bdd->prepare("SELECT spots.id, corps.couleur
FROM corps, spots, materiaux
WHERE corps.id = materiaux.id_corp
AND materiaux.id = spots.id_materiaux
AND spots.id = :id_spot");
        $req2->execute(array('id_spot' => $donnees['id']));


        // On affiche chaque entree une à une
        while ($donnees2 = $req2->fetch()) {
            echo("'" . $donnees2['couleur'] . "'");
        };
        $req2->closeCursor(); // Termine le traitement de la requête 
    } else {
        $req2 = $bdd->prepare("SELECT spots.id, corps.couleur
FROM corps, spots, objets
WHERE corps.id = objets.id_corp
AND objets.id = spots.id_objets
AND spots.id = :id_spot");
        $req2->execute(array('id_spot' => $donnees['id']));


        // On affiche chaque entree une à une
        while ($donnees2 = $req2->fetch()) {
            echo("'" . $donnees2['couleur'] . "'");
        };
        $req2->closeCursor(); // Termine le traitement de la requête 
    };
    ?>,

                src: '<?php if ($donnees['id_objets'] == 0) {
        echo("../images/images/cross.png");
    } else {
        echo("../images/images/dot.png");
    }; ?>'
            }))
        }));





<?php };
$req->closeCursor(); // Termine le traitement de la requête 
?>


// ,php while3 




<?php
$features = "";
// On recupère tout le contenu de la table chantiers

$req = $bdd->prepare("SELECT * FROM spots WHERE id_folio = :id_folio ");
$req->execute(array('id_folio' => $_GET["fid"]));


// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    $features = "a" . $donnees['id'] . "," . $features;
};
$req->closeCursor(); // Termine le traitement de la requête 
?>






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
            url: '<?php echo("../images/folios/" . $nom_fichier_folio); ?>',
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
        interactions: ol.interaction.defaults({doubleClickZoom: false}),
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




    function spot_add() {
        document.getElementById('coordos').value = document.getElementsByClassName('custom-mouse-position')[0].innerText;
        $('#myModal').modal();
    }

    $(map.getViewport()).on("dblclick", function (e) {

        spot_add()

    });





    var precisionInput = document.getElementById('precision');
    precisionInput.addEventListener('change', function (event) {
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
    map.on('click', function (evt) {
        $(prevelement).popover('destroy');

        var feature = map.forEachFeatureAtPixel(evt.pixel,
                function (feature) {
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
            var prevelement = document.getElementById('popup');

        } else {

            $(element).popover('destroy');
        }
    });



</script>


<?php include "pied.php"; ?>






