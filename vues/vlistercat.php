

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
         
<?php
}
else
{
 echo "<h1>Aucune fleur ne correspond � votre recherche</h1>";
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
            <td><?php echo $visiteur[$i]["cat_code"] ?></td>
            <td><?php echo $visiteur[$i]["cat_nom"]?></td>
            
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
