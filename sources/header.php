<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <link rel="stylesheet" href="boutique.css">
</head>

<header>

<nav>
  <ul>
         
<?php if(isset($_SESSION['login']))
{
?>

  <li>
      <a class="menu" href="">Catégorie</a>
      <ul>
        <li>
          <a class="menu" href="sous-categorie?type=gamer">PC Gamer</a>
          <ul>
            <li>
              <a class="menu" href="produit.php?type=gamer?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=gamer?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=gamer?marque=msi">MSI</a>
            </li>
          </ul>
        </li>
     <li>
          <a class="menu" href="sous-categorie?type=bureautique">PC Bureautique</a>
          <ul>
            <li>
              <a class="menu" href="produit.php?type=bureautique?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=bureautique?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=bureautique?marque=msi">MSI</a>
            </li>
          </ul>
        </li>
     <li>
          <a class="menu" href="sous-categorie?type=multimedia">PC Multimédia</a>
          <ul>
           <li>
              <a class="menu" href="produit.php?type=multimedia?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=multimedia?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=multimedia?marque=msi">MSI</a>
            </li>
          </ul>
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
      <a href="deconnexion.php">Déconnexion</a>
  </li>
<?php 
}
else
{
?>
   <li>
      <a class="menu" href="#">Catégorie</a>
      <ul>
        <li>
          <a class="menu" href="sous-categorie?type=gamer">PC Gamer</a>
          <ul>
            <li>
              <a class="menu" href="produit.php?type=gamer?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=gamer?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=gamer?marque=msi">MSI</a>
            </li>
          </ul>
        </li>
     <li>
          <a class="menu" href="sous-categorie?type=bureautique">PC Bureautique</a>
          <ul>
            <li>
              <a class="menu" href="produit.php?type=bureautique?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=bureautique?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=bureautique?marque=msi">MSI</a>
            </li>
          </ul>
        </li>
     <li>
          <a class="menu" href="sous-categorie?type=multimedia">PC Multimédia</a>
          <ul>
           <li>
              <a class="menu" href="produit.php?type=multimedia?marque=hp">HP</a>
            </li>
            <li>
              <a class="menu" href="produit.php?type=multimedia?marque=asus">Asus</a>
            </li>
             <li>
              <a class="menu" href="produit.php?type=multimedia?marque=msi">MSI</a>
            </li>
          </ul>
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
