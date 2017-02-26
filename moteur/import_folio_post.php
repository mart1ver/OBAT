<?php
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
        echo ("Erreur d'ulpoad, désolé .".$_FILES["fileToUpload"]["name"]);
    }
}

?>