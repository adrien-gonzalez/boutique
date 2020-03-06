<?php include("functions.php");?>


<html>
	<head>
		<title>Description produit</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>

<?php 
$produit = new produit();
$description_produit=$produit -> descriptionproduit();
?>

<?php include("header.php");

if(isset($_POST['valider']))
{
	$panier = new panier();
	$panier -> insert_panier($_GET['id'], $_POST['number_product'], $description_produit[3]);
}



if($description_produit==false)
{
	header('Location: index.php');
}
?>

<div class="infos_produit">
	<div class="image_produit">
		<img width="250px" src="<?php echo $description_produit[0];?>">
	</div>
	<div class="detail_produit">
		<div class="nom_produit">
			<h1><?php echo $description_produit[1];?></h1>
			<h2><?php echo $description_produit[3]." €";?></h2>

		</div>
		<div class="description_produit">
			<?php echo $description_produit[2];?>
		</div>
	</div>
	<div class="ajout_panier">
		<form action="description.php?id=<?php echo $_GET['id'];?>" method="post">
			<div>
				<label>Quantité : </label>
				<input type="number" value="1" name="number_product">
			</div>
				<input type="submit" name="valider" value="">
		</form>
	</div>
</div>













<?php include("footer.php");?>

</body>
</html>