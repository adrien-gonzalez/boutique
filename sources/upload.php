<?php

	$imagenom=$produit->genererChaineAleatoire(10);

	$target_dir = "../img/";
	$name=$imagenom.".jpg";

	$target_file = $target_dir . basename($name);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	


	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "Le fichier est une image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	        echo '<br>';
	    } else {
	        echo "Le fichier n'est pas une image.";
	        $uploadOk = 0;
	    }

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 	       echo "Le fichier ". basename($name). " a bien été upload.";
 	   } else {
 	       echo "Désolé, il y a eu une erreur dans l'upload de votre fichier.";
 	   }

 	   $chemin="../img/".$name;
	   $_POST['image']= $chemin;
?>