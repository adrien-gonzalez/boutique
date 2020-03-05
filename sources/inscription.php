
<!-- ------- PARTIE PHP - FONCTION REGISTER ------- -->
<?php include("functions.php");


if(isset($_SESSION['login']))
{
	header('location: index.php');
}

if(isset($_POST['signin']))
{
	$user = new userpdo;
	if($user->register($_POST['login'], $_POST['lastname'],$_POST['firstname'],$_POST['email'],$_POST['pass1'], $_POST['pass2'])=="ok");
	{
		header('location: index.php');
	}

}

?>

<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->

<html>
	<head>
		<link href="boutique.css" rel="stylesheet">
	</head>
	<body>

</div>

		<?php include("header.php");?>
		<div id="inscription">
			<p>Inscrivez-Vous!</p>
		<div id="panel_inscription">
		<form action="" method="post">
			<input type="text" name="login" required placeholder="Login">
			<input type="text" name="lastname" required placeholder="Nom">
			<input type="text" name="firstname" required placeholder="Prénom">
			<input type="email" name="email" required placeholder="Email">
			<input type="password" name="pass1" required placeholder="Mot de passe">
			<input type="password" name="pass2" required placeholder="Confirmer votre mot de passe">
			<input type="submit" name="signin" required value="S'inscrire">
		</form>
		</div>
		</div>

<?php include("footer.php");?>
	</body>
</html>

<!-- --------------------------------------------- -->
