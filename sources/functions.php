<?php

session_start();



class userpdo
{
	
	private $id;
	public 	$login;
	public 	$nom;
	public 	$prenom;
	public 	$email;
	public 	$password;


public function register($login, $nom, $prenom, $email, $password)
{
	include("connect.php");
	$user = $base->query("SELECT *FROM utilisateurs WHERE login='$login'");
	$etat = $user->rowCount();

		if($_POST['pass1']!=$_POST['pass2'] || strlen($_POST['pass1']< 5))
		{
			if($_POST['pass1']!=$_POST['pass2'])
			{
				$error="Mots de passes rentrés différents";
			}
			if(strlen($_POST['pass1']< 5))
			{
				$error="Mot de passe trop court";
			}
			return $error;
		}
		else
		{
			if($etat== 0)
			{ 
				$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);	
				$requser = $base->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$nom', '$prenom','$email','$hash')");
				// return array($login, $password, $email, $firstname, $lastname);
			}

			else
			{
				return "login déjà existant";
			}
		}
}


public function connect($login, $password)
{
	include("connect.php");
	$user = $base->query("SELECT *FROM users WHERE login='$login'");
	$donnees = $user->fetch();
		
		if(password_verify($password,$donnees['password'])) 
		{
			$this->id=$donnees['id'];
			$this->login=$login;
			$this->nom=$donnees['nom'];
			$this->prenom=$donnees['prenom'];
			$this->mail=$donnees['nom'];
			$this->password=$donnees['password'];
		
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			// return(var_dump($row));
		}
		else
		{
			return "Login ou mot de passe incorrect";	
		}

}

public function disconnect()
{
	session_destroy();
	return "Vous êtes bien déconnecté";
}

public function delete()
{
	include("connect.php");

	if(isset($_SESSION['login']))
	{
		include('connect.php');
		$login=$_SESSION['login'];
		$del = $base->query("DELETE FROM utilisateurs WHERE login='$login'");
		session_destroy();
	}

}

public function update($login, $password, $email, $firstname,
$lastname)
{	
	include("connect.php");

	if(isset($_SESSION['login']))
	{
		$log=$_SESSION['login'];
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		$update = $base->query("UPDATE utilisateurs SET login='$login', nom='$nom', prenom='$prenom', email='$email', password='$hash' WHERE login='$log'");
	}
}

public function getAllInfos()
{
	if(isset($_SESSION['login']))
	{
        return($this);
    }
    else
    {

    	return "Aucun utilisateur n'est connecté";
    }
}

public function refresh()
{
	include("connect.php");

	$login=$_SESSION['login'];
	$queryuser = $base ->query("SELECT *from utilisateurs WHERE login='$login'");
	$donnees = $queryuser->fetch();

	$this->id=$donnees['id'];
	$this->login=$donnees['login'];
	$this->nom=$donnees['nom'];
	$this->prenom=$donnees['prenom'];
	$this->email=$donnees['email'];
	$this->password=$donnees['password'];
}

}

// $user = new userpdo;