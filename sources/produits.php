<?php include("functions.php");?> 
<?php include("header.php");?>

<?php
$produit= new produit();
$produit -> images();


for($i=0; $i < sizeof($produit -> images()); $i++)
{
?>
	<a href="description.php?id=<?php echo  $produit -> images()[$i][0];?>""><img height="<?php echo $produit -> images()[$i][3];?>" width="<?php echo $produit -> images()[$i][4];?>" src="<?php echo $produit -> images()[$i][6];?>">
<?php
}
?>

<?php include("footer.php");?>