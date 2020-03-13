<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibMoCle = "";
$NumLang = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumMoCle = $_GET['id'];

	$queryText = 'SELECT * FROM MOTCLE WHERE NumMoCle = :NumMoCle;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumMoCle' => $NumMoCle
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibMoCle = $object->LibMoCle;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle']))
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
			$nv_NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumMoCle = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE MOTCLE SET LibMoCle = :nv_LibMoCle, NumLang = :nv_NumLang WHERE NumMoCle = :NumMoCle');

			$query->execute(
				array(
					':nv_LibMoCle' => $nv_LibMoCle,
					':nv_NumLang' => $nv_NumLang,
					':NumMoCle' => $NumMoCle
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:MotCle_read.php");

		} //if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumMoCle ?> </h2>

	<form method="POST" action="MotCle_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>Libellé MotCle</label>
				<input type="text" name="LibMoCle" id="LibMoCle" size="30" maxlength="30" 
				value="<?php if(isset($_GET['id']))echo $LibMoCle?>">
			</div>

			<div>
				<label>Langue</label>
				<input type="text" name="NumLang" size='10' maxlength="8" 
				value="<?php if(isset($_GET['id']))echo $NumLang?>">
			</div>

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>

</body>
</html>