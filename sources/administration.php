
<?php include("functions.php");
include("header.php");



if(isset($_POST['ajout_produit']))
		{
			echo '<br><br><br>';
			$_POST['image']= "../img/" .$_POST['image'];
			 $produit -> insert_produits($_POST['nom'], $_POST['categorie'], $_POST['sous_categorie'], $_POST['description'], $_POST['prix'],$_POST['image'], $_POST['hauteur'], $_POST['largeur']);
		}	


$produit = new produit;

$tabproduits=$produit->produits();
$tab=$produit->categorie();
$tab1=$produit->sous_categorie();?>


<form action="" method="post">
	<input type="submit" name="produit+" value="Ajouter un produit">
	<input type="submit" name="produit-" value="Supprimer ou modifier un produit">
</form>





	<?php

	if(isset($_POST['produit+']))
	{
	?>
		<form action="" method="post">
			<input name="nom" required type="text" placeholder="Nom du Produit">
			<input name="prix" required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" />
			<textarea name="description" required placeholder="description"></textarea>
			<input required type="file" id="avatar" name="image" accept="image/png, image/jpeg">

			<select name="categorie">
				<?php 
				for($i=0; $i < sizeof($tab); $i++)
				{
				?>	
					<option value="<?php echo $tab[$i][0];?>"><?php echo $tab[$i][1];?></option>
				<?php
				}
				?>

			</select>
			<select name="sous_categorie">
				<?php 
				for($i=0; $i < sizeof($tab1); $i++)
				{
				?>	
					<option value="<?php echo $tab1[$i][0];?> "><?php echo $tab1[$i][1];?></option>
				<?php
				}
				?>

			</select>

			<label>Hauteur :</label>
			<input name="hauteur" required type="number" value="200">
			<label>Largeur :</label>
			<input name="largeur" required type="number" value="200">
			<input type="submit" name="ajout_produit">
		</form>
	<?php
	}
	else if(isset($_POST['produit-']))
	{
	?>
		<form action="" method="post">
			<select>
				<?php 
					for($k=0; $k < sizeof($tabproduits); $k++)
					{
					?>
						<option><?php echo $tabproduits[$k][0];?></option>
					<?php
					}
				?>
			</select>
		</form>
	<?php
	}


include("footer.php");?>