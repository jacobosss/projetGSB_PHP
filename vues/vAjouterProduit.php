<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les donn�es sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le prix doit etre positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Ajouter Produit</legend>
    <!-- <label>Code du Produit : </label> <input type="text" placeholder="Entrer la r�f�rence �"name="ref" size="10" /><br /> -->
    <label>Nom :</label> <input type="text" name="des" size="20" /><br />
    <label>Prix :</label> <input type="text" name="prix" size="10" /><br />
    <label>Image :</label> <input type="text" name="image" size="20"/><br />    
    <label>Categories :</label>
    <select name="cat">
    <?php
                       $i = 0;
                       while($i<count($lacateg))
                       { 
                         echo '<option value="'.$lacateg[$i]['cat_code'].'">'.$lacateg[$i]['cat_nom'].'</option>';
                         $i=$i+1;
                        }
    ?>
      
    </select>  
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


