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
if (count($prod) > 0)
{
?>
        <tr>
           <th>ID PROD</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Produit</th>
          <th>Date Emprunt</th>
          <th>Date Retour</th>
          
         
         </tr>
<?php
}

?>
      </thead>
      <tbody>  
<?php  
    $i = 0;
    ?>

    <h2>Restituer un produit :</h2>
    <p>Pour rendre un produit appuyer sur son id</p>
    <br><br>
    <?php
    echo date('y-m-d'); //date du jours
    while($i < count($prod))
    { 
 ?>     
        <tr>
           <td><a href="rendre.php?ID=<?php echo $prod[$i]['prod_code']?>"><?php echo $prod[$i]['prod_code']?></a></td>
            <td><?php echo $prod[$i]['VIS_NOM']?></td>
            <td><?php echo $prod[$i]['VIS_PRENOM']?></td>
            <td><?php echo $prod[$i]['prod_libelle']?></td>
            <td ><?php echo $prod[$i]['emp_date']?></td>
            <td ><?php echo $prod[$i]['emp_dateRetour']?></td>
           
           
           
         </tr>
        
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>