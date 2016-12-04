<?php session_start();

        


// Insertion du post à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE notes 

    SET id = :id,     coef_qualité = :coef_qualité, 
                      coef_depose = :coef_depose,
                      coef_traitement = :coef_traitement, 
                      coef_stockage = :coef_stockage 
                      
                        
                      WHERE id = :id


    ');
$req->execute(array('id' => 0,'coef_qualité' => $_POST['note1'], 'coef_depose' => $_POST['note2'],'coef_traitement' => $_POST['note3'], 'coef_stockage' => $_POST['note4']));



  $req->closeCursor();
// Redirection du visiteur vers la page de gestion des affectation
header('Location:../ifaces/notes.php?msg=Coefs édités avec succes!');
 