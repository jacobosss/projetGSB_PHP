<?php
include('ConnexionBdd.php');
function listerVisiteur()
{
  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select vis_nom, VIS_MATRICULE, vis_prenom, vis_adresse, vis_ville, vis_cp, 	vis_dateembauche from visiteur";
  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $visiteur[$i]['nom']=$ligne->vis_nom;
          $visiteur[$i]['prenom']=$ligne->vis_prenom;
          $visiteur[$i]['adresse']=$ligne->vis_adresse;
          $visiteur[$i]['ville']=$ligne->vis_ville;
          $visiteur[$i]['cp']=$ligne->vis_cp;
          $visiteur[$i]['VIS_MATRICULE']=$ligne->VIS_MATRICULE;
          $visiteur[$i]['date']=$ligne->vis_dateembauche;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de resultat
 
  return $visiteur;
}
function listerVisiteurID($ID)
{
  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select vis_nom,VIS_MATRICULE,vis_dateembauche, vis_prenom, vis_adresse, vis_ville, vis_cp from visiteur where VIS_MATRICULE = '".$ID."';";
  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
      

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $visiteur[$i]['nom']=$ligne->vis_nom;
          $visiteur[$i]['date']=$ligne->vis_dateembauche;
          $visiteur[$i]['prenom']=$ligne->vis_prenom;
          $visiteur[$i]['adresse']=$ligne->vis_adresse;
          $visiteur[$i]['ville']=$ligne->vis_ville;
          $visiteur[$i]['cp']=$ligne->vis_cp;
          $visiteur[$i]['VIS_MATRICULE']=$ligne->VIS_MATRICULE;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de resultat
 
  return $visiteur;
}












function listerProdEmpruntes()
{

  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="SELECT p.prod_code, p.prod_libelle,v.VIS_NOM, v.VIS_PRENOM,e.emp_dateRetour, e.emp_date FROM produit p 
      INNER JOIN emprunt e on e.emp_produit=p.prod_code
      INNER JOIN  visiteur v on v.VIS_MATRICULE=e.VIS_MATRICULE
      WHERE e.statut='a rendre'
      ";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       $prod= array();
      //  echo $requete;
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
        $prod[$i]['VIS_NOM']=$ligne->VIS_NOM;
        $prod[$i]['prod_libelle']=$ligne->prod_libelle;
        $prod[$i]['prod_code']=$ligne->prod_code;
        $prod[$i]['emp_dateRetour']=$ligne->emp_dateRetour;
        $prod[$i]['emp_date']=$ligne->emp_date;
        $prod[$i]['VIS_PRENOM']=$ligne->VIS_PRENOM;
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
}
$jeuResultat->closeCursor();   // fermer le jeu de resultat
// echo $requete;
return $prod;
  }


function statut($prodcode)
{
  
  $connexion = connexionBdd();
    if (TRUE) 
    {
        
             
        $requete="update produit set prod_statut = 'Indisponible' where prod_code = '".$prodcode."';";
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        // echo $requete;
        
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "l'invite a bien ete ajoute";
        //   ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "L'invite n'a pas ete ajoute !!!";
        //   ajouterErreur($tabErr, $message);
        } 
      }


}
function Emprunter($dateE,$prod,$unMatricule)
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      
        $requete=" SET FOREIGN_KEY_CHECKS = 0; insert into emprunt (`emp_date`,`emp_dateRetour`, `emp_produit`, `VIS_MATRICULE`, `statut`) values (
         '".$dateE."',
         '0000-00-00',
         ".$prod.",
         '".$unMatricule."',
         'a rendre');"; 
         $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          // echo $requete;
        
         // Si la requ�te a r�ussi
         if ($ok)
         {
           $message = "l'emprunt a bien ete ajoute";
         //   ajouterErreur($tabErr, $message);
         }
         else
         {
           $message = "L'emprunt n'a pas ete ajoute !!!";
         //   ajouterErreur($tabErr, $message);
         } 
        
      }


}
function listerProduit()
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * ,c.cat_nom from produit p inner join categorie c on c.cat_code=p.prod_categorie;";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $produit[$i]['prod_code']=$ligne->prod_code;
          $produit[$i]['prod_libelle']=$ligne->prod_libelle;
          $produit[$i]['prod_prix']=$ligne->prod_prix;
          $produit[$i]['prod_categorie']=$ligne->prod_categorie;
          $produit[$i]['prod_image']=$ligne->prod_image;
          $produit[$i]['statut']=$ligne->prod_statut;
          $produit[$i]['cat_nom']=$ligne->cat_nom;
         
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

  return $produit;
}

function listerProduitID($ID)
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * from produit where prod_code = '".$ID."';";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $produit[$i]['prod_code']=$ligne->prod_code;
          $produit[$i]['prod_libelle']=$ligne->prod_libelle;
          $produit[$i]['prod_prix']=$ligne->prod_prix;
          $produit[$i]['prod_categorie']=$ligne->prod_categorie;
          $produit[$i]['prod_image']=$ligne->prod_image;
          $produit[$i]['statut']=$ligne->prod_statut;
         
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

  return $produit;
}
function rendre($ID)
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
      $a= date('y-m-d');
      $requete=" SET FOREIGN_KEY_CHECKS = 0; update emprunt set statut ='rendu',emp_dateRetour='$a' where emp_produit=$ID; update produit set prod_statut = 'Disponible' where prod_code = $ID ;";
      // echo $requete;
      $jeuResultat=$connexion->query($requete);
      

  }





}    
function listerProduitDispo()
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * from produit p inner join categorie c on c.cat_code=p.prod_categorie where prod_statut = 'Disponible' ;";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $utilisateur[$i]['prod_code']=$ligne->prod_code;
          $utilisateur[$i]['prod_libelle']=$ligne->prod_libelle;
          $utilisateur[$i]['prod_prix']=$ligne->prod_prix;
          $utilisateur[$i]['prod_categorie']=$ligne->prod_categorie;
          $utilisateur[$i]['statut']=$ligne->prod_statut;
          // $utilisateur[$i]['image']=$ligne->prod_image;
          $utilisateur[$i]['cat_nom']=$ligne->cat_nom;
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

   return $utilisateur;
    }
}


function ajouterVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate)
{
  $A=0;

    // Ouvrir une connexion au serveur mysql en s'identifiant
   
    $connexion = connexionBdd();
        $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE = '".$unMatricule."';"; 

      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
      // echo $requete;
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
           $message="Echec de l'ajout : l ID existe déja !";
           $A=1;
      //   ajouterErreur($tabErr, $message);
      }
      else
      {
          
              $requete="insert into visiteur"
            ."(VIS_MATRICULE,VIS_NOM ,VIS_PRENOM, VIS_ADRESSE, VIS_CP, VIS_VILLE, VIS_DATEEMBAUCHE) values ('"
            .$unMatricule."','"
            .$unNom."','"
            .$unPrenom."','"
            .$uneAdresse."','"
            .$unCp."','"
            .$uneVille."','"   
            .$uneDate."');";  
            
            // echo $requete;
              // Lancer la requ�te d'ajout 
              $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
              
      $A=0;
         

      }
      return($A);
      
    }
function listercat()
{
  $connexion = connexionBdd();
  if(TRUE) 
  {
    $requete="Select * from categorie";
    $jeuResultat=$connexion->query($requete); 
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ);
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
      $lacat[$i]['cat_code']=$ligne->cat_code;
      $lacat[$i]['cat_nom']=$ligne->cat_nom;
      $ligne=$jeuResultat->fetch();
      $i = $i + 1;
    }
      
  }
  $jeuResultat->closeCursor();
  return $lacat;
    
}
function ajouterProduit($des, $prix, $image, $cat)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from produit";
    $requete=$requete." where prod_libelle = '".$des."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : Le nom existe déja!";
      $verif = 1;
      
    }
    else
    {
     
        $requete="insert into produit"
        ."(prod_libelle,prod_prix,prod_image,prod_statut,prod_categorie)  
        values ('"
        .$des."',"
        .$prix.",'"
        .$image."','
         Disponible',"
        .$cat.");";
 
 
         // WHERE Table_Panier.Id_Produit NOT IN (SELECT Id_Produit 
         // FROM Table_Produit)
         // Lancer la requ�te d'ajout 
         $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        // echo $requete;
         // Si la requ�te a r�ussi
         if ($ok)
         {
           $message = "La fleur a �t� correctement ajout�e";
           
         }
         else
         {
           $message = "Attention, l'ajout de la fleur a �chou� !!!";
           
         }
         $verif =0;
      
     

    }
  
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  return($verif);
}
function rechercherVisiteur($nom)
{
  $connexion = connexionBdd();
    $visiteur = array();
      
    $requete="select * from visiteur   where VIS_NOM LIKE '".$nom."%';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
 
    $i=0;
    $invite=0;
    
    $ligne = $jeuResultat->fetch();
    //echo $requete;
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    while($ligne)
      {
        $visiteur[$i]['VIS_MATRICULE']=$ligne['VIS_MATRICULE'];
        $visiteur[$i]['nom']=$ligne['VIS_NOM'];
        $visiteur[$i]['prenom']=$ligne['VIS_PRENOM'];
        $visiteur[$i]['adresse']=$ligne['VIS_ADRESSE'];
        $visiteur[$i]['ville']=$ligne['VIS_VILLE'];
        $visiteur[$i]['cp']=$ligne['VIS_CP'];
        $visiteur[$i]['date']=$ligne['VIS_DATEEMBAUCHE'];

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
      }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteur;
}
function rechercherProduit($uneDes)
{
  $connexion = connexionBdd();
    $produit = array();
      
    $requete="select c.cat_nom, p.prod_libelle,p.prod_code, p.prod_prix, p.prod_image, p.prod_statut from produit p inner join categorie c on c.cat_code=p.prod_categorie where prod_libelle like '".$uneDes."%';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
 
    $i=0;
    $invite=0;
    
    $ligne = $jeuResultat->fetch();
    // echo $requete;
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    while($ligne)
      {
        $produit[$i]['cat_nom']=$ligne['cat_nom'];
        $produit[$i]['prod_libelle']=$ligne['prod_libelle'];
        $produit[$i]['prod_prix']=$ligne['prod_prix'];
        $produit[$i]['prod_image']=$ligne['prod_image'];
        $produit[$i]['statut']=$ligne['prod_statut'];
        $produit[$i]['prod_code']=$ligne['prod_code'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
      }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $produit;
}


function GETID($ref)
{
  $connexion = connexionBdd();
    
  $tabProduit = array();
  $requete="select vis_matricule from visiteur  where vis_nom='".$ref."';";
    //echo $requete;
    $jeuResultat=$connexion->query($requete);
   $ligne = $jeuResultat->fetch();
   if($ligne)
   {
     $tabProduit = $ligne['vis_matricule'];
     
   }
   return($tabProduit);
}

function supprimer($ref)
{
      $connexion = connexionBdd();
      $requete="select * from visiteur  where vis_nom = '".$ref."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $ligne = $jeuResultat->fetch();
      
      if ($ligne)
      {
        $requete="DELETE FROM visiteur WHERE vis_nom ='".$ref."';"; 
        echo "Le visiteur a été correctement supprimé";
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
     
      }
}


function GETIDProduit($ref)
{
  $connexion = connexionBdd();
    
  $tabProduit= array();
  $requete="select prod_code,prod_libelle from produit  where prod_libelle ='".$ref."';";
    //echo $requete;
    $jeuResultat=$connexion->query($requete);
   $ligne = $jeuResultat->fetch();
   if($ligne)
   {
     $tabProduit = $ligne['prod_libelle'];
     
   }
   return($tabProduit);
}

function supprimerProduit($ref)
{
      $connexion = connexionBdd();
      $requete="select * from produit  where prod_libelle = '".$ref."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $ligne = $jeuResultat->fetch();
      
      if ($ligne)
      {
        $requete="SET FOREIGN_KEY_CHECKS = 0;DELETE FROM produit WHERE prod_libelle ='".$ref."';"; 
        $verif=1;
        // echo $requete;
      
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
     
      }
      else{
        $verif=0;
      }
  return($verif);
    
}


function modifierVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate)

{

    // Ouvrir une connexion au serveur mysql en s'identifiant
  $connect = connexionBdd();

      
      
          //VIS_MATRICULE,VIS_NOM ,VIS_PRENOM, VIS_ADRESSE, VIS_CP, VIS_VILLE, VIS_DATEEMBAUCHE, SEC_CODE, LAB_CODE
        $requete="SET FOREIGN_KEY_CHECKS = 0; UPDATE visiteur SET ";
        $requete=$requete."VIS_MATRICULE='".$unMatricule."',VIS_NOM='".$unNom."',VIS_PRENOM='".$unPrenom."',VIS_ADRESSE='".$uneAdresse."',VIS_VILLE='".$uneVille."', VIS_CP='".$unCp."',VIS_DATEEMBAUCHE='".$uneDate."' where VIS_MATRICULE = '".$unMatricule."';";
        echo $requete;
        
          // Lancer la requ�te d'ajout 
          $ok=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        
          // Si la requ�te a r�ussi
          if ($ok)
          {
            $message = "l'invite a bien ete modifie";
          //   ajouterErreur($tabErr, $message);
          }
          else
          {
            $message = "L'invite n'a pas ete modifie !!!";
          //   ajouterErreur($tabErr, $message);
          } 

      }



function modifierProduit($uneRef,$unNom,$unPrix,$uneCat)

{

    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connexionBdd();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from produit";
    $requete=$requete." where prod_code = '".$uneRef."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE produit SET prod_libelle = '$unNom', prod_prix = ".$unPrix.",prod_categorie=".$uneCat." WHERE `prod_code`='$uneRef';";
      echo $requete;   
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le materiel a été correctement modifié";
      // ajouterErreur($tabErr, $message);
      $tes=1;
    }
    else
    {
      $tes=0;

    } 
    return $tes;

      }




?>