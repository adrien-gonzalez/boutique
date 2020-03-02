<html>
	<head>
		<title>Accueil de la boutique</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>

<body>

<?php include("functions.php");?>
<?php include("header.php");?>

<div class="sous_categorie">
	<div>
		<?php
		$produit = new produit;
		$produit -> sous_categorie();
			for($i=0; $i < sizeof($produit -> sous_categorie()); $i++)
			{
			?>
			<a href="produits.php?type=<?php echo $_GET['type'];?>?marque=<?php echo $produit -> sous_categorie()[$i][1]; ?>"><img width="<?php echo $produit -> sous_categorie()[$i][4];?>" height="<?php echo $produit -> sous_categorie()[$i][3];?>" src="<?php echo $produit -> sous_categorie()[$i][2];?>"></a>
			<?php
			}
			?>
	</div>
</div>


<?php include("footer.php");?>

</body>




