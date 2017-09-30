<?php
session_start();

require_once('../moteur/dbconfig.php');
include "tete.php"
//Oressource 2014, formulaire de référencement des conventions avec les partenaires de la structure
//Simple formulaire de saisie , liste des conventions déjà référencées et possibilité de les cacher à l'utilisateur ou de modifier les données
//
?>

<div class="container">
    <h1>Gestion de la liste des typologies</h1> 
    <div class="panel-heading">Gérez ici votre liste des typologies.</div>
    <p>Permet de différencier les materiaux et materiels au moment des recherches </p>
    <div class="panel-body">
        <div class="row">
            <form action="../moteur/modification_typologie_post.php" method="post">
                <input type="hidden" name ="id" id="id" value="<?php echo $_POST['id'] ?>">
                <div class="col-md-3"><label for="nom">Nom:</label> <input type="text"                 value ="<?php echo $_POST['nom'] ?>" name="nom" id="nom" class="form-control " required autofocus></div>
                <div class="col-md-2"><label for="description">Description:</label> <input type="text" value ="<?php echo $_POST['description'] ?>" name="description" id="description" class="form-control " required ></div>

                <div class="col-md-1"><label for="couleur">Couleur:</label> <input type="color"        value ="<?php echo "#" . $_POST['couleur'] ?>" name="couleur" id="couleur" class="form-control " required ></div>

                <br>
                </div>
                <br>


                <div class="col-md-1"><br>





                    <button name="creer" class="btn btn-default">Modifier!</button></div>
            </form>

        </div>
        <!-- Table -->

        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><br> </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
</div><!-- /.container -->

<?php include "pied.php";
?>
