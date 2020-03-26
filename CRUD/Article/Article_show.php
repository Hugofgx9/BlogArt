<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

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



<?php include '../includes/Head.php'; ?>

<body>
	<h2> SHOW <?php echo $NumArt ?> </h2>

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<p>
				<strong>DtCreA : </strong>
				<?php if(isset($_GET['id']))echo $DtCreA?>
			</p>

			<p>
				<strong>LibTitrA : </strong>
				<?php if(isset($_GET['id']))echo $LibTitrA?>
			</p>

			<p>
				<strong>LibChapoA : </strong>
				<?php if(isset($_GET['id']))echo $LibChapoA?>
			</p>

			<p>
				<strong>LibAccrochA : </strong>
				<?php if(isset($_GET['id']))echo $LibAccrochA?>
			</p>			

			<p>
				<strong>Parag1A : </strong>
				<?php if(isset($_GET['id']))echo $Parag1A?>
			</p>

			<p>
				<strong>LibSsTitr1 : </strong>
				<?php if(isset($_GET['id']))echo $LibSsTitr1?>
			</p>	

			<p>
				<strong>Parag2A : </strong>
				<?php if(isset($_GET['id']))echo $Parag2A?>
			</p>

			<p>
				<strong>LibSsTitr2 : </strong>
				<?php if(isset($_GET['id']))echo $LibSsTitr2?>
			</p>

			<p>
				<strong>Parag3A : </strong>
				<?php if(isset($_GET['id']))echo $Parag3A?>
			</p>

			<p>
				<strong>LibConclA : </strong>
				<?php if(isset($_GET['id']))echo $LibConclA?>
			</p>	

			<p>
				<strong>UrlPhotA : </strong>
				<img src="../../assets/image_article/<?php if(isset($_GET['id']))echo $UrlPhotA?>">
			</p>

			<p>
				<strong>Likes : </strong>
				<?php if(isset($_GET['id']))echo $Likes?>
			</p>

 			<p>
				<strong>NumAngl : </strong>
				<?php if(isset($_GET['id']))echo $NumAngl_get?>
			</p>

			<p>
				<strong>NumThem : </strong>
				<?php if(isset($_GET['id']))echo $NumThem_get?>
			</p>		


			<p>
				<strong>NumLang : </strong>
				<?php if(isset($_GET['id']))echo $NumLang_get?>
			</p>

			<p>
				<strong>NumMoCle : </strong>
				<?php if(isset($_GET['id']))echo $NumMoCle_get?>
			</p>

	</form>

</body>
</html>