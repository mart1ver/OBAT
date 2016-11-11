<?php session_start();


          
    $req->closeCursor(); // Termine le traitement de la requête              
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
// mot de passe crypté md5 

// Insertion du post à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO spots (coordos, bat_entree_cage_etage_numero, id_materiaux, id_objets) VALUES(?, ?, ?, ?)');
    $req->execute(array($_POST['nom'], $_POST['adresse'] , $_POST['commentaire'], "oui"));
    $req->closeCursor();

// Redirection du visiteur vers la page de gestion des affectation
    header('Location:../ifaces/saisie.php');
  

?>

