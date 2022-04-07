<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
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
  $id = GETIDProduit($ref);
  //echo $id;
  $supp= supprimerProduit($ref);
  if($supp==0)
  {
    echo '<script type="text/javascript"> alert(" Le produit '.$ref.' n\'existe pas ")</script>';
    echo '<script type="text/javascript">document.location.href="listerProduits.php"</script>';
  }
  else
  {
    ?>
    <div class="alert alert-success" role="alert">
        Le produit <?php echo $ref ?> a correctement été supprimé !
</div>
<?php

  }

  // var_dump($supp);
}

$info=array();
if (isset($_GET['info']))
{
$info = $_GET['info'];
}  
$produit = listerProduit($info);



// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;

if ($etape ==1)
{
 include($repVues."vSupprimerProduit.php") ; 
}
else
{
  echo"<br><br>";
 include($repVues."vListerProduits.php") ; 
}
include($repVues."pied.php") ;
?>
  
