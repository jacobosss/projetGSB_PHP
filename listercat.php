<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  include('./tools/fonction.php');
  
 
  $cat="";
  if (isset($_GET['categ']))
  {
  $cat = $_GET['categ'];
  }  
  $visiteur = listercat($cat);
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vlistercat.php");
  include($repVues."pied.php") ;
  ?>
    
