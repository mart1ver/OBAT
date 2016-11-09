<?php session_start();
         try
            {
            // On se connecte à MySQL
            include('../moteur/dbconfig.php');
            }
            catch(Exception $e)
            {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
            }
 
            // Si tout va bien, on peut continuer
 $req = $bdd->prepare("SELECT SUM(id) FROM objets WHERE nom = :nom ");//SELECT `titre_affectation` FROM affectations WHERE titre_affectation = "conssomables" LIMIT 1
$req->execute(array('nom' => $_POST['nom']));
$donnees = $req->fetch();
$req->closeCursor(); // Termine le traitement de la requête
if ($donnees['SUM(id)'] > 0) // SI le titre existe
{
header("Location:../ifaces/edition_materiels.php?err=Un objet porte deja le meme nom!&nom=".$_POST['nom']."&description=".$_POST['description']."&couleur=".substr($_POST['couleur'],1));
$req->closeCursor(); // Termine le traitement de la requête
}
else 
{
$req->closeCursor(); // Termine le traitement de la requête
                
//martin vert
// Connexion à la base de données
try
{
include('dbconfig.php');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Insertion du post à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO objets (nom,  couleur, description, visible, id_typologie, id_nature, id_corp) VALUES(?,?,?,?,?,?,?)');
$req->execute(array($_POST['nom'],  $_POST['couleur'] , $_POST['description'], "oui", $_POST['typologie'], $_POST['nature'], $_POST['corp']));
  $req->closeCursor();
// Redirection du visiteur vers la page de gestion des affectation
//header('Location:../ifaces/edition_materiels.php?msg=Objet enregistrée avec succes!');
  echo($_POST['typologie']);
  echo($_POST['nature']);
  echo($_POST['corp']);
    echo("--");
  echo($_POST['nom']);
  echo("--");
  echo($_POST['couleur']);
  echo("--");
  echo($_POST['description']);
 }
?>
