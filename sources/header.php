<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <link rel="stylesheet" href="boutique.css">
</head>

<header>

<nav>
  <ul>
   



<?php if(isset($_POST['deco']))
{
  $user = new userpdo;
  $user->disconnect();

} 
?>

<?php if(isset($_SESSION['login']))
{
?>

  <li>
      <a class="menu" href="">Catégorie</a>
      <ul>
        
              <?php
              $produit= new produit();
              $produit -> categorie();
              $produit -> sous_categorie();

              for($j=0; $j < sizeof($produit -> categorie()); $j++)
              {
              ?>
              <li>
              <a class="menu" href="sous-categorie.php?type=<?php echo $produit -> categorie()[$j][2];?>"> <?php echo $produit -> categorie()[$j][1];?></a>
              <ul>
              <?php 
              for($i=0; $i < sizeof($produit -> categorie()); $i++)
              {
              ?>
              <li>
              <a class="menu" href="produits.php?type=<?php echo $produit -> categorie()[$j][2];?>?marque=<?php echo $produit -> sous_categorie()[$i][1];?>"> <?php echo $produit -> sous_categorie()[$i][1];?></a>
              </li>
              <?php
              }
              ?>
              </ul>
              <?php
              }
              ?>
            </li>
      </ul>
    </li>
    <li>
      <a href=""><div class="logoprofilhover"></div></a>  
        <ul>
          <li>
            <a class="menu" href="profil.php">Mon profil</a>
          </li>
          <li>
            <a class="menu" href="commandes.php">Mes commandes</a>
          </li>  
          </ul>
   </li>
  <li>
      <a href="index.php"><div class="logohover"></div></a>      
  </li>
   <li>
      <a href="panier.php"><img src="../img/logo_panier.png" height="40px" ></a>
  </li>
  <li>
      <form class="disconnect" method="post" action="" >
        <input name="deco" type="submit" value="Déconnexion">
      </form>
  </li>
<?php 
}
else
{
?>
  <li>
      <a class="menu" href="">Catégorie</a>
      <ul>
        
              <?php
              $produit= new produit();
              $produit -> categorie();
              $produit -> sous_categorie();

              for($j=0; $j < $produit -> taille(); $j++)
              {
              ?>
              <li>
              <a class="menu" href="sous-categorie.php?type=<?php echo $produit -> categorie()[$j][2];?>"> <?php echo $produit -> categorie()[$j][1];?></a>
              <ul>
              <?php 
              for($i=0; $i < $produit -> taille(); $i++)
              {
              ?>
              <li>
              <a class="menu" href="produits.php?type=<?php echo $produit -> categorie()[$j][2];?>?marque=<?php echo $produit -> sous_categorie()[$i][1];?>"> <?php echo $produit -> sous_categorie()[$i][1];?></a>
              </li>
              <?php
              }
              ?>
              </ul>
              <?php
              }
              ?>
            </li>
      </ul>
    </li>
   <li>
      <a href="contact.php">Contactez-nous</a>  
  </li>
  <li>
       <a href="index.php"><div class="logohover"></div></a>      
  </li>
   <li>
      <a href="inscription.php">Inscription</a>
  </li>
  <li>
      <a href="connexion.php">Connexion</a>
  </li>
  <?php
  }
  ?>
</ul>

</nav>
</header>

</html>
