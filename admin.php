<?php
session_start();


if ($_SESSION['admin'] == 1){
	echo '<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

	<nav>
	</nav>

	<ul class="container">
		<div class="categories">
			<li><button id="togg1">Créer un article</button></li>
			<li><button id="togg2">Gérer ses articles</button></li>
			<li><button id="togg3">Gérer ses thématiques</button></li>
			<li><button id="togg4">Gérer ses angles</button></li>
			<li><button id="togg5">Gérer ses utilisateurs</button></li>
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
	</footer>
</body>';
}
?>


<!-- AFFICHAGE DE LA BONNE CATEGORIE -->
<script type="text/javascript">

let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let togg3 = document.getElementById("togg3");
let togg4 = document.getElementById("togg4");
let togg5 = document.getElementById("togg5");
let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");
let d3 = document.getElementById("d3");
let d4 = document.getElementById("d4");
let d5 = document.getElementById("d5");


togg1.addEventListener("click", () => {
    d1.style.display = "grid";
    d2.style.display = "none";
    d3.style.display = "none";
    d4.style.display = "none";
    d5.style.display = "none";
})
togg2.addEventListener("click", () => {
    d1.style.display = "none";
    d2.style.display = "grid";
    d3.style.display = "none";
    d4.style.display = "none";
    d5.style.display = "none";
})
togg3.addEventListener("click", () => {
    d1.style.display = "none";
    d2.style.display = "none";
    d3.style.display = "grid";
    d4.style.display = "none";
    d5.style.display = "none";
})
togg4.addEventListener("click", () => {
    d1.style.display = "none";
    d2.style.display = "none";
    d3.style.display = "none";
    d4.style.display = "grid";
    d5.style.display = "none";
})
togg5.addEventListener("click", () => {
    d1.style.display = "none";
    d2.style.display = "none";
    d3.style.display = "none";
    d4.style.display = "none";
    d5.style.display = "grid";
})

</script>
