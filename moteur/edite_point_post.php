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
// mot de passe crypté md5 
$objet = 0;
if (isset($_POST['objet'])) {
   $objet = $_POST['objet'];
}
$materiaux = 0;
if (isset($_POST['materiaux'])) {
   $materiaux = $_POST['materiaux'];
}





/* 

UPDATE spots 

SET

id_folio,coordos = :fid, 
bat_entree_cage_etage_numero = :becen, 
id_materiaux :id_materiaux, 
id_objets = :id_objets,
description = :description,
quantite = :quantite ,
encombrement = : encombrement,
qualite = :qualite,
risque_depose = :risque_depose,
complexite_traitement = :complexite_traitement,
complexite_stockage = :complexite_stockage,
remarque = :remarque,
comm_risque_depose = :comm_risque_depose,
comm_complexite_traitement = :comm_complexite_traitement,
comm_complexite_stockage = :comm_complexite_stockage,
comm_qualite = :comm_qualite

  WHERE  id =:id;
*/



// Insertion du post à l'aide d'une requête préparée
  //  $req = $bdd->prepare('INSERT INTO spots (id_folio,coordos, bat_entree_cage_etage_numero, id_materiaux, id_objets,description,quantite,encombrement,qualite,risque_depose,complexite_traitement,complexite_stockage,remarque,comm_risque_depose,   comm_complexite_traitement,comm_complexite_stockage,comm_qualite) VALUES(?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
  //  $req->execute(array($_POST['fid'],$_POST['coordos'], $_POST['bat']."|".$_POST['entree']."|".$_POST['cage']."|".$_POST['etage']."|".$_POST['numero'] , $materiaux,$objet,$_POST['description'],$_POST['quantite'],$_POST['longueur']."|".$_POST['largeur']."|".$_POST['hauteur'],$_POST['qualite'],$_POST['risque'],$_POST['traitement'],$_POST['stockage'],$_POST['remarques'],$_POST['c2'],$_POST['c3'],$_POST['c4'],$_POST['c1']));
   
  //  $req->closeCursor();






// Redirection du visiteur vers la page de saisie
 header( "Location:../ifaces/saisie.php?id=".$_POST['cid']."&fid=".$_POST['fid']);
  

?>
