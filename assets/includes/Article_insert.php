<?php  
	
include 'ctrlSaisies.php';
include 'Connect_PDO.php';

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
			//AND ((isset($_POST['UrlPhotA'])) AND !empty($_POST['UrlPhotA']))
			//AND ((isset($_POST['Likes'])) AND !empty($_POST['Likes']))
			//AND ((isset($_POST['NumAngl'])) AND !empty($_POST['NumAngl']))
			//AND ((isset($_POST['NumThem'])) AND !empty($_POST['NumThem']))
			AND ((isset($_POST['MotClePOST'])) AND !empty($_POST['MotClePOST']))
			AND (!empty($_FILES['UrlPhotA']['size']))
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
			//$UrlPhotA = (ctrlSaisies($_POST["UrlPhotA"]));
			$Likes = 0;
			$NumAngl = (ctrlSaisies($_POST["TypAngl"]));
			$NumThem = (ctrlSaisies($_POST["TypThem"]));
			$NumLang = (ctrlSaisies($_POST["TypLang"]));

			$ListLibMoCle = explode (" ", $_POST["MotClePOST"]);

			//$NumMoCle = (ctrlSaisies($_POST["TypMoCle1"]));



		    //Vérification de l'UrlPhotA :

	        //On définit les variables :
	        $i = 0;
	        $UrlPhotA_erreur="";
	        $maxsize = 10000000; //Poid de l'image
	        $maxwidth = 1000000; //Largeur de l'image
	        $maxheight = 1000000; //Longueur de l'image
	        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
	        $image_sizes = getimagesize($_FILES['UrlPhotA']['tmp_name']);
	        $extension_upload = strtolower(substr(  strrchr($_FILES['UrlPhotA']['name'], '.')  ,1));
	        
	        if ($_FILES['UrlPhotA']['error'] > 0)
	        {
	                $UrlPhotA_erreur = "Erreur lors du transfert de la Photo : ";
	        }
	        elseif ($_FILES['UrlPhotA']['size'] > $maxsize)
	        {
	                $i++;
	                $UrlPhotA_erreur = "Le fichier est trop gros : (<strong>".$_FILES['UrlPhotA']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
	        }
	        elseif ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
	        {
	                $i++;
	                $UrlPhotA_erreur = "Image trop large ou trop longue : 
	                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
	        }
	        elseif (!in_array($extension_upload,$extensions_valides))
	        {
	                $i++;
	                $UrlPhotA_erreur = "Extension de l'UrlPhotA incorrecte";
	        }


	        if ($i != 0) {

	        	echo $UrlPhotA_erreur;
	        }
	        else {
	        	//D'abord on ajoute le fichiers de notre PHotA
	        	function move_PhotA($UrlPhotA)
				{
				    $extension_upload = strtolower(substr(  strrchr($UrlPhotA['name'], '.')  ,1));
				    $name = time();
				    $nomUrlPhotA = str_replace(' ','',$name).".".$extension_upload;
				    $name = "./assets/image_article/".str_replace(' ','',$name).".".$extension_upload;
				    move_uploaded_file($UrlPhotA['tmp_name'],$name);
				    return $nomUrlPhotA;
				}

				$nomUrlPhotA=(!empty($_FILES['UrlPhotA']['size']))?move_PhotA($_FILES['UrlPhotA']):'';

	        	//Puis la requete sql
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
						':UrlPhotA' => $nomUrlPhotA,
						':Likes' => $Likes,
						':NumAngl' => $NumAngl,
						':NumThem' => $NumThem,
						':NumLang' => $NumLang
					) //array
				); //$query->execute

				$query->closeCursor();


				foreach ($ListLibMoCle as $LibMoCle) {
					$LibMoCle = ucfirst((ctrlSaisies($LibMoCle)));

					$query = "SELECT * FROM MOTCLE WHERE LibMoCle = '$LibMoCle'";

			    	$bdPdo_select = $bdPdo->prepare($query);
			    	$bdPdo_select->execute(
			      		array(
  							':NumArt' => $NumArt,	
		      		)); // recup toutes les infos nécéssaires
			    	$NbreData = $bdPdo_select->rowCount(); // nombre d'enregistrements
			    	$rowAll = $bdPdo_select->fetchAll();

					if($NbreData == 0){//Le mot clé n'existe pas dans MOTCLE donc on l'insert

				      // Découpage FK LANGUE 
				        $LibLangSelect = substr($NumLang, 0, 4); 
				        $parmNumLang = $LibLangSelect . '%';

				        $requete = "SELECT MAX(NumLang) AS NumLang FROM MOTCLE WHERE NumLang LIKE '$parmNumLang';";
				        $result1 = $bdPdo->query($requete);


				        if ($result1) {
				            $tuple = $result1->fetch();
				            $NumLang = $tuple["NumLang"];
				            if (is_null($NumLang)) {    // New lang dans MOCLE
				                // Récup dernière PK utilisée
				                $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE;";
				                $result1 = $bdPdo->query($requete);
				                $tuple = $result1->fetch();
				                $NumMoCle = $tuple["NumMoCle"];

				                $NumMoCleSelect = (int)substr($NumMoCle, 4, 2);
				                // No séquence suivant LANGUE
				                $numSeq1MoCle = $NumMoCleSelect + 1;
				                // Init no séquence MOCLE pour nouvelle lang
				                $numSeq2MoCle = 1;
				            }
				            else {
				                // Récup dernière PK pour FK sélectionnée
				                $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE WHERE NumLang LIKE '$parmNumLang' ;";
				                $result1 = $bdPdo->query($requete);
				                $tuple = $result1->fetch();
				                $NumMoCle = $tuple["NumMoCle"];

				                // No séquence actuel LANGUE
				                $numSeq1MoCle = (int)substr($NumMoCle, 4, 2);
				                // No séquence actuel MOCLE
				                $numSeq2MoCle = (int)substr($NumMoCle, 6, 2); 
				                // No séquence suivant MOCLE
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
				            // PK reconstituée : MOCL + no seq langue + no seq mo clé
				            if ($numSeq2MoCle < 10) {
				                $NumMoCle = $NumMoCle . "0" . $numSeq2MoCle;
				            }
				            else {
				                $NumMoCle = $NumMoCle . $numSeq2MoCle;
				            }
				        }   // End of if ($result) / no seq LANGUE


						$query = $bdPdo->prepare('INSERT INTO MOTCLE (NumMoCle, LibMoCle, NumLang) VALUES (:NumMoCle, :LibMoCle, :NumLang);');

						$query->execute(
							array(
								':NumMoCle' => $NumMoCle,
								':LibMoCle' => $LibMoCle,
								':NumLang' => $NumLang
							) //array
						); //$query->execute						
					}
		
					
					else {//Le mot clé existe, on récupère NumMoCle

						$NumMoCle = $rowAll[0]['NumMoCle'];

					}

					$query = $bdPdo->prepare('INSERT INTO MOTCLEARTICLE (NumArt, NumMoCle) VALUES (:NumArt, :NumMoCle);');

					$query->execute(
						array(
							':NumArt' => $NumArt,
							':NumMoCle' => $NumMoCle
						)
					);

					$query->closeCursor();

						//header("Location:Article_read.php");
				}
			}
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

<form method="POST" action="admin.php" enctype="multipart/form-data">

<!-- 			<div>
			<label>DtCreA</label>
			<input type="datatime" name="DtCreA"
			value="<?php if(isset($_GET['id']))echo $DtCreA?>">
		</div> -->

		<div>
			<label>Titre :</label>
			<input type="text" size='20' name="LibTitrA" id="LibTitrA">
		</div>

		<div>
			<label>Chapeau :</label>
			<textarea type="text" rows="4" name="LibChapoA" id="LibChapoA"></textarea>
		</div>

		<div>
			<label>Accroche :</label>
			<textarea type="text" rows="4" name="LibAccrochA" id="LibAccrochA"></textarea>
		</div>			

		<div>
			<label>Paragraphe 1 :</label>
			<textarea type="text" rows="10" name="Parag1A" id="Parag1A"></textarea>
		</div>

		<div>
			<label>Sous-titre 1 :</label>
			<input type="text" size='60' name="LibSsTitr1" id="LibSsTitr1">
		</div>	

		<div>
			<label>Paragraphe 2 :</label>
			<textarea type="text" rows="10" name="Parag2A" id="Parag2A"></textarea>
		</div>

		<div>
			<label>Sous-titre 2 :</label>
			<input type="text" size='60' name="LibSsTitr2" id="LibSsTitr2">
		</div>

		<div>
			<label>Paragraphe 3 :</label>
			<textarea type="text" rows="10" name="Parag3A" id="Parag3A"></textarea>
		</div>

		<div>
			<label>Conclusion :</label>
			<textarea type="text" rows='6' name="LibConclA" id="LibConclA"></textarea>
		</div>	

		<div>
			<label for="UrlPhotA">Choisissez votre photo :</label><input type="file" name="UrlPhotA" id="UrlPhotA" />(Taille max : 10 Mo)
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
        <div class="customselect">
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
        <div class="customselect">
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
        <div class="customselect">
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
<!--         <div class="customselect">
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
    	</div> -->
    	<!-- FIN Listbox MoCle1 -->

		<div>
			<label>Mot Clé :</label>
			<input placeholder="Séparer les mots clés par un espace"type="text" name="MotClePOST">
		</div>	


		<div>
			<input class="bouton" type="submit" name="Submit" value="Valider">
		</div>
</form>

