<?php
session_start();


if ($_SESSION['admin'] == 1){
	echo '<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
</head>

<body>

	<ul>
		<li>Créer un article</li>';
			include "./assets/includes/Article_insert.php";

		echo'<li>Gérer ses articles</li>';
			include './assets/includes/Article_read.php';

		echo'<li>Gérer ses thématiques</li>';
			include './assets/includes/Thematique_read.php';

		echo'<li>Gérer ses angles</li>';
			include './assets/includes/Angle_read.php';

		echo'<li>Gérer ses utilisateurs</li>';
			include './assets/includes/User_read.php';
	echo'</ul>';
}
?>