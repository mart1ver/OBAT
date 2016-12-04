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
$req = $bdd->prepare('UPDATE notes 

    SET id = 0,     coef_qualité = :coef_qualité, 
                      coef_depose = :coef_depose,
                      coef_traitement = :coef_traitement, 
                      coef_stockage = :coef_stockage 
                      
                        
                     


    ');
$req->execute(array(
    'coef_qualité' => $_POST['note1'], 
    'coef_depose' => $_POST['note2'],
    'coef_traitement' => $_POST['note3'], 
    'coef_stockage' => $_POST['note4']));



  $req->closeCursor();
// Redirection du visiteur vers la page de gestion des affectation
header('Location:../ifaces/notes.php?msg=Coefs édités avec succes!');
 