<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibTitrA'])) AND !empty($_POST['LibTitrA']))
				AND ((isset($_POST['LibChapoA'])) AND !empty($_POST['LibChapoA']))
				AND ((isset($_POST['LibAccrochA'])) AND !empty($_POST['LibAccrochA']))
				AND ((isset($_POST['Parag1A'])) AND !empty($_POST['Parag1A']))
				AND ((isset($_POST['LibSsTitr1'])) AND !empty($_POST['LibSsTitr1']))
				AND ((isset($_POST['Parag2A'])) AND !empty($_POST['Parag2A']))
				AND ((isset($_POST['LibSsTitr2'])) AND !empty($_POST['LibSsTitr2']))
				AND ((isset($_POST['Parag3A'])) AND !empty($_POST['Parag3A']))
				AND ((isset($_POST['LibConclA'])) AND !empty($_POST['LibConclA']))
				AND ((isset($_POST['UrlPhotA'])) AND !empty($_POST['UrlPhotA']))
				AND ((isset($_POST['Likes'])) AND !empty($_POST['Likes']))
				//AND ((isset($_POST['NumAngl'])) AND !empty($_POST['NumAngl']))
				//AND ((isset($_POST['NumThem'])) AND !empty($_POST['NumThem']))
				//AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {


				$erreur = false;

				$NumArt = 0;
			    $dt = new DateTime();
    			$DtCreA = $dt->format('Y-m-d');
				$LibTitrA = (ctrlSaisies($_POST["LibTitrA"]));
				$LibChapoA = (ctrlSaisies($_POST["LibChapoA"]));
				$LibAccrochA = (ctrlSaisies($_POST["LibAccrochA"]));
				$Parag1A = (ctrlSaisies($_POST["Parag1A"]));
				$LibSsTitr1 = (ctrlSaisies($_POST["LibSsTitr1"]));
				$Parag2A = (ctrlSaisies($_POST["Parag2A"]));
				$LibSsTitr2 = (ctrlSaisies($_POST["LibSsTitr2"]));
				$Parag3A = (ctrlSaisies($_POST["Parag3A"]));
				$LibConclA = (ctrlSaisies($_POST["LibConclA"]));
				$UrlPhotA = (ctrlSaisies($_POST["UrlPhotA"]));
				$Likes = (ctrlSaisies($_POST["Likes"]));
				$NumAngl = (ctrlSaisies($_POST["TypAngl"]));
				$NumThem = (ctrlSaisies($_POST["TypThem"]));
				$NumLang = (ctrlSaisies($_POST["TypLang"]));

				$NumMoCle = (ctrlSaisies($_POST["TypMoCle1"]));



				$parmNumArt = "%"; // exemple : '21'
				$requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE WHERE NumArt LIKE '$parmNumArt';";

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumArt = $tuple["NumArt"];

					if (is_null($NumArt)) {

						$NumArt = 1;

					} //if (is_null($NumArt))
					else {

						$NumArt = $tuple["NumArt"];
						$numSeqArt = (int)$NumArt;
						$numSeqArt++;
						$NumArt = $numSeqArt;
					}
				} //if ($result)

				$query = $bdPdo->prepare('INSERT INTO ARTICLE (NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibConclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang) VALUES (:NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibConclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang);');

				$query->execute(
					array(
						':NumArt' => $NumArt,		
						':DtCreA' => $DtCreA,
						':LibTitrA' => $LibTitrA,
						':LibChapoA' => $LibChapoA,
						':LibAccrochA' => $LibAccrochA,
						':Parag1A' => $Parag1A,
						':LibSsTitr1' => $LibSsTitr1,
						':Parag2A' => $Parag2A,
						':LibSsTitr2' => $LibSsTitr2,
						':Parag3A' => $Parag3A,
						':LibConclA' => $LibConclA,
						':UrlPhotA' => $UrlPhotA,
						':Likes' => $Likes,
						':NumAngl' => $NumAngl,
						':NumThem' => $NumThem,
						':NumLang' => $NumLang
					) //array
				); //$query->execute

				$query->closeCursor();

				$query = $bdPdo->prepare('INSERT INTO MOTCLEARTICLE (NumArt, NumMoCle) VALUES (:NumArt, :NumMoCle);');

				$query->execute(
					array(
						':NumArt' => $NumArt,
						':NumMoCle' => $NumMoCle
					)
				);

				$query->closeCursor();


					//header("Location:Article_read.php");

			} //if (((isset($_POST['LibArt'])) AND !empty($_POST['LibArt'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$NumArt = "";
	$DtCreA = "";
	$LibTitrA = "";
	$LibChapoA = "";
	$LibAccrochA = "";
	$Parag1A = "";
	$LibSsTitr1 = "";
	$Parag2A = "";
	$LibSsTitr2 = "";
	$Parag3A = "";
	$LibConclA = "";
	$UrlPhotA = "";
	$Likes = "";
	$NumAngl = "";
	$NumThem = "";
	$NumLang = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="Article_insert.php">

<!-- 			<div>
				<label>DtCreA</label>
				<input type="datatime" name="DtCreA"
				value="<?php if(isset($_GET['id']))echo $DtCreA?>">
			</div> -->

			<div>
				<label>LibTitrA</label>
				<input type="text" size='20' name="LibTitrA" id="LibTitrA">
			</div>

			<div>
				<label>LibChapoA</label>
				<input type="text" size='60' name="LibChapoA" id="LibChapoA">
			</div>

			<div>
				<label>LibAccrochA</label>
				<input type="text" size='60' name="LibAccrochA" id="LibAccrochA">
			</div>			

			<div>
				<label>Parag1A</label>
				<input type="text" name="Parag1A" id="Parag1A">
			</div>

			<div>
				<label>LibSsTitr1</label>
				<input type="text" size='60' name="LibSsTitr1" id="LibSsTitr1">
			</div>	

			<div>
				<label>Parag2A</label>
				<input type="text" size='60' name="Parag2A" id="Parag2A">
			</div>

			<div>
				<label>LibSsTitr2</label>
				<input type="text" size='60' name="LibSsTitr2" id="LibSsTitr2">
			</div>

			<div>
				<label>Parag3A</label>
				<input type="text" size='60' name="Parag3A" id="Parag3A">
			</div>

			<div>
				<label>LibConclA</label>
				<input type="text" size='60' name="LibConclA" id="LibConclA">
			</div>	

			<div>
				<label>UrlPhotA</label>
				<input type="text" size='62' maxlength="62" name="UrlPhotA" id="UrlPhotA">
			</div>

			<div>
				<label>Likes</label>
				<input type="number" size='60' max="10000000000" name="Likes" id="Likes">
			</div>

<!-- 		<div>
				<label>NumAngl</label>
				<input type="text" name="NumAngl" size='10' maxlength="8">
			</div>

			<div>
				<label>NumThem</label>
				<input type="text" name="NumThem" size='10' maxlength="8">
			</div>


			<div>
				<label>NumLang</label>
				<input type="text" name="NumLang" size='10' maxlength="8">
			</div>	 -->

		    <!-- Listbox Angle -->
	        <div>
		        <label for="LibTypAngl">	     
		                Angle :
		        </label>
		        <input type="hidden" id="idTypAngl" name="idTypAngl" value="<?php echo $NumAngl; ?>" />            
		        <select size="1" name="TypAngl" id="TypAngl"  class="form-control form-control-create" tabindex="30" >
				<?php 
			            $NumAngl = "";
			            $LibAngl = "";  

			            // 2. Preparation requete NON PREPAREE
			            // Récupération de l'occurrence pays à partir de l'id
			            $queryText = 'SELECT * FROM ANGLE;';

			            // 3. Lancement de la requete SQL
			            $result = $bdPdo->query($queryText);

			            // S'il y a bien un resultat
			            if ($result) {
			                // Parcours chaque ligne du resultat de requete
			                // Récupération du résultat de requête
			                    while ($tuple = $result->fetch()) {
			                        $ListNumAngl = $tuple["NumAngl"];
			                        $ListLibAngl = $tuple["LibAngl"];
				?>
	                    <option value="<?= $ListNumAngl; ?>" >
	                        <?php echo $ListLibAngl; ?>
	                    </option>
				<?php 
				                    } // End of while
				            }   // if ($result)
				?> 
		        </select>
	    	</div>
	    	<!-- FIN Listbox Angle -->


		    <!-- Listbox Theme -->
	        <div>
		        <label for="LibTypThem">	     
		                Thématique :
		        </label>
		        <input type="hidden" id="idTypThem" name="idTypThem" value="<?php echo $NumThem; ?>" />            
		        <select size="1" name="TypThem" id="TypThem"  class="form-control form-control-create" tabindex="30" >
				<?php 
			            $NumThem = "";
			            $LibThem = "";  

			            // 2. Preparation requete NON PREPAREE
			            // Récupération de l'occurrence pays à partir de l'id
			            $queryText = 'SELECT * FROM THEMATIQUE;';

			            // 3. Lancement de la requete SQL
			            $result = $bdPdo->query($queryText);

			            // S'il y a bien un resultat
			            if ($result) {
			                // Parcours chaque ligne du resultat de requete
			                // Récupération du résultat de requête
			                    while ($tuple = $result->fetch()) {
			                        $ListNumThem = $tuple["NumThem"];
			                        $ListLibThem = $tuple["LibThem"];
				?>
	                    <option value="<?= $ListNumThem; ?>" >
	                        <?php echo $ListLibThem; ?>
	                    </option>
				<?php 
				                    } // End of while
				            }   // if ($result)
				?> 
		        </select>
	    	</div>
	    	<!-- FIN Listbox Theme -->	


		    <!-- Listbox Theme -->
	        <div>
		        <label for="LibTypLang">	     
		                Langue :
		        </label>
		        <input type="hidden" id="idTypLang" name="idTypLang" value="<?php echo $NumLang; ?>" />            
		        <select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" tabindex="30" >
				<?php 
			            $NumLang = "";
			            $Lib1Lang = "";  

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
			                        $ListNumLang = $tuple["NumLang"];
			                        $ListLib1Lang = $tuple["Lib1Lang"];
				?>
	                    <option value="<?= $ListNumLang; ?>" >
	                        <?php echo $ListLib1Lang; ?>
	                    </option>
				<?php 
				                    } // End of while
				            }   // if ($result)
				?> 
		        </select>
	    	</div>
	    	<!-- FIN Listbox Theme -->


		    <!-- Listbox MoCle1 -->
	        <div>
		        <label for="LibTypMoCle1">	     
		                Mot Clé :
		        </label>
		        <input type="hidden" id="idTypMoCle1" name="idTypMoCle1" value="<?php echo $NumMoCle1; ?>" />            
		        <select size="1" name="TypMoCle1" id="TypLang"  class="form-control form-control-create" tabindex="30" >
				<?php 
			            $NumMoCle1 = "";
			            $LibMoCle1 = "";  

			            // 2. Preparation requete NON PREPAREE
			            // Récupération de l'occurrence pays à partir de l'id
			            $queryText = 'SELECT * FROM MOTCLE;';

			            // 3. Lancement de la requete SQL
			            $result = $bdPdo->query($queryText);

			            // S'il y a bien un resultat
			            if ($result) {
			                // Parcours chaque ligne du resultat de requete
			                // Récupération du résultat de requête
			                    while ($tuple = $result->fetch()) {
			                        $ListNumMoCle1 = $tuple["NumMoCle"];
			                        $ListLibMoCle1 = $tuple["LibMoCle"];
				?>
	                    <option value="<?= $ListNumMoCle1; ?>" >
	                        <?php echo $ListLibMoCle1; ?>
	                    </option>
				<?php 
				                    } // End of while
				            }   // if ($result)
				?> 
		        </select>
	    	</div>
	    	<!-- FIN Listbox MoCle1 -->


			<div>
				<input type="submit" name="Submit" value="Valider">
			</div>
	</form>

</body>
</html>


