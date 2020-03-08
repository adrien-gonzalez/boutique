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
	public  $grade;


		
	
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
				$requser =  $this->connectdb()->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$nom', '$prenom','$email','$hash','utilisateur')");
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
			$this->grade=$donnees['grade'];
		
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
		$tab=[];
		$login=$_SESSION['login'];
		$infos =  $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");
		
		while($parameter = $infos->fetch())
		{
			array_push($tab, $parameter);
		}
		
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
	public $id;
		
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

	public function update($nom, $categorie, $sous_categorie, $description, $prix, $image, $hauteur, $largeur, $id)
	{
		$desc=str_replace ( "'","''", $description);
		$updateproduit =  $this->connectdb()->query("UPDATE produits SET nom='$nom', id_categorie='$categorie', id_sous_categorie='$sous_categorie', description='$desc', prix='$prix' WHERE id='$id'");

		$updateimg= $this->connectdb()->query("UPDATE images SET chemin='$image', hauteur='$hauteur', largeur='$largeur' WHERE id_produits='$id'");
		
		header('Location: administration.php');
	}

	public function delete($id)
	{
		$del=$this->connectdb()->query("DELETE FROM produits WHERE id='$id'");
		$del2=$this->connectdb()->query("DELETE FROM images WHERE id_produits='$id'");
		
		$handle=opendir("../img/");	
		unlink($_POST['chemin']);

		header('Location: administration.php');
	}

	public function descriptionproduit()
	{
		if(isset($_GET['id']))
		{
		$id=$_GET['id'];
		$description = $this->connectdb()->query("SELECT chemin, nom, description, prix FROM images, produits WHERE produits.id='$id' and id_produits='$id'");

		return($resultat = $description -> fetch());	
		}
		else
		{
			header('Location: index.php');
		}
	}

	public function nouveautees()
	{
		$tab=[];
		$ajout=$this->connectdb()->query("SELECT chemin, nom, produits.id FROM produits, images WHERE produits.id=id_produits ORDER BY produits.id DESC ");

		while($dernier_ajout = $ajout -> fetch())
		{
			array_push($tab, $dernier_ajout);
		}

		return $tab;
	}

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




// PANIER


class panier
{

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

	public function insert_panier($id, $quantite, $prix)
	{
		if(isset($_SESSION['login']))
		{
			$login=$_SESSION['login'];
			$id_user=$this->connectdb()->query("SELECT id FROM utilisateurs where login='$login'");
			$user = $id_user->fetch(PDO::FETCH_ASSOC);


			$utilisateur=$user['id'];
			$panier=$this->connectdb()->query("INSERT INTO panier VALUES(NULL, '$utilisateur','$id', '$quantite','$prix')");
			header('Location: panier.php');
		}
		else
		{
			header('Location: connexion.php');
		}
		
	}

	public function select_panier()
	{
		$tabpanier=[];

		$login=$_SESSION['login'];
		$id_user=$this->connectdb()->query("SELECT id FROM utilisateurs where login='$login'");
		$user = $id_user->fetch(PDO::FETCH_ASSOC);

		$utilisateur=$user['id'];
		$monpanier=$this->connectdb()->query("SELECT *FROM panier, images, produits WHERE id_utilisateur='$utilisateur' and panier.id_produits=images.id_produits and panier.id_produits=produits.id ORDER BY panier.id ASC");
		

		while($affichage_panier=$monpanier ->fetch())
		{
			array_push($tabpanier, $affichage_panier);

		}
		return $tabpanier;
	}

	public function delete($id)
	{

		$delete=$this->connectdb()->query("DELETE FROM panier WHERE id='$id' ORDER by id ASC");

	}

	public function achat($adresse)
	{
		$login=$_SESSION['login'];
		$id_user=$this->connectdb()->query("SELECT id FROM utilisateurs where login='$login'");
		$user = $id_user->fetch(PDO::FETCH_ASSOC);

		$utilisateur=$user['id'];
		$produits_panier=$this->connectdb()->query("SELECT *FROM panier WHERE id_utilisateur='$utilisateur'");
		
		$tab=[];

		while($produits = $produits_panier -> fetch())
		{
			array_push($tab, $produits);
		}

		for($i=0; $i < sizeof($tab); $i++)
		{
			$id_utilisateur=$tab[$i][1];
			$id_produits=$tab[$i][2];
			$quantite=$tab[$i][3];
			$prix=$tab[$i][4];

			$achat=$this->connectdb()->query("INSERT INTO commande (id_utilisateur, id_produits, quantité, prix, adresse) VALUES('$id_utilisateur', '$id_produits', '$quantite', '$prix', '$adresse')");
		}

		$delete=$this->connectdb()->query("DELETE FROM panier WHERE id_utilisateur='$utilisateur'");

		header('Location: commande.php');
		
	}

	public function select_commande()
	{

		$tabcommande=[];
		$login=$_SESSION['login'];
		$id_user=$this->connectdb()->query("SELECT id FROM utilisateurs where login='$login'");
		$user = $id_user->fetch(PDO::FETCH_ASSOC);

		$utilisateur=$user['id'];
		$macommande=$this->connectdb()->query("SELECT *FROM commande, images, produits WHERE id_utilisateur='$utilisateur' and commande.id_produits=images.id_produits and commande.id_produits=produits.id ORDER BY commande.id ASC");
		

		while($affichage_commande=$macommande ->fetch())
		{
			array_push($tabcommande, $affichage_commande);

		}
		return $tabcommande;

	}

	public function delete_commande($id)
	{

		$delete=$this->connectdb()->query("DELETE FROM commande WHERE id='$id' ORDER by id ASC");

	}






}

?>