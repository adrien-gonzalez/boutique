<?php

session_start();



// PARTIE UTILISATEURS

class userpdo
{
	
	private $id;
	public 	$login;
	public 	$nom;
	public 	$prenom;
	public 	$email;
	public 	$password;
	public 	$password2;
	


public function register($login, $nom, $prenom, $email, $password, $password2)
{
	include("connect.php");
	$user = $base->query("SELECT *FROM utilisateurs WHERE login='$login'");
	$etat = $user->rowCount();

		if($password != $password2 || strlen($password) < 5)
		{
			if($password != $password2)
			{
				$msg="Mots de passes rentrés différents";
			}
			if(strlen($password) < 5)
			{
				$msg="Mot de passe trop court";
			}
		}
		else
		{
			if($etat== 0)
			{ 
				$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);	
				$requser = $base->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$nom', '$prenom','$email','$hash')");
				$msg="ok";
			}
			else
			{
				$msg="login déjà existant";
			}
		}

		return $msg;
}


public function connect($login, $password)
{
	include("connect.php");
	$user = $base->query("SELECT *FROM utilisateurs WHERE login='$login'");
	$donnees = $user->fetch();
		
		if(password_verify($password,$donnees['password'])) 
		{
			$this->id=$donnees['id'];
			$this->login=$login;
			$this->nom=$donnees['nom'];
			$this->prenom=$donnees['prenom'];
			$this->email=$donnees['email'];
			$this->password=$donnees['password'];
		
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			$msg="ok";
		}
		else
		{
			$msg="Login ou mot de passe incorrect";	
		}

		return $msg;
}

public function disconnect()
{
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	session_destroy();
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

public function update($login, $nom, $prenom, $email,$password)
{	
	include("connect.php");

	if(isset($_SESSION['login']))
	{
		$log=$_SESSION['login'];
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		$update = $base->query("UPDATE utilisateurs SET login='$login', nom='$nom', prenom='$prenom', email='$email', password='$hash' WHERE login='$log'");

		$this->login=$login;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->password=$password;

		unset($_SESSION['login']);
		unset($_SESSION['password']);
		header('location: connexion.php');

	}
}

public function getAllInfos()
{
	if(isset($_SESSION['login']))
	{
		
		$tab=array($this->login,
		$this->nom,
		$this->prenom,
		$this->email,
		$this->password);
		return $tab;
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





// PARTIE PRODUITS



class produit
{

	public 	$tabcategorie;
	public 	$tabsouscategorie;
	public $tabimages;


	public function categorie()
	{
	include("connect.php");

	$tabcategorie=[];
	$categorie=$base ->query("SELECT * FROM `categorie`");

	while($images = $categorie->fetch())
	{
		array_push($tabcategorie, $images);
	}
		$this->tabcategorie=$tabcategorie;
		return $tabcategorie;
	}

	public function sous_categorie()
	{
	include("connect.php");

	$tabsouscategorie=[];
	$sous_categorie=$base ->query("SELECT * FROM `sous-categorie`");
	

	while($images = $sous_categorie->fetch())
	{
		array_push($tabsouscategorie, $images);
	}

	$this->tabsouscategorie=$tabsouscategorie;
	return $tabsouscategorie;

	}

	public function images()
	{
	include("connect.php");

	$tabimages=[];
	$images=$base ->query("SELECT produits.id, nom, prix, hauteur, largeur, description, chemin FROM produits, images WHERE produits.id=id_produits");
	

	while($pictures = $images->fetch())
	{
		array_push($tabimages, $pictures);
	}

	$this->tabimages=$tabimages;
	return $tabimages;

	}


}