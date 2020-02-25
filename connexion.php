<?php


try {
$BD=new PDO('mysql:host=localhost;dbname=stockproduit','root','');

}
catch (Exeception $e)
{
die ("Erreur:".$e->getMessage());}


?>