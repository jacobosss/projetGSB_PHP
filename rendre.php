<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repVues = './vues/';
  require("./tools/fonction.php");

 

$id=$_GET['ID'];


  $etape = 2;
  $prod = rendre($id);
  header('Location:restituer.php');

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."vRestituer.php");
include($repVues."pied.php") ;






  ?>