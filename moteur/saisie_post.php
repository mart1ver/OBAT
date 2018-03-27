<?php

session_start();



//on upload la photo du spot si elle existe

/* * ********************************************************************************************
  Script d'upload
 * ******************************************************************************************** */
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

//on prépare les trois varables de destination
if (intval($_POST['destination1']) === 1) {
    $reempl = "1";
} else {
    $reempl = "0";
};
if (intval($_POST['destination2']) === 1) {
    $reutil = "1";
} else {
    $reutil = "0";
};
if (intval($_POST['destination3']) === 1) {
    $recy = "1";
} else {
    $recy = "0";
};



$cid = 0;
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];
}


$coordos = "1.0000,1.0000";
if (!empty($_POST['coordos'])) {
    $coordos = $_POST['coordos'];
}

$fid = 0;
if (isset($_POST['fid'])) {
    $fid = $_POST['fid'];
}

$bat = "";
if (isset($_POST['bat'])) {
    $bat = $_POST['bat'];
}

$entree = "";
if (isset($_POST['entree'])) {
    $entree = $_POST['entree'];
}

$cage = "";
if (isset($_POST['cage'])) {
    $cage = $_POST['cage'];
}

$etage = "";
if (isset($_POST['etage'])) {
    $etage = $_POST['etage'];
}

$numero = "";
if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
}

$description = "";
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

$quantite = 0;
if (isset($_POST['quantite'])) {
    $quantite = $_POST['quantite'];
}

$longueur = "";
if (isset($_POST['longueur'])) {
    $longueur = $_POST['longueur'];
}

$largeur = "";
if (isset($_POST['largeur'])) {
    $largeur = $_POST['largeur'];
}

$hauteur = "";
if (isset($_POST['hauteur'])) {
    $hauteur = $_POST['hauteur'];
}

$qualite = 0;
if (isset($_POST['qualite'])) {
    $qualite = $_POST['qualite'];
}

$stockage = 0;
if (isset($_POST['stockage'])) {
    $stockage = $_POST['stockage'];
}

$traitement = 0;
if (isset($_POST['traitement'])) {
    $traitement = $_POST['traitement'];
}

$risque = 0;
if (isset($_POST['risque'])) {
    $risque = $_POST['risque'];
}

$c2 = "";
if (isset($_POST['c2'])) {
    $c2 = $_POST['c2'];
}

$c3 = "";
if (isset($_POST['c3'])) {
    $c3 = $_POST['c3'];
}

$c4 = "";
if (isset($_POST['c4'])) {
    $c4 = $_POST['c4'];
}

$c1 = "";
if (isset($_POST['c1'])) {
    $c1 = $_POST['c1'];
}

$stockage = "";
if (isset($_POST['stockage'])) {
    $stockage = $_POST['stockage'];
}

$remarques = "";
if (isset($_POST['remarques'])) {
    $remarques = $_POST['remarques'];
}

$definition = 0;
if (isset($_POST['definition'])) {
    $definition = $_POST['definition'];
}

/* * **********************************************************
 * Creation du repertoire cible si inexistant
 * *********************************************************** */
if (!is_dir(TARGET)) {
    if (!mkdir(TARGET, 0755)) {
        exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
    }
}

/* * **********************************************************
 * Script d'upload
 * *********************************************************** */
if (!empty($_POST)) {
    // On verifie si le champ est rempli
    if (!empty($_FILES['fichier']['name'])) {
        // Recuperation de l'extension du fichier
        $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

        // On verifie l'extension du fichier
        if (in_array(strtolower($extension), $tabExt)) {
            // On recupere les dimensions du fichier
            $infosImg = getimagesize($_FILES['fichier']['tmp_name']);

            // On verifie le type de l'image
            if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                // On verifie les dimensions et taille de l'image
                if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {
                    // Parcours du tableau d'erreurs
                    if (isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error']) {
                        // On renomme le fichier
                        $nomImage = md5(uniqid()) . '.' . $extension;

                        // Si c'est OK, on teste l'upload
                        if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {
                            $message = 'Upload réussi !';
                            //puisque l'upload est réussi on effectura ici l'insert du point dans la base de données avec un nom de photo
                            // Connexion à la base de données
                            // Connexion à la base de données




                            try {
                                include('dbconfig.php');
                            } catch (Exception $e) {
                                die('Erreur : ' . $e->getMessage());
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
                            $req = $bdd->prepare('INSERT INTO spots (
       id_folio,
       coordos, 
       bat_entree_cage_etage_numero, 
       id_materiaux,
       id_objets,
       description,
       quantite,
       encombrement,
       qualite,
       risque_depose,
       complexite_traitement,
       complexite_stockage,
       remarque,
       comm_risque_depose,   
       comm_complexite_traitement,
       comm_complexite_stockage,
       comm_qualite,
       photo,
       definition,
       reempl,
       reutil,
       recy) VALUES(?,?, ?, ?,?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)');
                            $req->execute(array($fid, $coordos, $bat . "|" . $entree . "|" . $cage . "|" . $etage . "|" . $numero, $materiaux, $objet, $description, $quantite, $longueur . "|" . $largeur . "|" . $hauteur, $qualite, $risque, $traitement, $stockage, $remarques, $c2, $c3, $c4, $c1, $nomImage, $definition, $reempl, $reutil, $recy));

                            $req->closeCursor();
                        } else {
                            // Sinon on affiche une erreur systeme
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    // Sinon erreur sur les dimensions et taille de l'image
                    $message = 'Erreur dans les dimensions de l\'image !';
                }
            } else {
                // Sinon erreur sur le type de l'image
                $message = 'Le fichier à uploader n\'est pas une image !';
            }
        } else {
            // Sinon on affiche une erreur pour l'extension
            $message = 'L\'extension du fichier est incorrecte !';
        }
    } else {
        // Sinon pas de fichier joint inserre le point sans image..
        // Connexion à la base de données
        try {
            include('dbconfig.php');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
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
        $req = $bdd->prepare('INSERT INTO spots (
      id_folio,coordos, 
      bat_entree_cage_etage_numero, 
      id_materiaux, 
      id_objets,
      description,
      quantite,
      encombrement,
      qualite,
      risque_depose,
      complexite_traitement,
      complexite_stockage,
      remarque,
      comm_risque_depose,   
      comm_complexite_traitement, 
      comm_complexite_stockage,
      comm_qualite,definition,
      reempl,
      reutil,
      recy) VALUES(?,?,?,?,?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
        $req->execute(array($fid, $coordos, $bat . "|" . $entree . "|" . $cage . "|" . $etage . "|" . $numero, $materiaux, $objet, $description, $quantite, $longueur . "|" . $largeur . "|" . $hauteur, $qualite, $risque, $traitement, $stockage, $remarques, $c2, $c3, $c4, $c1, $definition, $reempl, $reutil, $recy));

        $req->closeCursor();
        $message = 'ajout de spot sans image !';
    }
}


// Redirection du visiteur vers la page de saisie
header("Location:../ifaces/saisie.php?id=" . $cid . "&fid=" . $fid . "&uploadDebug=" . $message);
?>

