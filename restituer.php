<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repVues = './vues/';
  require("./tools/fonction.php");

 



  $etape = 2;
  $prod = listerProdEmpruntes();
  if(count($prod)==0)
  {
    echo '<script type="text/javascript"> alert(" Il n\'y a pas de produits empruntés ")</script>';
    echo '<script type="text/javascript">document.location.href="listerProduits.php"</script>';

  }
  

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."vRestituer.php");
include($repVues."pied.php") ;






  ?>