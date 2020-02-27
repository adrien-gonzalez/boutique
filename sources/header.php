<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <link rel="stylesheet" href="boutique.css">
</head>
<header>
  <nav class='navbar'>
        <ul>



            <?php
                if(isset($_SESSION['login']))
              {/*conecté*/?>
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="profil.php">Catégories</a></li>
                  <a href="profil.php"><img src="../img/logo_profil.png" height="40px" ></a>
                  <a href="panier.php"><img src="../img/logo_panier.png" height="40px" ></a>
                  <li><a href="deconnexion.php">Déconnexion</a></li>
              <?php
              }
              else
              { /*pas connecter */ ?>
                  <li><a href="inscription.php">Inscription</a></li>
                  <li><a href="profil.php">Catégories</a></li>
                  <li><a href="connexion.php">Connexion</a></li>
              <?php
              }
              ?>
        </ul>
  </nav>
</header>

</html>
