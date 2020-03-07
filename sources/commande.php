<?php include("functions.php");?>
<html>
	<head>
		<title>Commande</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>
	<?php include("header.php"); ?>

	<?php 
	$panier = new panier;
	$ma_commande=$panier ->select_commande();
	?>

<div class="infos_commande">
		<table>
				<tr>
					<th>Produit acheté</th>
					<th>Nom du produit</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th>Date d'achat</th>
					<th>Adresse de livraison</th>
				</tr>
	<?php
	$a=0;
	for($i=0; $i < sizeof($ma_commande); $i++)
	{
		$date = date_create($ma_commande[$i][5]);
	?>
		<tr>
			<!-- Image produit -->
			<td><img width="80px" src="<?php echo $ma_commande[$i][9];?>"></td>
			<!-- Nom du produi -->
			<td><?php echo $ma_commande[$i][13];?></td>
			<!-- Quantité produit -->
			<td><?php echo $ma_commande[$i][3];?></td>
			<!-- Prix -->
			<td><?php echo $ma_commande[$i][4]*$ma_commande[$i][3]. " €";?></td>
			<!-- Date d'achat -->
			<?php setlocale(LC_TIME, "fr_FR");?>
			<td><?php echo strftime("%A %d %B", strtotime($ma_commande[$i][5]));
			echo '<br>'; 
			echo strftime("%G à %H:%M:%S", strtotime($ma_commande[$i][5]));?>			
			</td>
			<!-- Adresse de livraison -->
			<td><?php echo $ma_commande[$i][6];?></td>
			<!-- Calcul prix total de la commande -->
			<?php $a=$a+$ma_commande[$i][4]*$ma_commande[$i][3];?>
		</tr>
	<?php
	}
	?>
	</table>
</div>
<div class="prix_commande">
			<div><?php echo "Prix total : ".$a. " €"; ?></div>
</div>

	<?php include("footer.php");?>
</body>
</html>