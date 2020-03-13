<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
				AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumThem = 0;

				$LibThem = (ctrlSaisies($_POST["LibThem"]));
				$NumLang = (ctrlSaisies($_POST["NumLang"]));

				$NumThemSelect = $NumThem; // exemple : 'CHIN'
				$parmNumThem = $NumThemSelect . "%";
				$requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumThem LIKE '$parmNumThem';";

				$numSeqThem = 0;

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumThem = $tuple["NumThem"];

					if (is_null($NumThem)) {

						$NumThem = 0;
						$StrThem = $NumThemSelect;

					} //if (is_null($NumThem))
					else {

						$NumThem = $tuple["NumThem"];
						$StrThem = substr($NumThem, 0, 4);
						$numSeqThem = (int)substr($NumThem, 4);
					} //else

					$numSeqThem++;

					// clé primR reconstituée
					if ($numSeqThem < 10) {
						$NumThem = $StrThem . "0" . $numSeqThem;
					} //if ($numSeqThem < 10)
					else {
						$NumThem = $StrThem . $numSeqThem;
					} //else
				} //if ($result)


					$query = $bdPdo->prepare('INSERT INTO Themue (NumThem, LibThem, NumLang) VALUES (:NumThem, :LibThem, :NumLang);');

					$query->execute(
						array(
							':NumThem' => $NumThem,
							':LibThem' => $LibThem,
							':NumLang' => $NumLang
						) //array
					); //$query->execute

					$Themid = $NumThem;

					$query->closeCursor();

						header("Location:Thematique_read.php");

			} //if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$LibThem = "";
	$NumLang = "";
	$NumThem = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="Thematique_insert.php">

		<div>
			<label>Libellé court</label>
			<input type="text" name="LibThem" id="LibThem" size="60" maxlength="60">
		</div>
		<div>
			<label>Themuage</label>
			<input type="text" name="NumLang" size='8' maxlength="8">
		</div>
		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


