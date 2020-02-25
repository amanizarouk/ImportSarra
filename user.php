<?php
//session_start();


function verifier($identifiant, $mot_de_passe)
{include"connexion.php";
  // se connecter à la base
  

  // préparation et exécution de la requête
  $requette = "SELECT * FROM utilisateur"
  . " WHERE mail = '" . $identifiant . "'"
  . " AND motDePasse = '" . $mot_de_passe . "'";
  
  //die($requette);

  $resultat = $BD->query($requette);

  $ligne = $resultat->fetch();

   if ($ligne){
	   $_SESSION['id']=$ligne->idUtilisateur;
   $_SESSION['nom']= $ligne->nom ;   
   $_SESSION['type']=$ligne->type ;
   $_SESSION['prenom']=$ligne->prenom ;
   return true;}

   return false;
}

?>
