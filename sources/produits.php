
<?php include("functions.php");?> 
<?php include("header.php");?>


<div class="produits_encadrement">
<p>Nos Produits</p>

<?php
$produit= new produit();

$image=$produit -> images();

for($i=0; $i < sizeof($image); $i++)
{
if($_GET['id']== $image[$i][0] && $_GET['id2']==  $image[$i][1])
{
?>
<div class="hover_produits">
	<a href="description.php?id=<?php echo  $image[$i][2];?>"><img height="<?php echo $image[$i][5];?>" width="<?php echo $image[$i][6];?>" src="<?php echo $image[$i][8];?>">
</div>
<?php
}
}
?>
</div>

<?php include("footer.php");?>