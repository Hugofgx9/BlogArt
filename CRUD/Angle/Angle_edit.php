<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibAngl = "";
$NumLang = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumAngl = $_GET['id'];

	$queryText = 'SELECT * FROM ANGLE WHERE NumAngl = :NumAngl;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumAngl' => $NumAngl
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibAngl = $object->LibAngl;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl']))
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_LibAngl = (ctrlSaisies($_POST["LibAngl"]));
			$nv_NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumAngl = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE ANGLE SET LibAngl = :nv_LibAngl, NumLang = :nv_NumLang WHERE NumAngl = :NumAngl');

			$query->execute(
				array(
					':nv_LibAngl' => $nv_LibAngl,
					':nv_NumLang' => $nv_NumLang,
					':NumAngl' => $NumAngl
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Angle_read.php");

		} //if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumAngl ?> </h2>

	<form method="POST" action="Angle_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>Libellé Angle</label>
				<input type="text" name="LibAngl" id="LibAngl" size="60" maxlength="60" 
				value="<?php if(isset($_GET['id']))echo $LibAngl?>">
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