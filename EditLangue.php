<?php

include './includes/ctrlSaisies.php';
include './includes/Connect_PDO.php';

//init les variables
$Lib1Lang = "";
$Lib2Lang = "";
$NumPays = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumLang = $_GET['id'];

	$queryText = 'SELECT * FROM LANGUE WHERE NumLang = :NumLang;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumLang' => $NumLang
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$Lib1Lang = $object->Lib1Lang;
		$Lib2Lang = $object->Lib2Lang;
		$NumPays = $object->NumPays;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
			AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
			AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
			$nv_Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
			$nv_NumPays = (ctrlSaisies($_POST["NumPays"]));
			$NumLang = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE langue SET Lib1Lang = :nv_Lib1Lang, Lib2Lang = :nv_Lib2Lang, NumPays = :nv_NumPays WHERE NumLang = :NumLang');

			$query->execute(
				array(
					':nv_Lib1Lang' => $nv_Lib1Lang,
					':nv_Lib2Lang' => $nv_Lib2Lang,
					':nv_NumPays' => $nv_NumPays,
					':NumLang' => $NumLang
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:insertLangue.php");

		} //if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")


?>


<h2> Edit <?php $NumLang ?> </h2>

<form method="POST" action="EditLangue.php">

		<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

		<div>
			<label>Libellé court</label>
			<input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25" 
			value="<?php if(isset($_GET['id']))echo $Lib1Lang?>">
		</div>

		<div>
			<label>Libellé long</label>
			<input type="text" name="Lib2Lang" id="Lib2Lang" size="40" maxlength="40" 
			value="<?php if(isset($_GET['id']))echo $Lib2Lang?>">
		</div>

		<div>
			<label>Language</label>
			<input type="text" name="NumPays" size='10' maxlength="4" 
			value="<?php if(isset($_GET['id']))echo $NumPays?>">
		</div>

		<div>
			<input type="submit" name="Submit" value="Modifer">
		</div>
</form>

<?php


?>