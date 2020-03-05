<?php include("functions.php");?>

<html>

<head>
	<title>Accueil de la boutique</title>
	<link href="boutique.css" rel="stylesheet">
	<meta charset="UTF-8">


</head>

<body class="accueil">
	<?php include("header.php");

	$produit= new produit;
	$dernier_ajout= $produit->nouveautees();
	?>

<h1>Derniers ajouts</h1>
<div class="dernier_ajout">

	<?php 
	if(sizeof($dernier_ajout) > 5)
	{
		for($i=0; $i < 5; $i++)
		{
			?>
			<div>
				<h2><?php echo $dernier_ajout[$i][1];?></h2>
				<a href="description.php?id=<?php echo $dernier_ajout[$i][2];?>"><img width="200px" src="<?php echo $dernier_ajout[$i][0];?>"></a>
			</div>
			<?php
		}
	}
	else
	{
		for($i=0; $i < sizeof($dernier_ajout); $i++)
		{
			?>
			<div>
				<h2><?php echo $dernier_ajout[$i][1];?></h2>
				<a href="description.php?id=<?php echo $dernier_ajout[$i][2];?>"><img width="200px" src="<?php echo $dernier_ajout[$i][0];?>"></a>
			</div>
			<?php
		}
	}
	?>

</div>
	<?php include("footer.php");?>
 </body>
</html>