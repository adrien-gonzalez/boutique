<!DOCTYPE html>
<html lang="fr" dir="ltr">
<header>
  <nav>
        <ul>

  

            <?php
                if(isset($_SESSION['login']))
              {/*conecté*/?>
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="profil.php">Profil</a></li>
                  <li><a href="panier.php">Panier</a></li>
                  <li><a href="deconnexion.php">Déconnexion</a></li>
              <?php
              }
              else
              { /*pas connecter */ ?>
                  <li><a href="inscription.php">Inscription</a></li>
                  <li><a href="connexion.php">Connexion</a></li>
              <?php
              }
              ?>
        </ul>
  </nav>
</header>

</html>
