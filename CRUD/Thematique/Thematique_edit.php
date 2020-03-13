<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibThem = "";
$NumLang = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumThem = $_GET['id'];

	$queryText = 'SELECT * FROM THEMATIQUE WHERE NumThem = :NumThem;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumThem' => $NumThem
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibThem = $object->LibThem;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_LibThem = (ctrlSaisies($_POST["LibThem"]));
			$nv_NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumThem = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE THEMATIQUE SET LibThem = :nv_LibThem, NumLang = :nv_NumLang WHERE NumThem = :NumThem');

			$query->execute(
				array(
					':nv_LibThem' => $nv_LibThem,
					':nv_NumLang' => $nv_NumLang,
					':NumThem' => $NumThem
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Thematique_read.php");

		} //if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumThem ?> </h2>

	<form method="POST" action="Thematique_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>LibTheme</label>
				<input type="text" name="LibThem" id="LibThem" size="60" maxlength="60" 
				value="<?php if(isset($_GET['id']))echo $LibThem?>">
			</div>

			<div>
				<label>NumLang</label>
				<input type="text" name="NumLang" size='10' maxlength="8" 
				value="<?php if(isset($_GET['id']))echo $NumLang?>">
			</div>

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>

</body>
</html>