<?php
 include("connexion.php");
 $nom=$_POST['nom'];


    $sql = "INSERT into marque (nom) VALUES ('" . $nom . "')";
    $BD->query($sql);
 

header("Location:marque.php");

 
?>