<?php include("functions.php");?> 
<?php include("header.php");?>

<?php
	if(isset($_POST['ok']))
	{
		$chemin= "../img/" .$_POST['avatar'];
	}
?>

<form action="" method="post">
	<input required type="text" placeholder="Nom du Produit">
	<input required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" />
	<textarea required placeholder="description"></textarea>
	<input required type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
	<label>Hauteur :</label>
	<input required type="number" value="200">
	<label>Largeur :</label>
	<input required type="number" value="200">
	<input type="submit" name="ok">
</form>


<?php include("footer.php");?>