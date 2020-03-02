<?php include("functions.php");?>
<?php include("header.php");?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>

	<body>

<div class="produits_encadrement">
<p>Nos Produits</p>
<?php
$produit= new produit();
$produit -> images();


for($i=0; $i < sizeof($produit -> images()); $i++)
{
?>
<div class="hover_produits">

	<a href="description.php?id=<?php echo  $produit -> images()[$i][0];?>""><img height="<?php echo $produit -> images()[$i][3];?>" width="<?php echo $produit -> images()[$i][4];?>" src="<?php echo $produit -> images()[$i][6];?>">
	</div>

<?php
}
?>
</div>


<?php include("footer.php");?>

</body>
</html>
