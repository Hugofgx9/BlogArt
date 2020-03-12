<?php  
	
	include './includes/ctrlSaisies.php';
	include './includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
				AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
				AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumLang = 0;

				$Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
				$Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
				$NumPays = (ctrlSaisies($_POST["NumPays"]));

				$numPaysSelect = $NumPays; // exemple : 'CHIN'
				$parmNumLang = $numPaysSelect . "%";
				$requete = "SELECT MAX(NumLang) AS NumLang FROM langue WHERE NumLang LIKE '$parmNumLang';";

				$numSeqLang = 0;

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumLang = $tuple["NumLang"];

					if (is_null($NumLang)) {

						$NumLang = 0;
						$StrLang = $numPaysSelect;

					} //if (is_null($NumLang))
					else {

						$NumLang = $tuple["NumLang"];
						$StrLang = substr($NumLang, 0, 4);
						$numSeqLang = (int)substr($NumLang, 4);
					} //else

					$numSeqLang++;

					// clé primR reconstituée
					if ($numSeqLang < 10) {
						$NumLang = $StrLang . "0" . $numSeqLang;
					} //if ($numSeqLang < 10)
					else {
						$NumLang = $StrLang . $numSeqLang;
					} //else
				} //if ($result)


					$query = $bdPdo->prepare('INSERT INTO langue (NumLang, Lib1Lang, Lib2Lang, NumPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :NumPays);');

					$query->execute(
						array(
							':NumLang' => $NumLang,
							':Lib1Lang' => $Lib1Lang,
							':Lib2Lang' => $Lib2Lang,
							':NumPays' => $NumPays
						) //array
					); //$query->execute

					$langid = $NumLang;

					$query->closeCursor();

						header("Location:insertLangue.php");

			} //if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$Lib1Lang = "";
	$Lib2Lang = "";
	$NumPays = "";
	$NumLang = "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="insertLangue.php">

		<div>
			<label>Libellé court</label>
			<input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25">
		</div>
		<div>
			<label>Libellé long</label>
			<input type="text" name="Lib2Lang" id="Lib2Lang" size="40" maxlength="40">
		</div>
		<div>
			<label>Language</label>
			<input type="text" name="NumPays" size='4' maxlength="4">
		</div>
		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

	<?php //liste langues
	    $query = "SELECT * FROM LANGUE ORDER BY NumLang ASC;";
	    try {
	      $bdPdo_select = $bdPdo->prepare($query);
	      $bdPdo_select->execute(); // recup toutes les infos nécéssaires
	      $NbreData = $bdPdo_select->rowCount(); // nombre d'enregistrements
	      $rowAll = $bdPdo_select->fetchAll();
	    }
	    catch (PDOException $e) {
	      echo 'Erreur SQL : '. $e->getMessage().'<br/>';
	      die();
	    }

	    if ($NbreData != 0) {
	?>

	<table border="1">
	<thead>
	  <tr>
	      <th>NumLang</th>
	      <th>Lib1Lang</th>
	      <th>Lib2Lang</th>
	      <th>NumPays</th>
	      <th>Modifier</th>
	      <th>Supprimer</th>
	  </tr>
	</thead>
	<tbody>

	<?php
	  foreach ($rowAll as $row) { // pour chaque ligne
	?>

		<tr>
		  <td><?php echo $row['NumLang']; ?></td>
		  <td><?php echo $row['Lib1Lang']; ?></td>
		  <td><?php echo $row['Lib2Lang']; ?></td>
		  <td><?php echo $row['NumPays']; ?></td>
		  <td><a href="EditLangue.php?id=<?php echo $row['NumLang'] ?>">Modifier</a></td>
		  <td><a href="DeleteLangue.php?NumLang=<?php echo $row['NumLang'] ?>">Supprimer</a></td>
		</tr>

	<?php
	  }
	?>

	</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucune langue enregistrée.";
	}
	?>

</body>
</html>


