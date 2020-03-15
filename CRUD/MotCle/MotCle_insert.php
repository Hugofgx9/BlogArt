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

		      // Découpage FK LANGUE 
		        $LibLangSelect = substr($NumLang, 0, 4); 
		        $parmNumLang = $LibLangSelect . '%';

		        $requete = "SELECT MAX(NumLang) AS NumLang FROM MOTCLE WHERE NumLang LIKE '$parmNumLang';";
		        $result = $bdPdo->query($requete);

		        if ($result) {
		            $tuple = $result->fetch();
		            $NumLang = $tuple["NumLang"];
		            if (is_null($NumLang)) {    // New lang dans MOTCLE
		                // Récup dernière PK utilisée
		                $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE;";
		                $result = $bdPdo->query($requete);
		                $tuple = $result->fetch();
		                $NumMoCle = $tuple["NumMoCle"];

		                $NumMoCleSelect = (int)substr($NumMoCle, 4, 2);
		                // No séquence suivant LANGUE
		                $numSeq1MoCle = $NumMoCleSelect + 1;
		                // Init no séquence MOTCLE pour nouvelle lang
		                $numSeq2MoCle = 1;
		            }
		            else {
		                // Récup dernière PK pour FK sélectionnée
		                $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE WHERE NumLang LIKE '$parmNumLang' ;";
		                $result = $bdPdo->query($requete);
		                $tuple = $result->fetch();
		                $NumMoCle = $tuple["NumMoCle"];

		                // No séquence actuel LANGUE
		                $numSeq1MoCle = (int)substr($NumMoCle, 4, 2);
		                // No séquence actuel MOTCLE
		                $numSeq2MoCle = (int)substr($NumMoCle, 6, 2); 
		                // No séquence suivant MOTCLE
		                $numSeq2MoCle++;
		            }

		            $LibMoCleSelect = "MTCL";
		            // PK reconstituée : MTCL + no seq langue
		            if ($numSeq1MoCle < 10) {
		                $NumMoCle = $LibMoCleSelect . "0" . $numSeq1MoCle;
		            }
		            else {
		                $NumMoCle = $LibMoCleSelect . $numSeq1MoCle;
		            }
		            // PK reconstituée : MOCL + no seq langue + no seq mot clé
		            if ($numSeq2MoCle < 10) {
		                $NumMoCle = $NumMoCle . "0" . $numSeq2MoCle;
		            }
		            else {
		                $NumMoCle = $NumMoCle . $numSeq2MoCle;
		            }
		        }   // End of if ($result) / no seq LANGUE



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


