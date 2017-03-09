<?php
session_start();

require_once('../moteur/dbconfig.php');

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



//on extrait les coefs (poids de chaque notes)
$req2 = $bdd->prepare("SELECT *  FROM notes  ");
$req2->execute();


// On affiche chaque entree une à une
while ($donnees2 = $req2->fetch()) {
    $coef_qualite = $donnees2['coef_qualite'];
    $coef_depose = $donnees2['coef_depose'];
    $coef_traitement = $donnees2['coef_traitement'];
    $coef_stockage = $donnees2['coef_stockage'];
}



$req2->closeCursor(); // Termine le traitement de la requête 
?>
<br>
<div class="alert alert-info" role="alert" id = "tete">

    <b>
        Chantier N° <?php echo($_GET["id"]); ?>: <?php echo($nom_chantier); ?>  , Folio: 
        <select class="chzn-select" name="forma" onchange="location = this.value;">

            <?php
// On recupère tout le contenu de la table chantiers

            $req = $bdd->prepare("SELECT * FROM folios WHERE id_chantier = :id_chantier ");
            $req->execute(array('id_chantier' => $_GET["id"]));


// On affiche chaque entree une à une
            while ($donnees = $req->fetch()) {
                ?>


                <option value="recherche.php?id=<?php echo $_GET["id"] ?>&fid=<?php echo($donnees['id']) ?>&rcorps=<?php echo($_GET["rcorps"]); ?>&rtypo=<?php echo($_GET["rtypo"]); ?>&ro=<?php echo($_GET["ro"]); ?>&rm=<?php echo($_GET["rm"]); ?>" <?php
                if ($donnees['id'] == $_GET["fid"]) {
                    echo'selected="selected"';
                }
                ?>><?php echo($donnees['nom']); ?></option>

<?php } ?>

        </select> (<?php echo($_GET["id"]); ?>-<?php echo($_GET["fid"]); ?>)</b>

    <?php
    $req->closeCursor(); // Termine le traitement de la requête 

    $rcorps = $_GET["rcorps"];
    $rtypo = $_GET["rtypo"];

    if ($_GET["ro"] == 0) {
        $ro = 1000000000000;
    } else {
        $ro = 0;
    }

    if ($_GET["rm"] == 0) {
        $rm = 1000000000000;
    } else {
        $rm = 0;
    }
    ?>




    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#liste">
        <button>Liste des spots</button>
    </a>



    <div id="mouse-position" hidden></div>
    <div class="row">
        <div class="col-md-9 col-md-offset-1">

            <p><b>Filtrer les spots sur ce folio: corps de metier: <select class="chzn-select" name="forma" onchange="location = this.value;">
                        <option value="recherche.php?id=<?php echo $_GET["id"]; ?>&fid=<?php echo($_GET["fid"]); ?>&rcorps=<?php echo('0'); ?>&rtypo=<?php echo($_GET["rtypo"]); ?>&ro=<?php echo($_GET["ro"]); ?>&rm=<?php echo($_GET["rm"]); ?>"<?php
                                if ($donnees['id'] == $_GET["rcorps"]) {
                                    echo'selected="selected"';
                                }
                                ?>>-</option>
                                <?php
// On recupère tout le contenu de la table chantiers

                                $req = $bdd->prepare("SELECT * FROM corps ");
                                $req->execute();


// On affiche chaque entree une à une
                                while ($donnees = $req->fetch()) {
                                    ?>


                            <option value="recherche.php?id=<?php echo $_GET["id"]; ?>&fid=<?php echo($_GET["fid"]); ?>&rcorps=<?php echo($donnees['id']); ?>&rtypo=<?php echo($_GET["rtypo"]); ?>&ro=<?php echo($_GET["ro"]); ?>&rm=<?php echo($_GET["rm"]); ?>"<?php
                        if ($donnees['id'] == $_GET["rcorps"]) {
                            echo'selected="selected"';
                        }
                                    ?>><?php echo($donnees['nom']); ?></option>
                                <?php } ?>

                    </select>
                    <label><input type="checkbox" id="objets" onchange="location = this.value;" value="recherche.php?id=<?php echo $_GET["id"]; ?>&fid=<?php echo($_GET["fid"]); ?>&fid=<?php echo($_GET["fid"]); ?>&rcorps=<?php echo($_GET["rcorps"]); ?>&rtypo=<?php echo($_GET["rtypo"]); ?>&ro=<?php
                                  if ($_GET["ro"] == "0") {
                                      echo("1");
                                  } else {
                                      echo("0");
                                  };
                                  ?>&rm=<?php echo($_GET["rm"]); ?>"<?php
                                  if ($_GET["ro"] == "1") {
                                      echo'checked';
                                  }
                                  ?>> Materiels,</label>
                    <label><input type="checkbox" id="materiaux" onchange="location = this.value;" value="recherche.php?id=<?php echo $_GET["id"]; ?>&fid=<?php echo($_GET["fid"]); ?>&fid=<?php echo($_GET["fid"]); ?>&rcorps=<?php echo($_GET["rcorps"]); ?>&rtypo=<?php echo($_GET["rtypo"]); ?>&ro=<?php echo($_GET["ro"]); ?>&rm=<?php
                                  if ($_GET["rm"] == "0") {
                                      echo("1");
                                  } else {
                                      echo("0");
                                  };
                                  ?>"<?php
                                  if ($_GET["rm"] == "1") {
                                      echo'checked';
                                  }
                                  ?>> Materiaux,</label><br>
                                  <label>Numero de fiche: </label><input type="text" name="nume" id="nume" placeholder="#" maxlength="6" size="6"  >
                                  &nbsp
                                  <button type="button" class="btn btn-danger" id ="go" name="go" 

                                  >GO!</button>
                </b>
            </p> 

        </div>
    </div>

</div>
<div id="map" class="map"><div id="popup"></div></div>
<div id="liste" >
    <h1>liste précise des spots:</h1> 
    <div id="dvData">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date de création</th>
                    
                    <th>Type d'objet ou de materiaux</th>
                    
                    <th>Corps de metier</th>    
                    <th>Note globale</th> 
                    <th></th>        
                </tr>
            </thead>
            <tbody>
                <?php
                $reponse = $bdd->prepare('SELECT spots.* FROM spots 
WHERE id_folio=:fid AND (id_objets > :ro OR id_materiaux > :rm )');
                $reponse->execute(array('ro' => $ro, 'rm' => $rm, 'fid' => $_GET["fid"]));
                // On affiche chaque entree une à une
                while ($donnees = $reponse->fetch()) {

                    if ($donnees['id_objets'] == 0) {
                        $reponse2 = $bdd->prepare('SELECT materiaux.* FROM materiaux 
            WHERE id=:id');
                        $reponse2->execute(array('id' => $donnees['id_materiaux']));
                        // On affiche chaque entree une à une
                        while ($donnees2 = $reponse2->fetch()) {
                            $nom = $donnees2['nom'];
                            $id_typologie = $donnees2['id_typologie'];
                            $id_corp = $donnees2['id_corp'];
                        }
                        $reponse2->closeCursor(); // Termine le traitement de la requête
                        //nom typo et corps
                        $reponse3 = $bdd->prepare('SELECT typologies.nom as nomtypo , corps.nom as nomcorps
                       FROM typologies, corps
                       WHERE typologies.id = :idtypo AND corps.id = :idcorps');
                        $reponse3->execute(array('idtypo' => $id_typologie, 'idcorps' => $id_corp));
                        // On affiche chaque entree une à une
                        while ($donnees3 = $reponse3->fetch()) {
                            $nom_typologie = $donnees3['nomtypo'];
                            $nom_corps = $donnees3['nomcorps'];
                        }
                        $reponse3->closeCursor(); // Termine le traitement de la requête
                    } else {
                        $reponse2 = $bdd->prepare('SELECT objets.* FROM objets 
                                             WHERE id=:id');
                        $reponse2->execute(array('id' => $donnees['id_objets']));
                        // On affiche chaque entree une à une
                        while ($donnees2 = $reponse2->fetch()) {
                            $nom = $donnees2['nom'];
                            $id_typologie = $donnees2['id_typologie'];
                            $id_corp = $donnees2['id_corp'];
                        }
                        $reponse2->closeCursor(); // Termine le traitement de la requête
                        //nom typo et corps
                        $reponse3 = $bdd->prepare('SELECT typologies.nom as nomtypo , corps.nom as nomcorps
                                                        FROM typologies, corps
                                                        WHERE typologies.id = :idtypo AND corps.id = :idcorps');
                        $reponse3->execute(array('idtypo' => $id_typologie, 'idcorps' => $id_corp));
                        // On affiche chaque entree une à une
                        while ($donnees3 = $reponse3->fetch()) {
                            $nom_typologie = $donnees3['nomtypo'];
                            $nom_corps = $donnees3['nomcorps'];
                        }
                        $reponse3->closeCursor(); // Termine le traitement de la requête
                    }
                    ?>

                    <?php
                    if ($_GET['rtypo'] == 0 AND $_GET['rcorps'] == 0) {
                        ?>
                        <tr> 
                            <td><?php echo $donnees['id'] ?></td>
                            <td><?php echo $donnees['timestamp'] ?></td>
                            
                            <td><?php echo ($nom) ?></td>
                            
                            <td><?php echo ($nom_corps) ?></td>
                            <td><?php
// noteg = (($donnees['qualite']*$coef_qualite)+($donnees['risque_depose']*$coef_depose)+($donnees['complexite_traitement']*$coef_traitement)+($donnees['complexite_stockage']*$coef_stockage))/$coef_qualite+$coef_depose+$coef_traitement+$coef_stockage;
                $noteg = (($donnees['qualite'] * $coef_qualite) + ((5 - $donnees['risque_depose']) * $coef_depose) + ((5 - $donnees['complexite_traitement']) * $coef_traitement) + ((5 - $donnees['complexite_stockage']) * $coef_stockage)) / ($coef_qualite + $coef_depose + $coef_traitement + $coef_stockage);

                echo(round($noteg, 3));
                        ?></td>
                            <td>
                               <a href="visualise_point.php?pid=<?php echo $donnees['id'] ?>&cid=<?php echo $_GET["id"]?>&fid=<?php echo $_GET["fid"]?>">
                                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                               </a> 
                            </td>
                        </tr>
        <?php
    }
    if ($_GET['rtypo'] > 0 AND $_GET['rcorps'] == 0) {
        if ($_GET['rtypo'] == $id_typologie) {
            ?>
                            <tr> 
                                <td><?php echo $donnees['id'] ?></td>
                                <td><?php echo $donnees['timestamp'] ?></td>
                                
                                <td><?php echo ($nom) ?></td>
                                
                                <td><?php echo ($nom_corps) ?></td>
                                <td> <?php
// noteg = (($donnees['qualite']*$coef_qualite)+($donnees['risque_depose']*$coef_depose)+($donnees['complexite_traitement']*$coef_traitement)+($donnees['complexite_stockage']*$coef_stockage))/$coef_qualite+$coef_depose+$coef_traitement+$coef_stockage;
                $noteg = (($donnees['qualite'] * $coef_qualite) + ((5 - $donnees['risque_depose']) * $coef_depose) + ((5 - $donnees['complexite_traitement']) * $coef_traitement) + ((5 - $donnees['complexite_stockage']) * $coef_stockage)) / ($coef_qualite + $coef_depose + $coef_traitement + $coef_stockage);
                echo(round($noteg, 3));
                ?></td>
                                <td>
                                   <a href="visualise_point.php?pid=<?php echo $donnees['id'] ?>&cid=<?php echo $_GET["id"]?>&fid=<?php echo $_GET["fid"]?>">
                                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                               </a> 
                                </td>
                            </tr>
            <?php
        }
    }
    if ($_GET['rtypo'] == 0 AND $_GET['rcorps'] > 0) {
        if ($_GET['rcorps'] == $id_corp) {
            ?>
                            <tr> 
                                <td><?php echo $donnees['id'] ?></td>
                                <td><?php echo $donnees['timestamp'] ?></td>
                                
                                <td><?php echo ($nom) ?></td>
                                
                                <td><?php echo ($nom_corps) ?></td>
                                <td> <?php
// noteg = (($donnees['qualite']*$coef_qualite)+($donnees['risque_depose']*$coef_depose)+($donnees['complexite_traitement']*$coef_traitement)+($donnees['complexite_stockage']*$coef_stockage))/$coef_qualite+$coef_depose+$coef_traitement+$coef_stockage;
                $noteg = (($donnees['qualite'] * $coef_qualite) + ((5 - $donnees['risque_depose']) * $coef_depose) + ((5 - $donnees['complexite_traitement']) * $coef_traitement) + ((5 - $donnees['complexite_stockage']) * $coef_stockage)) / ($coef_qualite + $coef_depose + $coef_traitement + $coef_stockage);
                echo(round($noteg, 3));
                ?></td>
                                <td>
                                  <a href="visualise_point.php?pid=<?php echo $donnees['id'] ?>&cid=<?php echo $_GET["id"]?>&fid=<?php echo $_GET["fid"]?>">
                                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                               </a> 
                                </td>
                            </tr>
            <?php
        }
    }
    if ($_GET['rtypo'] > 0 AND $_GET['rcorps'] > 0) {
        if ($_GET['rcorps'] == $id_corp AND $_GET['rtypo'] == $id_typologie) {
            ?>
                            <tr> 
                                <td><?php echo $donnees['id'] ?></td>
                                <td><?php echo $donnees['timestamp'] ?></td>
                                
                                <td><?php echo ($nom) ?></td>
                                
                                <td><?php echo ($nom_corps) ?></td>
                                <td> <?php
// noteg = (($donnees['qualite']*$coef_qualite)+($donnees['risque_depose']*$coef_depose)+($donnees['complexite_traitement']*$coef_traitement)+($donnees['complexite_stockage']*$coef_stockage))/$coef_qualite+$coef_depose+$coef_traitement+$coef_stockage;
                $noteg = (($donnees['qualite'] * $coef_qualite) + ((5 - $donnees['risque_depose']) * $coef_depose) + ((5 - $donnees['complexite_traitement']) * $coef_traitement) + ((5 - $donnees['complexite_stockage']) * $coef_stockage)) / ($coef_qualite + $coef_depose + $coef_traitement + $coef_stockage);
                echo(round($noteg, 3));
                ?></td>
                                <td>
                                    <a href="visualise_point.php?pid=<?php echo $donnees['id'] ?>&cid=<?php echo $_GET["id"]?>&fid=<?php echo $_GET["fid"]?>">
                                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                               </a> 
                                </td>
                            </tr>



            <?php
        }
    }
}
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
    </div>
    <a href="#" id ="export" role='button'>exporter cette liste</a>
    <p align="right"><a href="#tete">
            <button>Carte</button>
        </a></p>




</div>
<input id="precision" type="hidden" min="0" max="12" value="4"/>
<script type='text/javascript'>
    $(document).ready(function () {
        function exportTableToCSV($table, filename) {
            var $headers = $table.find('tr:has(th)')
                    , $rows = $table.find('tr:has(td)')
                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    , tmpColDelim = String.fromCharCode(11) // vertical tab character
                    , tmpRowDelim = String.fromCharCode(0) // null character
                    // actual delimiter characters for CSV format
                    , colDelim = '","'
                    , rowDelim = '"\r\n"';
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
                            , 'href': csvData
                                    //,'target' : '_blank' //if you want it to open in a new window
                        });
            }
            //------------------------------------------------------------
            // Helper Functions 
            //------------------------------------------------------------
            // Format the output so it has the appropriate delimiters
            function formatRows(rows) {
                return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
            }
            // Grab and format a row from the table
            function grabRow(i, row) {
                var $row = $(row);
                //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                var $cols = $row.find('td');
                if (!$cols.length)
                    $cols = $row.find('th');
                return $cols.map(grabCol)
                        .get().join(tmpColDelim);
            }
            // Grab and format a column from the table 
            function grabCol(j, col) {
                var $col = $(col),
                        $text = $col.text();
                return $text.replace('"', '""'); // escape double quotes
            }
        }
        // This must be a hyperlink
        $("#export").click(function (event) {
            // var outputFile = 'export'
            var outputFile = "obat-export" || 'export';
            outputFile = outputFile.replace('.csv', '') + '.csv'
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
    var extent = [0, 0, <?php echo($LONG); ?>, <?php echo($LARG); ?>];
    var projection = new ol.proj.Projection({
        code: 'xkcd-image',
        units: 'pixels',
        extent: extent
    });
// ,php while1 placement des spots si il doivent l'etre
<?php
// On recupère tout les spots materiaux 
$req = $bdd->prepare("SELECT spots.id, spots.coordos, materiaux.nom  FROM spots, materiaux   WHERE id_folio = :id_folio AND  materiaux.id = spots.id_materiaux ORDER BY id");
$req->execute(array('id_folio' => $_GET["fid"]));
// On affiche chaque entree une à une
while ($donnees = $req->fetch()) {
    ?>
        var <?php echo("a" . $donnees['id']); ?> = new ol.Feature({
            geometry: new ol.geom.Point([<?php echo($donnees['coordos']); ?>]),
            name: '<?php echo('<a href="visualise_point.php?pid='.$donnees['id'].'&cid='.$_GET["id"].'&fid='.$_GET["fid"].'">Point n°:'.$donnees['id']." ,".$donnees['nom']."</a>");?>'

        });
    <?php
};
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
            name: '<?php echo('<a href="visualise_point.php?pid='.$donnees['id'].'&cid='.$_GET["id"].'&fid='.$_GET["fid"].'">Point n°:'.$donnees['id']." ,".$donnees['nom']."</a>");?>'

        });
    <?php
};
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


    <?php
    if ($donnees['id_objets'] == 0) {

        $req2 = $bdd->prepare("SELECT spots.id, corps.couleur,corps.id AS corps
FROM corps, spots, materiaux
WHERE corps.id = materiaux.id_corp
AND materiaux.id = spots.id_materiaux
AND spots.id = :id_spot");
        $req2->execute(array('id_spot' => $donnees['id']));


        // On affiche chaque entree une à une
        while ($donnees2 = $req2->fetch()) {
            if($rcorps == $donnees2['corps'] || $rcorps == 0 ){}else{echo('opacity : 0 ,' );};
            if($rm > 0){echo('opacity : 0 ,' );};
            echo('color:' . "'" . $donnees2['couleur'] . "'");
                   };
        $req2->closeCursor(); // Termine le traitement de la requête 
    } else {
        $req2 = $bdd->prepare("SELECT spots.id, corps.couleur ,corps.id AS corps
FROM corps, spots, objets
WHERE corps.id = objets.id_corp
AND objets.id = spots.id_objets
AND spots.id = :id_spot");
        $req2->execute(array('id_spot' => $donnees['id']));


        // On affiche chaque entree une à une
        while ($donnees2 = $req2->fetch()) {
            if($rcorps == $donnees2['corps'] || $rcorps == 0 ){}else{echo('opacity : 0 ,' );};
            if($ro > 0){echo('opacity : 0 ,' );};
            echo('color:' . "'" . $donnees2['couleur'] . "'");
        };
        $req2->closeCursor(); // Termine le traitement de la requête 
    };
    ?>,

                src: '<?php
    if ($donnees['id_objets'] == 0) {
        echo("../images/images/cross.png");
    } else {
        echo("../images/images/dot.png");
    };
    ?>'
            }))
        }));





<?php
};
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


   
            var coordinates = a641.getGeometry().getCoordinates();
            
            popup.setPosition(coordinates);
             popup.setOffset([-44, -100]);

            $(element).popover({

                'placement': 'top',
                'html': true,
                'content': a641.get('name')
            });

            $(element).popover('show');


    // display popup on click
    map.on('click', function (evt) {
        console.log(evt);

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
      

        } else {

            $(element).popover('destroy');
        }
    });



</script>


<?php include "pied.php"; ?>






