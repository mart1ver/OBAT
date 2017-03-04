<?php
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

require_once('uploadFolioConfig.php'); 


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
              //puisque l'upload est réussi on effectura ici l'insert dans la base de données
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
    $req = $bdd->prepare('INSERT INTO folios (nom, id_chantier, commentaire, nom_fichier) VALUES(?, ?, ?, ?)');
    $req->execute(array($_POST['nom'], $_POST['id'] , $_POST['commentaire'], TARGET.$nomImage));
    $req->closeCursor();

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
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
}

header('Location:../ifaces/edition_chantiers.php?msg='.$message);






/*
$target_dir = "../images/folios/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Ce fichier ne peut etre considéré comme une image";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé, un fichier porte deja le meme nom.";
    $uploadOk = 0;
}
// Check file size 2Mb max
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Seulement les extentions JPG, JPEG, PNG & GIF sonts autorisées.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Fichier non uploadé.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
// puisque le fichier à bien été enregistré, on le référence en base


              
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
    $req = $bdd->prepare('INSERT INTO folios (nom, id_chantier, commentaire, nom_fichier) VALUES(?, ?, ?, ?)');
    $req->execute(array($_POST['nom'], $_POST['id'] , $_POST['commentaire'], $_FILES["fileToUpload"]["name"]));
    $req->closeCursor();

// Redirection du visiteur vers la page de gestion des affectation
    header('Location:../ifaces/chantiers.php?msg=Folio ajouté avec succes!' );



    } else {
        echo ("Erreur d'ulpoad, désolé .".$_FILES["fileToUpload"]["tmp_name"]." et ".$target_file);
    }
}
*/
?>