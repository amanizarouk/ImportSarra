<?php

 include("connexion.php");



$id=$_GET['var'];
echo $id;
$req="DELETE FROM credit WHERE idCredit='$id' ";
$BD->exec($req);

header("Location:credit.php");

?>