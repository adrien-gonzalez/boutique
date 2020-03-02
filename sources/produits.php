<?php include("functions.php");?> 
<?php include("header.php");?>

<?php
$produit= new produit();


for($i=0; $i < sizeof($produit -> images()); $i++)
{
if($_GET['id']== $produit -> images()[$i][0] && $_GET['id2']==  $produit -> images()[$i][1])
{
?>
	<a href="description.php?id=<?php echo  $produit -> images()[$i][0];?>"><img height="<?php echo $produit -> images()[$i][5];?>" width="<?php echo $produit -> images()[$i][6];?>" src="<?php echo $produit -> images()[$i][8];?>">
<?php
}
}
?>
<?php include("footer.php");?>