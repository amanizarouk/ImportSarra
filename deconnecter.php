<?php
   session_start();
?>
<!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
      <?php
        unset($_SESSION["user"]);

        echo "<script>alert('Déconnexion réussit');</script>";

        header('location:login.php');


       ?>
       
   </body>
 </html>
