
		 <?php
   session_start();
include("connexion.php");

 ?>
 <?php
require_once "user.php";

  
   

   if (isset($_GET["Connecter"]))
  
 {
      $identifiant = $_GET["mail"];
    
  $mot_de_passe = $_GET["pw"];

      // vérifier dans la base si l'utilisateur existe
    
  if (verifier($identifiant, $mot_de_passe))
    
  {     
         
	
		 header("location:home.php") ;}
       
  
 
     else {
         
         
   		 echo '<script language="JavaScript">
		 alert("Login ou mot de passe incorrect. Merci de recommencer");        
            window.location.replace("login.php");
                
            </script>';   
     
   

      }

   }
   // si on fait appel à la page pour se déconnecter
   else if (isset($_GET["deconnecter"]) && $_GET["deconnecter"] == "oui")
   {
      unset($_SESSION["user"]);
      echo "Déconnexion réussit";
      echo "<br/>";
      echo "<a href='se connecter.php'>se connecter de nouveau</a>";
   }

   else if (!isset($_GET["log"]))
   {
	   
   ?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<style>
  

   .navcolor{  background-image: linear-gradient( 90deg, #f3a0a8 0%, #dc3545 100% ); }
</style>
  </head>

  <body class="bg-dark navcolor">


    <div class="container ">
      <div class="card card-login mx-auto mt-5">
	  
        <div class="card-header ">Authentification</div>
        <div class="card-body">
          <form method="get" action="login.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="mail">
                <label for="inputEmail">Adresse Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="pw">
                <label for="inputPassword">Mot De Passe</label>
              </div>
            </div>
           
            <button type="submit" class="btn btn-primary btn-block navcolor" name="Connecter">Connecter</button>
          </form>
         
        </div>

      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>
</html>

   <?php
   }
   ?>