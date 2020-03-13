<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
				AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumThem = 0;

				$LibThem = (ctrlSaisies($_POST["LibThem"]));
				$NumLang = (ctrlSaisies($_POST["TypLang"]));

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


