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
    $req = $bdd->prepare('
UPDATE spots 

SET

id_folio = :fid, 
bat_entree_cage_etage_numero = :becen, 
id_materiaux :id_materiaux, 
id_objets = :id_objets,
description = :description,
quantite = :quantite ,
encombrement = :encombrement,
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
    ');


    $req->execute(array(
      'id' => $_POST['fid'],
      
      'becen' => $_POST['bat']."|".$_POST['entree']."|".$_POST['cage']."|".$_POST['etage']."|".$_POST['numero'] ,
       'id_materiaux' => $materiaux,
       'id_objets' => $objet,
       'description' => $_POST['description'],
       'quantite' => $_POST['quantite'],
       'encombrement' => $_POST['longueur']."|".$_POST['largeur']."|".$_POST['hauteur'],
       'qualite' => $_POST['qualite'],
       'risque_depose' => $_POST['risque'],
       'complexite_traitement' => $_POST['traitement'],
       'complexite_stockage' => $_POST['stockage'],
       'remarque' => $_POST['remarques'],
       'comm_risque_depose' => $_POST['c2'],
       'comm_complexite_traitement' => $_POST['c3'],
       'comm_complexite_stockage' => $_POST['c4'],
       'comm_qualite' => $_POST['c1']));
   
  //  $req->closeCursor();


/*
'visible' => $_POST['visible']
*/

// Redirection du visiteur vers la page de saisie
 header( "Location:../ifaces/saisie.php?id=".$_POST['cid']."&fid=".$_POST['fid']);
  

?>

