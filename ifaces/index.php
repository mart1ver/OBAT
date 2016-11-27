<?php session_start(); 

require_once('../moteur/dbconfig.php');

include "tete.php" ?>


<br><br>
<h2>Au travail bande de brutes!</h2>
<p><b>
Nombre de chantiers en base:
<?php        
    $req = $bdd->prepare("SELECT COUNT(id) as count FROM chantiers");
    $req->execute();
    while ($donnees = $req->fetch())
    {echo(" ".$donnees['count']);};
    $req->closeCursor(); // Termine le traitement de la requête 
?>
<br>
Nombre de spots en base:<br>
Nombre de corps de metiers en base:<br>
Nombre de typologies en base:<br>
Nombre de materiels en base:<br>
Nombre de materiels en base:<br>
</b></p>


<?php include "pied.php";?>






