<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
include('./tools/fonction.php');
  $repInclude = './include/';
  $repVues = './vues/';
  
//   require($repInclude . "_init.inc.php");
 
 
  $produit = listerProduit();
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vlisterProduits.php");
  include($repVues."pied.php") ;
  ?>
    
