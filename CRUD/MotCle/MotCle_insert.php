<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibMotCle'])) AND !empty($_POST['LibMotCle']))
				AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumMotCle = 0;

				$LibMotCle = (ctrlSaisies($_POST["LibMotCle"]));
				$NumLang = (ctrlSaisies($_POST["NumLang"]));

				$NumMotCleSelect = $NumMotCle; // exemple : 'CHIN'
				$parmNumMotCle = $NumMotCleSelect . "%";
				$requete = "SELECT MAX(NumMotCle) AS NumMotCle FROM MOTCLE WHERE NumMotCle LIKE '$parmNumMotCle';";

				$numSeqMotCle = 0;

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumMotCle = $tuple["NumMotCle"];

					if (is_null($NumMotCle)) {

						$NumMotCle = 0;
						$StrMotCle = $NumMotCleSelect;

					} //if (is_null($NumMotCle))
					else {

						$NumMotCle = $tuple["NumMotCle"];
						$StrMotCle = substr($NumMotCle, 0, 4);
						$numSeqMotCle = (int)substr($NumMotCle, 4);
					} //else

					$numSeqMotCle++;

					// clé primR reconstituée
					if ($numSeqMotCle < 10) {
						$NumMotCle = $StrMotCle . "0" . $numSeqMotCle;
					} //if ($numSeqMotCle < 10)
					else {
						$NumMotCle = $StrMotCle . $numSeqMotCle;
					} //else
				} //if ($result)


					$query = $bdPdo->prepare('INSERT INTO MOTCLE (NumMotCle, LibMotCle, NumLang) VALUES (:NumMotCle, :LibMotCle, :NumLang);');

					$query->execute(
						array(
							':NumMotCle' => $NumMotCle,
							':LibMotCle' => $LibMotCle,
							':NumLang' => $NumLang
						) //array
					); //$query->execute

					$MotCleid = $NumMotCle;

					$query->closeCursor();

						header("Location:MotCle_read.php");

			} //if (((isset($_POST['LibMotCle'])) AND !empty($_POST['LibMotCle'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$LibMotCle = "";
	$NumLang = "";
	$NumMotCle = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="MotCle_insert.php">

		<div>
			<label>Libellé</label>
			<input type="text" name="LibMotCle" id="LibMotCle" size="30" maxlength="30">
		</div>
		<div>
			<label>Langue</label>
			<input type="text" name="NumLang" size='8' maxlength="8">
		</div>
		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


