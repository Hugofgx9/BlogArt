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

				// Découpage FK LANGUE 
		        $LibLangSelect = substr($NumLang, 0, 4); 
		        $parmNumLang = $LibLangSelect . '%';

		        $requete = "SELECT MAX(NumLang) AS NumLang FROM ANGLE WHERE NumLang LIKE '$parmNumLang';";
		        $result = $bdPdo->query($requete);

		        if ($result) {
		            $tuple = $result->fetch();
		            $NumLang = $tuple["NumLang"];
		            if (is_null($NumLang)) {    // New lang dans AnglATIQUE
		                // Récup dernière PK utilisée
		                $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE;";
		                $result = $bdPdo->query($requete);
		                $tuple = $result->fetch();
		                $NumAngl = $tuple["NumAngl"];

		                $NumAnglSelect = (int)substr($NumAngl, 4, 2);
		                // No séquence suivant LANGUE
		                $numSeq1Angl = $NumAnglSelect + 1;
		                // Init no séquence AnglATIQUE pour nouvelle lang
		                $numSeq2Angl = 1;
		            }
		            else {
		                // Récup dernière PK pour FK sélectionnée
		                $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE WHERE NumLang LIKE '$parmNumLang' ;";
		                $result = $bdPdo->query($requete);
		                $tuple = $result->fetch();
		                $NumAngl = $tuple["NumAngl"];

		                // No séquence actuel LANGUE
		                $numSeq1Angl = (int)substr($NumAngl, 4, 2);
		                // No séquence actuel AnglATIQUE
		                $numSeq2Angl = (int)substr($NumAngl, 6, 2); 
		                // No séquence suivant AnglATIQUE
		                $numSeq2Angl++;
		            }

		            $LibAnglSelect = "ANGL";
		            // PK reconstituée : THE + no seq langue
		            if ($numSeq1Angl < 10) {
		                $NumAngl = $LibAnglSelect . "0" . $numSeq1Angl;
		            }
		            else {
		                $NumAngl = $LibAnglSelect . $numSeq1Angl;
		            }
		            // PK reconstituée : THE + no seq langue + no seq thématique
		            if ($numSeq2Angl < 10) {
		                $NumAngl = $NumAngl . "0" . $numSeq2Angl;
		            }
		            else {
		                $NumAngl = $NumAngl . $numSeq2Angl;
		            }
		        }    //End of if ($result) / no seq LANGUE


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

						header("location:".  $_SERVER['HTTP_REFERER']);;

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


