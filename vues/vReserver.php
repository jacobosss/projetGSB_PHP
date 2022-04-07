<script type="text/javascript">

</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjouterVisiteur" action="" method="post">
<fieldset>
    <legend>Entrez les coordonnées d'un produit pour l'ajouter </legend>
    <input type="hidden" name="matricule" size="20" value="<?php echo $_GET['ID']?>"/><br />
    
    <label>Produit :</label> 
    <select name="prod" id="">
       
    <?php
                       $i = 0;
                       while($i<count($lacateg))
                       { 
                         echo '<option value="'.$lacateg[$i]['prod_code'].'">'.$lacateg[$i]['prod_libelle'].'</option>';
                         $i=$i+1;
                        }
    ?>
    </select>
    <label>Date Emprunt :</label> <input type="date" name="DE" size="10" value=""/><br /> 
   
   
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>



