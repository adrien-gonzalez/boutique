
<?php include("functions.php");?> 
<?php include("header.php");?>


<?php
	if(isset($_POST['ok']))
	{
		$chemin= "../img/" .$_POST['avatar'];
	}
	$produit = new produit;
?>

<form action="" method="post">
	<input required type="text" placeholder="Nom du Produit">
	<input required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" />
	<textarea required placeholder="description"></textarea>
	<input required type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">

	<select name="categorie">
		<?php 
		for($i=0; $i < sizeof($produit -> categorie()); $i++)
		{
		?>	
			<option value="<?php echo $produit -> categorie()[$i][0];?>"><?php echo $produit -> categorie()[$i][1];?></option>
		<?php
		}
		?>

	</select>
	<select name="sous_categorie">
		<?php 
		for($i=0; $i < sizeof($produit -> sous_categorie()); $i++)
		{
		?>	
			<option value="<?php echo $produit -> sous_categorie()[$i][0];?> "><?php echo $produit -> sous_categorie()[$i][1];?></option>
		<?php
		}
		?>

	</select>

	<label>Hauteur :</label>
	<input required type="number" value="200">
	<label>Largeur :</label>
	<input required type="number" value="200">
	<input type="submit" name="ok">
</form>


<?php include("footer.php");?>