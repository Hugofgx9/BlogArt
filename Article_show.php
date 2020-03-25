<?php

include './CRUD/includes/ctrlSaisies.php';
include './CRUD/includes/Connect_PDO.php';

//init les variables
$DtCreA = "";
$LibTitrA = "";
$LibChapoA = "";
$LibAccrochA = "";
$Parag1A = "";
$LibSsTitr1 = "";
$Parag2A = "";
$LibSsTitr2 = "";
$Parag3A = "";
$LibConclA = "";
$UrlPhotA = "";
$Likes = "";
$NumAngl = "";
$NumThem = "";
$NumLang = "";
$NumArt = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumArt = $_GET['id'];

	$queryText = 'SELECT * FROM ARTICLE WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$DtCreA = $object->DtCreA;
		$LibTitrA = $object->LibTitrA;
		$LibChapoA = $object->LibChapoA;
		$LibAccrochA = $object->LibAccrochA;
		$Parag1A = $object->Parag1A;
		$LibSsTitr1 = $object->LibSsTitr1;
		$Parag2A = $object->Parag2A;
		$LibSsTitr2 = $object->LibSsTitr2;
		$Parag3A = $object->Parag3A;
		$LibConclA = $object->LibConclA;
		$UrlPhotA = $object->UrlPhotA;
		$Likes = $object->Likes;
		$NumAngl_get = $object->NumAngl;
		$NumThem_get = $object->NumThem;
		$NumLang_get = $object->NumLang;

	}

	$queryText = 'SELECT * FROM MOTCLEARTICLE WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);


	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$NumMoCle_get = $object->NumMoCle;

	}

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/article.css">
</head>

<body>

	<nav>
	</nav>

	<div class=container>

		<a href="index.php"><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

		<input type="input" name="search">

		<a class="user" href="Connexion.php"><img class="user" src="assets/png/user.png" alt="Bouton User"></a>

		<!-- <h2> SHOW <?php echo $NumArt ?> </h2> -->

		<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<!-- <img src="<?php if(isset($_GET['id']))echo $UrlPhotA?>"> -->
			<img src="assets/png/art1.jpg" alt="Couverture de l'article">
			<p class="date">JJ/MM/AAAA HH:MM</p>
		<h1>
			<!-- <acronym title="LibTitrA :"> -->
			<?php if(isset($_GET['id']))echo $LibTitrA?>
			<!-- </acronym> -->
		</h1>

		<h2>
			 <!-- <acronym title="LibChapoA :"> -->
			<?php if(isset($_GET['id']))echo $LibChapoA?>
			<!-- </acronym> -->
		</h2>

		<h4>
			 <!-- <acronym title="LibAccrochA :"> -->
			<?php if(isset($_GET['id']))echo $LibAccrochA?>
			<!-- </acronym> -->
			 <!-- <acronym title="Parag1A :"> -->
			<?php if(isset($_GET['id']))echo $Parag1A?>
			<!-- </acronym> -->
		</h4>

		<h3>
			 <!-- <acronym title="LibSsTitr1 :"> -->
			<?php if(isset($_GET['id']))echo $LibSsTitr1?>
			<!-- </acronym> -->
		</h3>

		<h4>
			 <!-- <acronym title="Parag2A :"> -->
			<?php if(isset($_GET['id']))echo $Parag2A?>
			<!-- </acronym> -->
		</h4>

		<h3>
			 <!-- <acronym title="LibSsTitr2 :"> -->
			<?php if(isset($_GET['id']))echo $LibSsTitr2?>
			<!-- </acronym> -->
		</h3>

		<h4>
			 <!-- <acronym title="Parag3A :"> -->
			<?php if(isset($_GET['id']))echo $Parag3A?>
			<!-- </acronym> -->
		</h4>

		<h4>
			 <!-- <acronym title="LibConclA :"> -->
			<?php if(isset($_GET['id']))echo $LibConclA?>
			<!-- </acronym> -->
		</p>	

		<p  class="nbLike">
			<!-- <acronym <img src="<?php if(isset($_GET['id']))echo $UrlPhotA?>"> -->
			<img src="assets/png/unlike.png" class="like" alt="Like">
			<!-- </acronym> -->
			 <!-- <acronym title="Likes :"> -->
			<?php if(isset($_GET['id']))echo $Likes?> J'aimes
			<!-- </acronym> -->
		</p>

		<p>
			 <!-- <acronym title="NumAngl :"> -->
			<?php if(isset($_GET['id']))echo $NumAngl_get?>
			<!-- </acronym> -->
		</p>

		<p>
			 <!-- <acronym title="NumThem :"> -->
			<?php if(isset($_GET['id']))echo $NumThem_get?>
			<!-- </acronym> -->
		</p>		

		<p>
			 <!-- <acronym title="NumLang :"> -->
			<?php if(isset($_GET['id']))echo $NumLang_get?>
			<!-- </acronym> -->
		</p>

		<p>
			 <!-- <acronym title="NumMoCle :"> -->
			<?php if(isset($_GET['id']))echo $NumMoCle_get?>
			<!-- </acronym> -->
		</p>
	</div>

	<footer>	
	</footer>

</body>
</html>