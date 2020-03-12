<?php

	//message d'erreur ?

	include "./includes/ctrlSaisies.php";
	include "./includes/Connect_PDO.php";

	if($_SERVER["REQUEST_METHOD"]=='POST'){

		// Gestion du submit, c'est UNE TERNAIRE ou test en ligne
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';



		//CTRL l'existence des champs du formulaire
		if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) 
			AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
			AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))
			AND (!empty($_POST['Submit']) AND ($Submit == 'Valider'))) {

			$erreur = false;

			// init de la PK
			$NumLang = 0;
			//ctrl saisies supprime les espaces malvenus
			$Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
			$Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
			$NumPays = (ctrlSaisies($_POST["NumPays"]));

			//creation de la PK
			$numPaysSelect = $NumPays;
			$parmNumLang = $numPaysSelect . '%';
			$requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE
				NumLang LIKE '$parmNumLang';";

			$numSeqLang = 0;

			//Lancement de la requete
			$result = $bdPdo->query($requete);

			if ($result) {
				$tuple = $result->fetch();
				$NumLang = $tuple["NumLang"];
				if (is_null($NumLang)) {
					$NumLang = 0;
					$StrLang = $numPaysSelect;
				}

				else {
					//recupération de la derniere clé primaire attribuée
					$NumLang = $tuple["NumLang"];
					$StrLang = substr($NumLang, 0, 4);
					$numSeqLang = (int)substr($NumLang, 4); //récupére le nombre correspondant à notre clé primaire
				}

				$numSeqLang++;

				//PK reconstituée par concaténation 
				if ($numSeqLang<10) {
					$NumLang = $StrLang. "0" .$numSeqLang;
				}
				else {
					$NumLang = $StrLang . $numSeqLang;
				}
			}// End of if($result)

			try {
				$bdPdo->beginTransaction();

				//préparation de la requete
				$query = $bdPdo->prepare('INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, NumPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :NumPays);');

				//Lancement de la requête

			$query->execute(
				array(
					':NumLang' => $NumLang,
					':Lib1Lang' => $Lib1Lang,
					':Lib2Lang' => $Lib2Lang,
					':NumPays' => $NumPays
				)
			);

			//libération du curseur
			$query->closeCursor();
			}

			catch (PDOExeption $e) {
				//msg d'erreur
				die ('Failed to insert Article : ' . $e->getMessage());

				//annule insert
				$bdPdo->rollBack();

			}

		}
		else {

			$erreur = true;
			$errSaisies = "Erreur, la saise est obligatoire !";
		}
			

	} // Fin if ($_SERVER...)

	//init les variables
	$Lib1Lang = "";
	$Lib2Lang = "";
	$NumPays = "";
	$NumLang = "";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog Art</title>
</head>
<body>

	<h2> Ajoutez une langue...</h2>
	<form action="insertLangue.php" method="post">


		<label for="Lib1Lang"><b>Libellé court :</b></label>
			<input type="text" name="Lib1Lang" maxlength="25" placeholder="25 max" autofocus="autofocus" value="" />
			<br><br>

		<label for="Lib2Lang"><b>Libellé long :</b></label>
			<input type="text" name="Lib2Lang" maxlength="45" placeholder="45 max" value="" />
			<br><br>

		<label for="NumPays"><b>Pays :</b></label>
			<input type="text" name="NumPays" maxlength="4" placeholder="4 max" />

		<p><input type="submit" value="Valider" name="Submit"></p>

	</form>

</body>
</html>

<?php include './includes/Disconnect_PDO.php' ?>


