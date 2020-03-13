<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
				AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
				//AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumLang = 0;

				$Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
				$Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
				$NumPays = (ctrlSaisies($_POST["TypPays"]));

				echo $NumPays;

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

					header("Location:Langue_read.php");

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

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="Langue_insert.php">

		<div>
			<label>Libellé court</label>
			<input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25">
		</div>
		<div>
			<label>Libellé long</label>
			<input type="text" name="Lib2Lang" id="Lib2Lang" size="40" maxlength="40">
		</div>

	    <!-- Listbox Pays -->
        <div>
	        <label for="LibTypPays">	     
	                Quel pays :
	        </label>
	        <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $numPays; ?>" />            
	        <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
			<?php 
		            $numPays = "";
		            $frPays = "";  

		            // 2. Preparation requete NON PREPAREE
		            // Récupération de l'occurrence pays à partir de l'id
		            $queryText = 'SELECT * FROM PAYS;';

		            // 3. Lancement de la requete SQL
		            $result = $bdPdo->query($queryText);

		            // S'il y a bien un resultat
		            if ($result) {
		                // Parcours chaque ligne du resultat de requete
		                // Récupération du résultat de requête
		                    while ($tuple = $result->fetch()) {
		                        $ListnumPays = $tuple["numPays"];
		                        $ListfrPays = $tuple["frPays"];
			?>
                    <option value="<?= $ListnumPays; ?>" >
                        <?php echo $ListfrPays; ?>
                    </option>
			<?php 
			                    } // End of while
			            }   // if ($result)
			?> 
	        </select>
    	</div>
    	<!-- FIN Listbox Pays -->

		<div>
		<input type="submit" name="Submit" value="Valider">
		</div>

	</form>

</body>
</html>


