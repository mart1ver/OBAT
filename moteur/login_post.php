<?php
session_start();
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
 
// extraction des identifiants root
$req = $bdd->prepare('SELECT * FROM config');
$req->execute();
    
$resultat = $req->fetch();
 
$_SESSION['rfu1'] = $resultat['rfu1'];
$_SESSION['rfu2'] = $resultat['rfu2'];
$_SESSION['login_root'] = $resultat['login_root'];
$_SESSION['mdp_root'] = $resultat['mdp_root'];
 
  
$req->closeCursor();
 








// Vérification des identifiants pour le root
$req = $bdd->prepare('SELECT * FROM config WHERE login_root = :login_root AND mdp_root = :mdp_root');
$req->execute(array(
    'login_root' => $_POST['login'],
    'mdp_root' => $_POST['pass']));
    
$resultat = $req->fetch();
 
if (!$resultat)
{
	$req->closeCursor();


	// Vérification des identifiants pour les non root
$req = $bdd->prepare('SELECT * FROM chantiers WHERE login = :login AND pass = :pass');
$req->execute(array(
    'login' => $_POST['login'],
    'pass' => $_POST['pass']));
    
$resultat = $req->fetch();
 
if (!$resultat)
{
	$_SESSION['user'] ="none";
	$req->closeCursor();


	// il faut encore verifier les acces visu...
   header ('location:../ifaces/login.php?err=Mauvais identifiant ou mot de passe !');



}
else{

$_SESSION['user'] ="pasroot";
$req->closeCursor();
    header ('location:../ifaces/recherche.php');
}



}
else
{
$_SESSION['user'] ="root";
$req->closeCursor();
    header ('location:../index.php');
}
 
?>