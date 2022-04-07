

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php   
echo "<h3>Liste de visiteurs :</h3>"; 
    }
?>
      </caption>
      <thead>
<?php
if (count($visiteur) > 0)
{
?>
        <tr>
          <!-- <th>Image</th> -->
          
         <th>Nom</th>
         <th>Prénom</th>
         <th>Adresse</th>
         <th>Ville</th>
         <th>Code Postal</th>
         <th>Date d'embauche</th>
         <th>Réserver un produit</th>
         <th>Modifier</th>
         </tr>
<?php
}
else
{
 echo "<h1>Aucun visiteur ne correspond a votre recherche</h1>";
}
?>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($visiteur))
    { 
 ?>     
        <tr>
            <!-- <td align="center"><img class="img-polaroid" src="../images/.jpg" /></td> -->
            <td><?php echo $visiteur[$i]["nom"] ?></td>
            <td><?php echo $visiteur[$i]["prenom"]?></td>
            <td><?php echo $visiteur[$i]["adresse"]?></td>
            <td><?php echo $visiteur[$i]["ville"]?></td>
           <td><?php echo $visiteur[$i]["cp"]?></td>
           <td><?php echo $visiteur[$i]["date"]?></td>
           <td><a href='./Reserver.php?ID=<?php echo $visiteur[$i]["VIS_MATRICULE"]?>'>Reserver</a></td>
           <td><a href='./modifierVisiteur.php?ID=<?php echo $visiteur[$i]["VIS_MATRICULE"]?>'>Modifier</a></td>
         </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
