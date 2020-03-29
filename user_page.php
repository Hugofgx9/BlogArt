<?php
session_start();


if (!empty($_SESSION['Login']) AND $_SESSION['admin'] == 0){

	$_SESSION['backpage'] = $_SERVER['HTTP_REFERER'];
	
	echo '<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/user.css">
</head>

<body>

	<nav>
	<a><img class="logo" src="assets/png/logo.png" alt="Logo du site"></a>
	</nav>

	<ul class="container">
		<div class="categories">
			<li><a href="index.php">Revenir au site</a></li>
			<li><button id="togg1">Modifier</button></li>
			<li><button id="togg2"><a href ="./CRUD/User/User_delete.php">Supprimer le compte</a></button></li>
			<li><a href ="deconnexion.php"><button id="togg3">Deconnexion</button></a></li>
		</div>';


		echo'<div id="d1">';
			include "./assets/includes/Article_insert.php";
		echo '</div>';
		echo'<div id="d2">';
			include './assets/includes/Article_read.php';
		echo'</div>';
		echo'<div id="d3">';
			include './assets/includes/Thematique_read.php';
		echo'</div>';
		echo'<div id="d4">';
			include './assets/includes/Angle_read.php';
		echo'</div>';
		echo'<div id="d5">';
			include './assets/includes/User_read.php';
		echo'</div>';
	echo'</ul>

	<footer>
		<p class="footer">MENTIONS LEGALES</p>
	</footer>
</body>';
}
?>