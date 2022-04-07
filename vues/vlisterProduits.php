

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($type))
    {
?>
        <h3><?php echo $type;?></h3>
<?php   
    }
 
?>
      </caption>
      <thead>
<?php
if (count($produit) > 0)
{
    echo "<h3>Liste de Produits :</h3>";  
    echo "<p>Pour modifier un produit, cliquez sur son ID.</p>"; 
?>

        <tr>
          <th>ID</th>
          <th>catégorie</th>
          <th>Nom</th>
          <th>Prix</th>
          <!-- <th>Image</th> -->
          <th>Statut</th>
          <!-- <th>Reserver</th> -->
         
         </tr>
<?php
}
else
{
 echo "<h1>Aucun produit ne correspond a votre recherche</h1>";
}
?>

      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($produit))
    { 
 ?>     
        <tr>
            <td><a href="./modifierProduit.php?ID=<?php echo $produit[$i]['prod_code']?>"><?php echo $produit[$i]['prod_code']?></a></td>
            <td><?php echo $produit[$i]['cat_nom']?></td>
            <td><?php echo $produit[$i]['prod_libelle']?></td>
            <td ><?php echo $produit[$i]['prod_prix']?></td>
            <!-- <td ><img src="<?php echo $produit[$i]['image']?>" alt=""></td> -->
            <td ><?php echo $produit[$i]['statut']?></td>
            <!-- <td><a href="./reserver.php?ID=<?php echo $produit[$i]['prod_code']?>">Reserver</a></td> -->

           
         </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
