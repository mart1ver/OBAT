<?php
session_start();

require_once('../moteur/dbconfig.php');

include "tete.php"
?>


<br><br>
<h2>Au travail bande de brutes!</h2>
<p><b>
        Nombre de chantiers en base:
        <?php
        $req = $bdd->prepare("SELECT COUNT(id) as count FROM chantiers");
        $req->execute();
        while ($donnees = $req->fetch()) {
            echo(" " . $donnees['count']);
        };
        $req->closeCursor(); // Termine le traitement de la requête 
        ?>
        <br>
        Nombre de spots en base:
        <?php
        $req = $bdd->prepare("SELECT COUNT(id) as count FROM spots");
        $req->execute();
        while ($donnees = $req->fetch()) {
            echo(" " . $donnees['count']);
        };
        $req->closeCursor(); // Termine le traitement de la requête 
        ?>
        <br>
        Nombre de corps de metiers en base:
        <?php
        $req = $bdd->prepare("SELECT COUNT(id) as count FROM corps");
        $req->execute();
        while ($donnees = $req->fetch()) {
            echo(" " . $donnees['count']);
        };
        $req->closeCursor(); // Termine le traitement de la requête 
        ?>
        <br>
        Nombre de typologies en base:
        <?php
        $req = $bdd->prepare("SELECT COUNT(id) as count FROM typologies");
        $req->execute();
        while ($donnees = $req->fetch()) {
            echo(" " . $donnees['count']);
        };
        $req->closeCursor(); // Termine le traitement de la requête 
        ?>
        <br>
        Nombre de materiels en base:
        <?php
        $req = $bdd->prepare("SELECT COUNT(id) as count FROM objets");
        $req->execute();
        while ($donnees = $req->fetch()) {
            echo(" " . $donnees['count']);
        };
        $req->closeCursor(); // Termine le traitement de la requête 
        ?><br>
        Nombre de materiaux en base:
<?php
$req = $bdd->prepare("SELECT COUNT(id) as count FROM materiaux");
$req->execute();
while ($donnees = $req->fetch()) {
    echo(" " . $donnees['count']);
};
$req->closeCursor(); // Termine le traitement de la requête 
?>
        <br>
    </b></p>


<?php include "pied.php"; ?>






