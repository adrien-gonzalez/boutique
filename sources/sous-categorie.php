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
		$user = new produit;
		$user -> sous_categorie();
			for($i=0; $i < $user -> taille(); $i++ )
			{
			?>
			<a href="produit.php?type=<?php echo $_GET['type'];?>?marque=<?php echo $user -> sous_categorie()[$i][2]; ?>"><img width="<?php echo $user -> sous_categorie()[$i][6];?>" height="<?php echo $user -> sous_categorie()[$i][7];?>" src="<?php echo $user -> sous_categorie()[$i][3];?>"></a>
			<?php
			}
			?>
	</div>
</div>


<?php include("footer.php");?>

</body>




