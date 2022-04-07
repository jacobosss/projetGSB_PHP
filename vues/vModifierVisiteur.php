<script type="text/javascript">

</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjouterVisiteur" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les coordonnées d'un visiteur pour le modifier </le gend>
    <label>Matricule :</label> <label for=""><?php echo $visit[0]['VIS_MATRICULE']?></label><br />
    <label>Nom :</label> <input type="text" name="nom" size="20" value="<?php echo $visit[0]['nom']?>"/><br />
    <label>Prenom :</label> <input type="text" name="prenom" size="10"  value="<?php echo $visit[0]['prenom']?>" /><br /> 
    <label>Adresse :</label> <input type="text" name="adresse" size="10"  value="<?php echo $visit[0]['adresse']?>" /><br /> 
    <label>Date d'embauche:</label> <input type="text" name="date" size="10"  value="<?php echo $visit[0]['date']?>" /><br />
    <label>Ville : </label> <input type ="text" name="cp" size="20" value="<?php echo $visit[0]['cp']?>" />
    <label>Code postal : </label> <input type="text" name="ville" size="10" value="<?php echo $visit[0]['ville']?>" /><br>
   
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>

