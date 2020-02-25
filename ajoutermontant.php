<?php
include ("connexion.php");

session_start();
$admin=$_SESSION['nom'];

  $type=$_POST['CE'];
$montant=$_POST['montant'];
 $date=date('y-m-d');
 $idOrganisme=$_POST['idOrganisme'];



 $sql = 'INSERT into credit (type,montant,date,idOrganisme)  VALUES ("' . $type . '","' . $montant . '","'. $date . '","' . $idOrganisme . '")';
 $BD->query($sql);
echo $id = $BD->lastInsertId();
$typeOp="Ajouter";

$dt=date('Y-m-d H:i:s');
$sq = "INSERT into historique (type,montant,date,idCredit,admin,typeOp) VALUES ('" .$type . "','" .$montant . "','" .$dt. "','" . $id. "','".$admin."','".$typeOp."')";

$BD->query($sq) ;
header("Location:credit.php");
 
?>