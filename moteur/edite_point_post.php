
<?php session_start();
//on upload la photo du spot si elle existe
/**********************************************************************************************
Script d'upload
**********************************************************************************************/
/*
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
               _______                   _____                    _____                _____          
              /::\    \                 /\    \                  /\    \              /\    \         
             /::::\    \               /::\    \                /::\    \            /::\    \        
            /::::::\    \             /::::\    \              /::::\    \           \:::\    \       
           /::::::::\    \           /::::::\    \            /::::::\    \           \:::\    \      
          /:::/~~\:::\    \         /:::/\:::\    \          /:::/\:::\    \           \:::\    \     
         /:::/    \:::\    \       /:::/__\:::\    \        /:::/__\:::\    \           \:::\    \    
        /:::/    / \:::\    \     /::::\   \:::\    \      /::::\   \:::\    \          /::::\    \   
       /:::/____/   \:::\____\   /::::::\   \:::\    \    /::::::\   \:::\    \        /::::::\    \  
      |:::|    |     |:::|    | /:::/\:::\   \:::\ ___\  /:::/\:::\   \:::\    \      /:::/\:::\    \ 
      |:::|____|     |:::|    |/:::/__\:::\   \:::|    |/:::/  \:::\   \:::\____\    /:::/  \:::\____\
       \:::\    \   /:::/    / \:::\   \:::\  /:::|____|\::/    \:::\  /:::/    /   /:::/    \::/    /
        \:::\    \ /:::/    /   \:::\   \:::\/:::/    /  \/____/ \:::\/:::/    /   /:::/    / \/____/ 
         \:::\    /:::/    /     \:::\   \::::::/    /            \::::::/    /   /:::/    /          
          \:::\__/:::/    /       \:::\   \::::/    /              \::::/    /   /:::/    /           
           \::::::::/    /         \:::\  /:::/    /               /:::/    /    \::/    /            
            \::::::/    /           \:::\/:::/    /               /:::/    /      \/____/             
             \::::/    /             \::::::/    /               /:::/    /                           
              \::/____/               \::::/    /               /:::/    /                            
               ~~                      \::/____/                \::/    /                             
                                        ~~                       \/____/                              
                                                                                                






     ______  _______          ____        _____   _________________  ____  _____   ______          ____      ____      ______        _____   _________________ 
    |      \/       \    ____|\   \   ___|\    \ /                 \|    ||\    \ |\     \        |    |    |    | ___|\     \   ___|\    \ /                 \
   /          /\     \  /    /\    \ |    |\    \\______     ______/|    | \\    \| \     \       |    |    |    ||     \     \ |    |\    \\______     ______/
  /     /\   / /\     ||    |  |    ||    | |    |  \( /    /  )/   |    |  \|    \  \     |      |    |    |    ||     ,_____/||    | |    |  \( /    /  )/   
 /     /\ \_/ / /    /||    |__|    ||    |/____/    ' |   |   '    |    |   |     \  |    |      |    |    |    ||     \--'\_|/|    |/____/    ' |   |   '    
|     |  \|_|/ /    / ||    .--.    ||    |\    \      |   |        |    |   |      \ |    |      |    |    |    ||     /___/|  |    |\    \      |   |        
|     |       |    |  ||    |  |    ||    | |    |    /   //        |    |   |    |\ \|    |      |\    \  /    /||     \____|\ |    | |    |    /   //        
|\____\       |____|  /|____|  |____||____| |____|   /___//         |____|   |____||\_____/|      | \ ___\/___ / ||____ '     /||____| |____|   /___//         
| |    |      |    | / |    |  |    ||    | |    |  |`   |          |    |   |    |/ \|   ||       \ |   ||   | / |    /_____/ ||    | |    |  |`   |          
 \|____|      |____|/  |____|  |____||____| |____|  |____|          |____|   |____|   |___|/        \|___||___|/  |____|     | /|____| |____|  |____|          
    \(          )/       \(      )/    \(     )/      \(              \(       \(       )/            \(    )/      \( |_____|/   \(     )/      \(            
     '          '         '      '      '     '        '               '        '       '              '    '        '    )/       '     '        '                                                                                                                                   '                                    
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 01001101 01000001 01010010 01010100 01001001 01001110  01010110 01000101 01010010 01010100 
*/

require_once('uploadPhotoConfig.php'); 


$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
              //puisque l'upload est réussi on effectura ici l'insert du point dans la base de données avec un nom de photo
               // Connexion à la base de données
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
// Insertion du post à l'aide d'une requête préparée
    $req = $bdd->prepare('
UPDATE spots 

SET
bat_entree_cage_etage_numero = :becen, 
id_materiaux = :id_materiaux, 
id_objets = :id_objets,
description = :description,
quantite = :quantite,
encombrement = :encombrement,
qualite = :qualite,
risque_depose = :risque_depose,
complexite_traitement = :complexite_traitement,
complexite_stockage = :complexite_stockage,
remarque = :remarque,
comm_risque_depose = :comm_risque_depose,
comm_complexite_traitement = :comm_complexite_traitement,
comm_complexite_stockage = :comm_complexite_stockage,
comm_qualite = :comm_qualite,
remarque = :remarque,
definition = :definition,
reutil = :reutil,
reempl = :reempl,
recy = :recy,
photo = :photo
WHERE  id = :pid ');

$req->execute(array('pid' => $_POST['pid'],'becen' => $_POST['bat']."|".$_POST['entree']."|".$_POST['cage']."|".$_POST['etage']."|".$_POST['numero'] ,'id_materiaux' => $materiaux,'id_objets' => $objet,'description' => $_POST['description'],'quantite' => $_POST['quantite'],'encombrement' => $_POST['longueur']."|".$_POST['largeur']."|".$_POST['hauteur'],'qualite' => $_POST['qualite'],'risque_depose' => $_POST['risque'],'complexite_traitement' => $_POST['traitement'],'complexite_stockage' => $_POST['stockage'],'remarque' => $_POST['remarques'],'comm_risque_depose' => $_POST['c2'],'comm_complexite_traitement' => $_POST['c3'],'comm_complexite_stockage' => $_POST['c4'],'comm_qualite' => $_POST['c1'],'remarque' => $_POST['remarques'],'definition' => $_POST['definition'],'photo' => $nomImage,'reutil' => $_POST['destination2'],'reempl' => $_POST['destination1'],'recy' => $_POST['destination3'] ));

    
    
   $req->closeCursor();
   $message = 'update avec image !';

            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on inserre le point sans image..
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
// Insertion du post à l'aide d'une requête préparée
    $req = $bdd->prepare('
UPDATE spots 

SET
bat_entree_cage_etage_numero = :becen, 
id_materiaux = :id_materiaux, 
id_objets = :id_objets,
description = :description,
quantite = :quantite,
encombrement = :encombrement,
qualite = :qualite,
risque_depose = :risque_depose,
complexite_traitement = :complexite_traitement,
complexite_stockage = :complexite_stockage,
remarque = :remarque,
comm_risque_depose = :comm_risque_depose,
comm_complexite_traitement = :comm_complexite_traitement,
comm_complexite_stockage = :comm_complexite_stockage,
comm_qualite = :comm_qualite,
definition = :definition,
reutil = :reutil,
reempl = :reempl,
recy = :recy,
remarque = :remarque
WHERE  id = :pid ');

$req->execute(array('pid' => $_POST['pid'],'becen' => $_POST['bat']."|".$_POST['entree']."|".$_POST['cage']."|".$_POST['etage']."|".$_POST['numero'] ,'id_materiaux' => $materiaux,'id_objets' => $objet,'description' => $_POST['description'],'quantite' => $_POST['quantite'],'encombrement' => $_POST['longueur']."|".$_POST['largeur']."|".$_POST['hauteur'],'qualite' => $_POST['qualite'],'risque_depose' => $_POST['risque'],'complexite_traitement' => $_POST['traitement'],'complexite_stockage' => $_POST['stockage'],'remarque' => $_POST['remarques'],'comm_risque_depose' => $_POST['c2'],'comm_complexite_traitement' => $_POST['c3'],'comm_complexite_stockage' => $_POST['c4'],'comm_qualite' => $_POST['c1'],'definition' => $_POST['definition'],'remarque' => $_POST['remarques'],'reutil' => $_POST['destination2'],'reempl' => $_POST['destination1'],'recy' => $_POST['destination3']));

    
    
   $req->closeCursor();
    $message = 'update sans image !';
  }
}


// Redirection du visiteur vers la page de saisie
 header( "Location:../ifaces/saisie.php?id=".$_POST['cid']."&fid=".$_POST['fid']."&uploadDebug=".$message);


          


































/*



















          
         
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
// Insertion du post à l'aide d'une requête préparée
    $req = $bdd->prepare('
UPDATE spots 

SET
bat_entree_cage_etage_numero = :becen, 
id_materiaux = :id_materiaux, 
id_objets = :id_objets,
description = :description,
quantite = :quantite,
encombrement = :encombrement,
qualite = :qualite,
risque_depose = :risque_depose,
complexite_traitement = :complexite_traitement,
complexite_stockage = :complexite_stockage,
remarque = :remarque,
comm_risque_depose = :comm_risque_depose,
comm_complexite_traitement = :comm_complexite_traitement,
comm_complexite_stockage = :comm_complexite_stockage,
comm_qualite = :comm_qualite,
remarque = :remarque
WHERE  id = :pid ');

$req->execute(array('pid' => $_POST['pid'],'becen' => $_POST['bat']."|".$_POST['entree']."|".$_POST['cage']."|".$_POST['etage']."|".$_POST['numero'] ,'id_materiaux' => $materiaux,'id_objets' => $objet,'description' => $_POST['description'],'quantite' => $_POST['quantite'],'encombrement' => $_POST['longueur']."|".$_POST['largeur']."|".$_POST['hauteur'],'qualite' => $_POST['qualite'],'risque_depose' => $_POST['risque'],'complexite_traitement' => $_POST['traitement'],'complexite_stockage' => $_POST['stockage'],'remarque' => $_POST['remarques'],'comm_risque_depose' => $_POST['c2'],'comm_complexite_traitement' => $_POST['c3'],'comm_complexite_stockage' => $_POST['c4'],'comm_qualite' => $_POST['c1'],'remarque' => $_POST['remarques']));

    
    
   $req->closeCursor();

/*
'visible' => $_POST['visible']
*/

//// Redirection du visiteur vers la page de saisie
 //header( "Location:../ifaces/saisie.php?id=".$_POST['cid']."&fid=".$_POST['fid']);
  
?>

