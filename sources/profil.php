<!-- ------- PARTIE PHP - FONCTION REGISTER ------- -->


<?php include("functions.php"); 


if(!isset($_SESSION['login']))
{
	header('location: ../index.php');
}

if(isset($_POST['update']))
{
	$user = new userpdo;
	echo $user->getAllInfos();
}

$user = new userpdo;
$user->getAllInfos();


?>

<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->

<html>
	<head>
		<link href="boutique.css" rel="stylesheet">
	</head>	
	<body>
		<form action="" method="post">
			<input type="text" name="login" required placeholder="Login" value="">
			<input type="text" name="lastname" required placeholder="Nom">
			<input type="text" name="firstname" required placeholder="Prénom">
			<input type="email" name="email" required placeholder="Email">
			<input type="password" name="pass" required placeholder="Ancien mot de passe">
			<input type="password" name="pass1" required placeholder="Nouveau mot de passe">
			<input type="password" name="pass2" required placeholder="Confirmer le nouveau mot de passe">
			<input type="submit" name="update" required value="Modifier">
		</form>
	</body>
</html>

<!-- --------------------------------------------- -->