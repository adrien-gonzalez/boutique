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
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 	       echo "The file ". basename($name). " has been uploaded.";
 	   } else {
 	       echo "Sorry, there was an error uploading your file.";
 	   }

 	   $chemin="../img/".$name;
	   $_POST['image']= $chemin;
?>