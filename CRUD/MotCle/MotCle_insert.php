<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibMotCle'])) AND !empty($_POST['LibMotCle']))
				AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumMotCle = 0;

				$LibMotCle = (ctrlSaisies($_POST["LibMotCle"]));
				$NumLang = (ctrlSaisies($_POST["TypLang"]));

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
			    <!-- Listbox Pays -->
        <div>
	        <label for="LibTypLang">	     
	                Langue :
	        </label>
	        <input type="hidden" id="idTypLang" name="idTypLang" value="<?php echo $numPays; ?>" />            
	        <select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" tabindex="30" >
			<?php 
		            $numLang = "";
		            $frLang = "";  

		            // 2. Preparation requete NON PREPAREE
		            // Récupération de l'occurrence pays à partir de l'id
		            $queryText = 'SELECT * FROM LANGUE;';

		            // 3. Lancement de la requete SQL
		            $result = $bdPdo->query($queryText);

		            // S'il y a bien un resultat
		            if ($result) {
		                // Parcours chaque ligne du resultat de requete
		                // Récupération du résultat de requête
		                    while ($tuple = $result->fetch()) {
		                        $ListnumLang = $tuple["NumLang"];
		                        $ListfrLang = $tuple["Lib1Lang"];
			?>
                    <option value="<?= $ListnumLang; ?>" >
                        <?php echo $ListfrLang; ?>
                    </option>
			<?php 
			                    } // End of while
			            }   // if ($result)
			?> 
	        </select>
    	</div>
    	<!-- FIN Listbox Pays Typ -->
		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


