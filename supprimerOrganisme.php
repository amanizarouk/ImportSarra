<?php

 include("connexion.php");



$id=$_GET['var'];
echo $id;
$req="DELETE FROM organisme WHERE idOrganisme='$id' ";
$BD->exec($req);

header("Location:organismes.php");

?>