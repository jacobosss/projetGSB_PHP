<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "supprimer"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require('./tools/fonction.php');

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  
  $ref=$_POST["ref"];
  $id = GETID($ref);
  //echo $id;
  $supp= supprimer($ref);
  // var_dump($supp);

}

$info=array();
if (isset($_GET['info']))
{
$info = $_GET['info'];
}  
$visiteur = listerVisiteur($info);


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;

if ($etape ==1)
{
 include($repVues."vSupprimer.php") ; 
}
else
{
  echo"<br><br>";
 include($repVues."vListerVisiteur.php") ; 
}
include($repVues."pied.php") ;
?>
  
