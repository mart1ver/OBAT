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

    $req = $bdd->prepare("SELECT SUM(id) FROM chantiers WHERE nom = :nom ");
    $req->execute(array('nom' => $_POST['nom']));
    $donnees = $req->fetch();
    $req->closeCursor(); // Termine le traitement de la requête
              if ($donnees['SUM(id)'] > 0) // SI le titre existe
{
    header("Location:../ifaces/chantiers.php?err=Un chantier porte deja le meme nom!&nom=".$_POST['nom']."&lien=".$_POST['adresse']."&commentaire=".$_POST['commentaire']);
    $req->closeCursor(); // Termine le traitement de la requête
}
            else 
{
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
    $req = $bdd->prepare('INSERT INTO chantiers (nom, adresse, commentaire, visible, login, pass) VALUES(?, ?, ?, ?,?,?)');
    $req->execute(array($_POST['nom'], $_POST['adresse'] , $_POST['commentaire'], "oui", $_POST['idclient'], $_POST['mdpclient']));
    $req->closeCursor();

// Redirection du visiteur vers la page de gestion des affectation
    header('Location:../ifaces/chantiers.php?msg=Chantier ajouté avec succes!&nom=&adresse=&commentaire=');
  }

?>

