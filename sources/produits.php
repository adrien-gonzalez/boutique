
<?php include("functions.php");?> 
<?php include("header.php");?>


<div class="produits_encadrement">
<p>Nos Produits</p>

<?php
$produit= new produit();


for($i=0; $i < sizeof($produit -> images()); $i++)
{
if($_GET['id']== $produit -> images()[$i][0] && $_GET['id2']==  $produit -> images()[$i][1])
{
?>
<div class="hover_produits">
	<a href="description.php?id=<?php echo  $produit -> images()[$i][0];?>"><img height="<?php echo $produit -> images()[$i][5];?>" width="<?php echo $produit -> images()[$i][6];?>" src="<?php echo $produit -> images()[$i][8];?>">
</div>
<?php
}
}
?>
</div>

<?php include("footer.php");?>