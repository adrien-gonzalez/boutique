<?php include("functions.php");
include("header.php");

$produit = new produit;

$tabproduits=$produit->produits();
$tab=$produit->categorie();
$tab1=$produit->sous_categorie();
$imagenom=$produit->genererChaineAleatoire(10);

if(isset($_POST['ajout_produit']))
{
	

	
	$target_dir = "../img/";
	$name=$imagenom.".jpg";


	$target_file = $target_dir . basename($name);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	


	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 	       echo "The file ". basename($name). " has been uploaded.";
 	   } else {
 	       echo "Sorry, there was an error uploading your file.";
 	   }




	echo '<br><br><br>';
	$chemin="../img/".$name;
	$_POST['image']= $chemin;
	

	$produit -> insert_produits($_POST['nom'], $_POST['categorie'], $_POST['sous_categorie'], $_POST['description'], $_POST['prix'],$_POST['image'], $_POST['hauteur'], $_POST['largeur']);
}

if(isset($_POST['nomproduit']))
{
	$nomproduit=$produit->nomproduits($_POST['nom']);
}

if(isset($_POST['supprimer']))
{
	echo $_POST['chemin'];	
}






?>
<html>
	<head>
		<title>Administration</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body class="administration">

<div class="choix">
	<form action="" method="post">
		<input type="submit" name="produit+" value="Ajouter un produit">
		<input type="submit" name="produit-" value="Supprimer ou modifier un produit">
	</form>
</div>





	<?php

	if(isset($_POST['produit+']))
	{
	?>
	<div class="adminform">
		<form action="" method="post" enctype="multipart/form-data">
		<div class="form">
			<input name="nom" required type="text" placeholder="Nom du Produit">
			<input name="prix" required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" />
		</div>
			<textarea name="description" required placeholder="description"></textarea>
			<input type="file" name="fileToUpload" id="fileToUpload">

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
			<div class="taille">
				<label>Hauteur :</label>
				<input name="hauteur" required type="number" value="200">
				<label>Largeur :</label>
				<input name="largeur" required type="number" value="200">
			</div>
			<div class="choix">
				<input type="submit" name="ajout_produit">
			</div>
		</form>
	</div>
	<?php
	}
	else if(isset($_POST['produit-']) || isset($_POST['nomproduit']))
	{
		if(!isset($_POST['nomproduit']))
			{
			?>
		<div class="adminform2">
			<form action="" method="post">	
				<select name="nom">
					
					<?php for($k=0; $k < sizeof($tabproduits); $k++)
					{
					?>
						<option><?php echo $tabproduits[$k][1];?></option>
					<?php
					}	
					?>
				</select>
					<div class="choix">
						<input type="submit" name="nomproduit" value="Suivant">
					</div>
			</form>
		</div>
			<?php
			}

				if(isset($_POST['nomproduit']))
				{
				?>
			<div class="adminform">
				<form action="" method="post">
				<div class="form">
					<input name="nom" required type="text" placeholder="Nom du Produit" value="<?php echo $nomproduit[0][1];?>">
					<input name="prix" required type="number" min="0.00" max="10000.00" step="0.01" placeholder="prix" value="<?php echo $nomproduit[0][5]; ?>"/>
				</div>
					<textarea name="description" required placeholder="description"><?php echo $nomproduit[0][4]; ?></textarea>
					<label>Image actuelle :</label>
					<img width="120px" src="<?php echo $nomproduit[1][2];?>">
					<label>Changer image :</label>
					<input  type="file" id="avatar" name="image" accept="image/png, image/jpeg">

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

					<div class="taille">
						<label>Hauteur :</label>
						<input name="hauteur" required type="number" value="200">
						<label>Largeur :</label>
						<input name="largeur" required type="number" value="200">
					</div>
					<div class="choix">
						<input type="submit" value="Modifier "name="modifier">
						<input type="submit" value="Supprimer" name="supprimer">
					</div>
				<?php
				}
				?>
		</form>
	</div>
	<?php
	}


include("footer.php");?>

</body>
</html>