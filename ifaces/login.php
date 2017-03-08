<?php session_start(); 

require_once('../moteur/dbconfig.php');
 include "tete.php" 

?>

    <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Bienvenue.</h4>
            <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="Identifiant" />
            </br>
            <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="Mot de pasee" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
            </span>
            </div>
            </div>
        
        </div>
    </div>
    </div><!-- /.container -->
  
<?php include "pied.php"; 

?>
