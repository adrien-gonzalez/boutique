<html>
	<head>
		<title>Description produit</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>

<body>
<?php include("functions.php");?>
<?php include("header.php");?>

<div class="sous_categorie">
	<div>
		<?php
		// $produit = new description_objet;

    $connexion = mysqli_connect("localhost","root","","boutique");


    $requete = "SELECT * FROM `produits` WHERE 1";
    $req = mysqli_query($connexion, $requete);

    while($row = mysqli_fetch_all($req))
    {
      var_dump($row);
    }
			?>
	</div>
</div>
<?php include("footer.php");?>
</body>
</html>
