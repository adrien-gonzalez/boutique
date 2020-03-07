<?php include("functions.php");?>
<html>
	<head>
		<title>Information</title>
		<link href="boutique.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
<body>
	<?php 
	include("header.php"); 

	$user = new userpdo;
	$panier = new panier;
	$monprofil=$user->getAllInfos();


	if(isset($_POST['valider_information']))
	{
		$panier->achat($_POST['adresse']);
	}
?>

<div class="form_information">
	<form action="" method="post">
		<input name="nom" required type="text" placeholder="Nom *" value="<?php echo $monprofil[0][2];?>">
		<input name="prenom"required type="text" placeholder="Prénom *" value="<?php echo $monprofil[0][3];?>">
		<input name="email" required type="email" placeholder="Email *" value="<?php echo $monprofil[0][4];?>">
		<input name="adresse" required type="text" placeholder="Votre adresse de livraison *">
		<input name="valider_information" type="submit" value="Valider">
	</form>
</div>


	<?php include("footer.php");?>
</body>
</html>