<html>

<head>
	<title>Accueil de boutique</title>
	<link href="sources/forum.css" rel="stylesheet">
	<meta charset="UTF-8">


</head>

<body class="accueil">

<?php

	session_start();
include('header.php');
	$base = mysqli_connect("localhost", "root", "", "boutique");
	mysqli_set_charset($base, "utf8");

  ?>
