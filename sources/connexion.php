<!-- ------- PARTIE PHP - FONCTION REGISTER ------- -->

<?php include("functions.php");


if(isset($_SESSION['login']))
{
	header('location: index.php');
}

if(isset($_POST['connect']))
{
	$user = new userpdo;
	$user->connect($_POST['login'], $_POST['password']);
	if(($user->connect($_POST['login'], $_POST['password']))=="ok" )
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
		<?php include("header.php");?>
		<div id="connexion">
<div id="panel_connexion">

</div>
		<form action="" method="post">
			<input type="text" name="login" required placeholder="Login">
			<input type="password" name="password" required placeholder="Password">
			<input type="submit" name="connect" required value="Connexion">
		</form>
	</div>

		<?php include("footer.php");?>
	</body>
</html>

<!-- --------------------------------------------- -->
