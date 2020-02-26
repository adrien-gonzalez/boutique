<?php


class userpdo
{
	private $id;
	public 	$login;
	public 	$email;
	public 	$firstname;
	public 	$lastname;



public function register($login, $password, $email, $firstname, $lastname)
{
	include('connect.php');
	$user = $base->query("SELECT *FROM users WHERE login='$login'");
	$etat = $user->rowCount();

		if($etat== 0)
		{ 
			$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);	
			$requser = $base->query("INSERT INTO users VALUES(NULL, '$login', '$hash', '$email','$firstname','$lastname')");
			return array($login, $password, $email, $firstname, $lastname);
		}
		else
		{
			return "login déjà existant";
		}

}


public function connect($login, $password)
{
	include('connect.php');
	$user = $base->query("SELECT *FROM users WHERE login='$login'");
	$donnees = $user->fetch();
		
		if(password_verify($password,$donnees['password'])) 
		{
			$this->id=$donnees['id'];
			$this->login=$login;
			$this->email=$donnees['email'];
			$this->firstname=$donnees['firstname'];
			$this->lastname=$donnees['lastname'];
		
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			return(var_dump($row));
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

	if(isset($_SESSION['login']))
	{
		include('connect.php');
		$login=$_SESSION['login'];
		$del = $base->query("DELETE FROM users WHERE login='$login'");
		session_destroy();
	}

}

public function update($login, $password, $email, $firstname,
$lastname)
{
	if(isset($_SESSION['login']))
	{
		
		include('connect.php');
		$log=$_SESSION['login'];
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		$update = $base->query("UPDATE users SET login='$login', password='$hash', email='$email', firstname='$firstname', lastname='$lastname' WHERE login='$log'");
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
	include('connect.php');
	$login=$_SESSION['login'];
	$queryuser = $base ->query("SELECT *from users WHERE login='$login'");
	$donnees = $queryuser->fetch();

	$this->id=$donnees['id'];
	$this->login=$donnees['login'];
	$this->email=$donnees['email'];
	$this->firstname=$donnees['firstname'];
	$this->lastname=$donnees['lastname'];
}

}


session_start();



$user = new userpdo;