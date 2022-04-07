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
$cat="";
if(isset($_GET['categ']))
{
    $cat = $_GET['categ'];
}  
$lacateg = listercat($cat);
if (count($_POST)==0)
{
  $etape = 1;
}
else
{

    $etape = 2;
 
   $uneDes=$_POST["des"];
   $unPrix=$_POST["prix"];
   $uneImage=$_POST["image"];
   $uneCat=$_POST["cat"]; 

  $ap = ajouterProduit($uneDes, $unPrix, $uneImage, $uneCat);
  
  if($ap==1)
  {
     
     echo '<script type="text/javascript"> alert(" Erreur: le produit existe déjà ! ")</script>';
     echo '<script type="text/javascript">document.location.href="listerProduits.php"</script>';

  }
  else
  {
    ?>
    <div class="alert alert-success" role="alert">
        Le produit <?php echo $uneDes ?> a correctement été ajouté !
</div>
<?php

  }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;

include($repVues."vAjouterProduit.php") ;
include($repVues."pied.php") ;
?>
  
