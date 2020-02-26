<?php include("functions.php");


// --------------------------------------------DEBUT PHP--------------------------------------------
session_start();

if(isset($_SESSION['login']))
{
 header('location: ../index.php');
}
if((isset($_POST['Valider']))&&(isset($_POST['login']))&&(isset($_POST['password'])))
{
$user= new userpdo;
$user->connect($_POST['login'], $_POST['password']);
}

// --------------------------------------------FIN PHP--------------------------------------------
?>

<section>
	<div class="form-style-5">
		<form method="post" action="connexion.php">
			<fieldset>
			<legend>Connexion</legend>
			<div class="input">
			<input required type="text" name="login" placeholder="Login *">
			</div>
			<div class="input">
			<input required type="password" name="password" placeholder="Password *">
			</div>
			<div class="input">
			<input type="submit" name="Valider" value="SE CONNECTER"/>
			</div>
			</fieldset>
		</form>
	</div>
</section>


</html>
