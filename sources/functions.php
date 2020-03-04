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
	public $base;
	
function connectdb()
	{
	   
		$base = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
		return $base;
	}

public function register($login, $nom, $prenom, $email, $password, $password2)
{
	$user = $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");
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
				$requser =  $this->connectdb()->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$nom', '$prenom','$email','$hash')");
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
	$user =  $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");
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
	header('location: index.php');
}

public function delete()
{
	if(isset($_SESSION['login']))
	{
		include('connect.php');
		$login=$_SESSION['login'];
		$del =  $this->connectdb()->query("DELETE FROM utilisateurs WHERE login='$login'");
		session_destroy();
	}

}

public function update($login, $nom, $prenom, $email,$password)
{	



	if(isset($_SESSION['login']))
	{
		$log=$_SESSION['login'];
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		$update =  $this->connectdb()->query("UPDATE utilisateurs SET login='$login', nom='$nom', prenom='$prenom', email='$email', password='$hash' WHERE login='$log'");

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


	$login=$_SESSION['login'];
	$queryuser =  $this->connectdb() ->query("SELECT *from utilisateurs WHERE login='$login'");
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

	
	public $tabcategorie;
	public $tabsouscategorie;
	public $tabimages;
	public $base;

	public $nom;
	public $categorie;
	public $sous_categorie;
	public $description;
	public $prix;
		
	function connectdb()
	{
	   
		try {
			$base = new PDO('mysql:host=localhost;dbname=boutique', 'root', '',
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		} catch (PDOException $e) {
		    echo 'Connexion échouée : ' . $e->getMessage();
		}
		return $base;
	}

	public function categorie()
	{
	$tabcategorie=[];
	$categorie=$this->connectdb()->query("SELECT * FROM `categorie`");

	while($images = $categorie->fetch())
	{
		array_push($tabcategorie, $images);
	}
		$this->tabcategorie=$tabcategorie;
		return $tabcategorie;
	}

	public function sous_categorie()
	{

	$tabsouscategorie=[];
	$sous_categorie=$this->connectdb()->query("SELECT * FROM sous_categorie");
	

	while($images = $sous_categorie->fetch())
	{
		array_push($tabsouscategorie, $images);
	}

	$this->tabsouscategorie=$tabsouscategorie;
	return $tabsouscategorie;

	}

	public function images()
	{

	$tabimages=[];
	$images=$this->connectdb()->query("SELECT id_sous_categorie, id_categorie, produits.id, nom, prix, hauteur, largeur, description, chemin FROM produits, images WHERE produits.id=id_produits");
	

	while($pictures = $images->fetch())
	{
		array_push($tabimages, $pictures);
	}

	$this->tabimages=$tabimages;
	return $tabimages;

	}

	public function insert_produits($nom, $categorie, $sous_categorie, $description, $prix, $image, $hauteur, $largeur)
	{

	$existname=$this->connectdb()->query("SELECT *FROM produits WHERE nom = '$nom'");
	$value = $existname->rowCount();

	if($value ==0)
	{
		$desc=str_replace ( "'","''", $description);
		$insert_produits=$this->connectdb()->query("INSERT INTO produits VALUES(NULL, '$nom','$categorie','$sous_categorie','$desc','$prix')");
		$id_produit=$this->connectdb()->query("SELECT id FROM `produits` ORDER by id DESC");
		$id=$id_produit->fetch();


		$numid=$id['id'];
		$insert_images=$this->connectdb()->query("INSERT INTO images VALUES(NULL, '$numid','$image','$hauteur','$largeur')");
		$exist="Produit bien rajouté";

	}
	else
	{
		$exist="Produit déjà existant";
	}
	
		return $exist;
	}

	public function produits()
	{
		$tabproduit=[];
		$numproduit=$this->connectdb()->query("SELECT * FROM produits");
		
		while($num=$numproduit->fetch())
		{
			array_push($tabproduit, $num);
		}

		return $tabproduit;
	}

	public function nomproduits($nom)
	{
		$tabproduit=[];
		$nomproduit=$this->connectdb()->query("SELECT *FROM produits WHERE nom='$nom'");

		while($result=$nomproduit->fetch())
		{
			array_push($tabproduit, $result);
		}

		$id=$tabproduit[0][0];
		$img=$this->connectdb()->query("SELECT *FROM images WHERE id_produits='$id'");

		while($resultat=$img->fetch())
		{
			array_push($tabproduit, $resultat);
		}

		return $tabproduit;
		
	}

	// function update($nom, $categorie, $sous_categorie, $description, $prix, $image, $hauteur, $largeur);
	// {
		

	// }

	function genererChaineAleatoire($longueur = 10)
	{
	 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	 $longueurMax = strlen($caracteres);
	 $chaineAleatoire = '';
	 for ($i = 0; $i < $longueur; $i++)
	 {
	 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
	 }
	 return $chaineAleatoire;
	}
	
}

?>