<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repVues = './vues/';
  require("./tools/fonction.php");

 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{ 
  $etape = 2;
   $unMatricule=$_POST["matricule"];
   $prod=$_POST["prod"];
   $dateE=$_POST["DE"];
   
   
   
   Emprunter($dateE,$prod,$unMatricule);
   statut($prod);
   header('location:restituer.php');
   
  }
  $type="";
   if (isset($_GET['type_uti']))
   {
     $type =$_GET['type_uti'];
   }  
   $lacateg = listerProduitDispo($type);

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
// include($repVues ."erreur.php");
include($repVues."vReserver.php") ;
include($repVues."pied.php") ;
?>
  
