<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibCom = "";
$NumArt = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumCom = $_GET['id'];

	$queryText = 'SELECT * FROM COMMENT WHERE NumCom = :NumCom;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumCom' => $NumCom
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$DtCreC = $object->DtCreC;
		$PseudoAuteur = $object->PseudoAuteur;
		$EmailAuteur = $object->EmailAuteur;
		$TitrCom = $object->TitrCom;
		$LibCom = $object->LibCom;
		$NumArt = $object->NumArt;

	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
			AND ((isset($_POST['DtCreC'])) AND !empty($_POST['DtCreC']))
			AND ((isset($_POST['PseudoAuteur'])) AND !empty($_POST['PseudoAuteur']))
			AND ((isset($_POST['EmailAuteur'])) AND !empty($_POST['EmailAuteur']))
			AND ((isset($_POST['TitrCom'])) AND !empty($_POST['TitrCom']))
			AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_DtCreC = (ctrlSaisies($_POST["DtCreC"]));
			$nv_PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
			$nv_EmailAuteur = (ctrlSaisies($_POST["EmailAuteur"]));
			$nv_TitrCom = (ctrlSaisies($_POST["TitrCom"]));
			$nv_LibCom = (ctrlSaisies($_POST["LibCom"]));
			$nv_NumArt = (ctrlSaisies($_POST["NumArt"]));
			$NumCom = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE COMMENT SET DtCreC = :nv_DtCreC, PseudoAuteur = :nv_PseudoAuteur, EmailAuteur = :nv_EmailAuteur, TitrCom = :nv_TitrCom, LibCom = :nv_LibCom, NumArt = :nv_NumArt WHERE NumCom = :NumCom');

			$query->execute(
				array(
					':nv_DtCreC' => $nv_DtCreC,
					':nv_PseudoAuteur' => $nv_PseudoAuteur,
					':nv_EmailAuteur' => $nv_EmailAuteur,
					':nv_TitrCom' => $nv_TitrCom,
					':nv_LibCom' => $nv_LibCom,
					':nv_NumArt' => $nv_NumArt,
					':NumCom' => $NumCom
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Comment_read.php");

		} //if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumCom ?> </h2>

	<form method="POST" action="Comment_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>DtCreC</label>
				<input type="datatime" name="DtCreC"
				value="<?php if(isset($_GET['id']))echo $DtCreC?>">
			</div>

			<div>
				<label>PseudoAuteur</label>
				<input type="text" size='20' maxlength="20" name="PseudoAuteur" id="PseudoAuteur"
				value="<?php if(isset($_GET['id']))echo $PseudoAuteur?>">
			</div>

			<div>
				<label>EmailAuteur</label>
				<input type="text" size='60' maxlength="60" name="EmailAuteur" id="EmailAuteur"
				value="<?php if(isset($_GET['id']))echo $EmailAuteur?>">
			</div>

			<div>
				<label>TitrCom</label>
				<input type="text" size='60' maxlength="60" name="TitrCom" id="TitrCom"
				value="<?php if(isset($_GET['id']))echo $TitrCom?>">
			</div>			

			<div>
				<label>Libellé Comment</label>
				<input type="text" name="LibCom" id="LibCom"
				value="<?php if(isset($_GET['id']))echo $LibCom?>">
			</div>

			<div>
				<label>NumArt</label>
				<input type="text" name="NumArt" size='12' maxlength="10" 
				value="<?php if(isset($_GET['id']))echo $NumArt?>">
			</div>

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>

</body>
</html>