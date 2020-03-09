<?php include("functions.php");?> 



<html>
	<head>
		<title>Boutique</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>
	<?php include("header.php");?>

<div class="produits_encadrement">
<p>Nos Produits</p>

<?php
$produit= new produit();

$image=$produit -> images();


if(!isset($_GET['id']) && !isset($_GET['id2']))
{

	for($i=0; $i < sizeof($image); $i++)
	{
		
	?>
		<div class="hover_produits">
			<a href="description.php?id=<?php echo  $image[$i][2];?>"><img height="<?php echo $image[$i][5];?>" width="<?php echo $image[$i][6];?>" src="<?php echo $image[$i][8];?>"></a>
		</div>
	<?php
	}
}
else if(!isset($_GET['id']) || !isset($_GET['id2']))
{
	header('Location: index.php');

}
else
{
	for($i=0; $i < sizeof($image); $i++)
	{
	if($_GET['id']== $image[$i][1] && $_GET['id2']==  $image[$i][0])
	{
		
	?>
	<div class="hover_produits">
		<a href="description.php?id=<?php echo  $image[$i][2];?>"><img height="<?php echo $image[$i][5];?>" width="<?php echo $image[$i][6];?>" src="<?php echo $image[$i][8];?>"></a>
	</div>
	<?php
	}
	}

}
?>
</div>


<?php include("footer.php");?>

</body>
</html>