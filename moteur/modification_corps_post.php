<?php

session_start();



try {
    // On se connecte à MySQL
    include('../moteur/dbconfig.php');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
// Insertion du post à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE corps 

    SET               nom = :nom, 
                      description = :description,
                      couleur = :couleur
                      
                      
                        
                     WHERE id = :id


    ');
$req->execute(array(
    'id' => $_POST['id'],
    'nom' => $_POST['nom'],
    'description' => $_POST['description'],
    'couleur' => $_POST['couleur']));




$req->closeCursor();


// Redirection du visiteur vers la page de gestion des affectation
header("Location:../ifaces/edition_corps.php?msg=Corps d'état édité avec succes!");
