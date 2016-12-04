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
// Insertion du post à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE objets 

    SET               nom = :nom, 
                      description = :description,
                      couleur = :couleur,
                      id_typologie = :id_typologie, 
                      id_corp = :id_corp 
                      
                        
                     WHERE id = :id


    ');
$req->execute(array(
    'id' => $_POST['id'], 
    'nom' => $_POST['nom'], 
    'description' => $_POST['description'],
    'couleur' => $_POST['couleur'], 
    'id_typologie' => $_POST['typologie'], 
    'id_corp' => $_POST['corp']));



  $req->closeCursor();

 
// Redirection du visiteur vers la page de gestion des affectation
header('Location:../ifaces/edition_materiels.php?msg=Nature de materiel édité avec succes!');
 