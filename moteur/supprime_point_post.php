<?php session_start();


          
         
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
    $req = $bdd->prepare('DELETE FROM spots WHERE id = :id');
    $req->execute(array('id' => $_POST['pid']));
   
    $req->closeCursor();






// Redirection du visiteur vers la page de saisie
 header( "Location:../ifaces/saisie.php?id=".$_POST['cid']."&fid=".$_POST['fid']);
  

?>

