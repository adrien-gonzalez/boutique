
<?php include("functions.php");?>
<?php include("header.php");?>

<?php

$panier= new panier();
$panier -> images();


for($i=0; $i < sizeof($produit -> images()); $i++)

 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php include("footer.php");?>

  </body>
</html>
