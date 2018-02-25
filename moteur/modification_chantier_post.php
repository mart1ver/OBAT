<?php

session_start();
//martin vert
// Connexion à la base de données
try {
    include('dbconfig.php');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Insertion du post à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE chantiers SET nom = :nom, adresse = :adresse , commentaire = :commentaire , login = :login , pass = :pass  WHERE id = :id');
$req->execute(array('nom' => $_POST['nom'], 'adresse' => $_POST['adresse'], 'commentaire' => $_POST['commentaire'], 'login' => $_POST['idclient'], 'pass' => $_POST['mdpclient'], 'id' => $_POST['id']));
$req->closeCursor();
// Redirection du visiteur vers la page de gestion des points de collecte
header('Location:../ifaces/chantiers.php');
?>

