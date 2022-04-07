<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require('./tools/fonction.php');
  
// $uneRef=lireDonneePost("ref", "");
//$uneDes=lireDonneePost("des", "");
//$unPrix=lireDonneePost("prix", "");
//$uneImage=lireDonneePost("image", "");
//$uneCat=lireDonneePost("cat", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
   $etape = 2;
   $uneDes=$_POST["nom"];
   echo"<br><br>";
   $produit=rechercherProduit($uneDes);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;

if ($etape ==1)
{
 include($repVues."vRechercherProduit.php") ; 
}
else
{
 include("./vues/vlisterProduits.php") ; 
}
include($repVues."pied.php") ;
?>
  
