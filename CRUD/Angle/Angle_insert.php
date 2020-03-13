<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl']))
				AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumAngl = 0;

				$LibAngl = (ctrlSaisies($_POST["LibAngl"]));
				$NumLang = (ctrlSaisies($_POST["TypLang"]));

				$NumAnglSelect = $NumAngl; // exemple : 'CHIN'
				$parmNumAngl = $NumAnglSelect . "%";
				$requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE WHERE NumAngl LIKE '$parmNumAngl';";

				$numSeqAngl = 0;

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumAngl = $tuple["NumAngl"];

					if (is_null($NumAngl)) {

						$NumAngl = 0;
						$StrAngl = $NumAnglSelect;

					} //if (is_null($NumAngl))
					else {

						$NumAngl = $tuple["NumAngl"];
						$StrAngl = substr($NumAngl, 0, 4);
						$numSeqAngl = (int)substr($NumAngl, 4);
					} //else

					$numSeqAngl++;

					// clé primR reconstituée
					if ($numSeqAngl < 10) {
						$NumAngl = $StrAngl . "0" . $numSeqAngl;
					} //if ($numSeqAngl < 10)
					else {
						$NumAngl = $StrAngl . $numSeqAngl;
					} //else
				} //if ($result)


					$query = $bdPdo->prepare('INSERT INTO ANGLE (NumAngl, LibAngl, NumLang) VALUES (:NumAngl, :LibAngl, :NumLang);');

					$query->execute(
						array(
							':NumAngl' => $NumAngl,
							':LibAngl' => $LibAngl,
							':NumLang' => $NumLang
						) //array
					); //$query->execute

					$Anglid = $NumAngl;

					$query->closeCursor();

						header("Location:Angle_read.php");

			} //if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$LibAngl = "";
	$NumLang = "";
	$NumAngl = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="Angle_insert.php">

		<div>
			<label>Angle</label>
			<input type="text" name="LibAngl" id="LibAngl" size="60" maxlength="60">
		</div>
		<!-- <div>
			<label>Langue</label>
			<input type="text" name="NumLang" size='8' maxlength="8">
		</div> -->

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
    	<!-- FIN Listbox Pays -->

		

		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


