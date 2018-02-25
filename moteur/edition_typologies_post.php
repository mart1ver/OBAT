<?php

session_start();
try {
    // On se connecte à MySQL
    include('../moteur/dbconfig.php');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer
$req = $bdd->prepare("SELECT SUM(id) FROM typologies WHERE nom = :nom "); //SELECT `titre_affectation` FROM affectations WHERE titre_affectation = "conssomables" LIMIT 1
$req->execute(array('nom' => $_POST['nom']));
$donnees = $req->fetch();
$req->closeCursor(); // Termine le traitement de la requête
if ($donnees['SUM(id)'] > 0) { // SI le titre existe
    header("Location:../ifaces/edition_typologies.php?err=Une typologie porte deja le meme nom!&nom=" . $_POST['nom'] . "&description=" . $_POST['description'] . "&couleur=" . substr($_POST['couleur'], 1));
    $req->closeCursor(); // Termine le traitement de la requête
} else {
    $req->closeCursor(); // Termine le traitement de la requête
// Connexion à la base de données
    try {
        include('dbconfig.php');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
// Insertion du post à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO typologies (nom,  couleur, description, visible) VALUES(?, ?,  ?, ?)');
    $req->execute(array($_POST['nom'], $_POST['couleur'], $_POST['description'], "oui"));
    $req->closeCursor();
// Redirection du visiteur vers la page de gestion des affectation
    header('Location:../ifaces/edition_typologies.php?msg=Typologie enregistrée avec succes!');
}
?>
