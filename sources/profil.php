<!-- ------- PARTIE PHP - FONCTION REGISTER ------- -->


<?php include("functions.php");



if(!isset($_SESSION['login']))
{
	header('Location: index.php');
}

if(isset($_POST['update']))
{
	$user = new userpdo;
	$user->update($_POST['login'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['pass']);
}

$user = new userpdo;
$user->refresh();
$user->connect($_SESSION['login'], $_SESSION['password']);
$monprofil=$user->getAllInfos();


?>

<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->

<html>
	<head>
		<link href="boutique.css" rel="stylesheet">
	</head>

	<body>
		<?php include("header.php");?>
		<div id="profil">
			<p>Modifier vos information!</p>
		<div id="panel_profil">
		<form action="" method="post">
			<input type="text" name="login" required placeholder="Login" value="<?php echo $monprofil[0]; ?>">
			<input type="text" name="lastname" required placeholder="Nom" value="<?php echo $monprofil[1]; ?>">
			<input type="text" name="firstname" required placeholder="Prénom" value="<?php echo $monprofil[2]; ?>">
			<input type="email" name="email" required placeholder="Email" value="<?php echo $monprofil[3]; ?>">
			<input type="password" name="pass" required placeholder="Mot de passe" value="<?php echo $_SESSION['password'];?>">
			<input type="submit" name="update" required value="Modifier">
		</form>
	</div>
</div>
		<?php include("footer.php");?>
	</body>
</html>

<!-- --------------------------------------------- -->
