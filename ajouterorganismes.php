<?php
 include("connexion.php");
 $nom=$_POST['nom'];


    $sql = "INSERT into organisme (nom) VALUES ('" . $nom . "')";
    $BD->query($sql);
 

header("Location:organismes.php");

 
?>