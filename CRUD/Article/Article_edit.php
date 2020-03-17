<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
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
$NumArt = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumArt = $_GET['id'];

	$queryText = 'SELECT * FROM ARTICLE WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$DtCreA = $object->DtCreA;
		$LibTitrA = $object->LibTitrA;
		$LibChapoA = $object->LibChapoA;
		$LibAccrochA = $object->LibAccrochA;
		$Parag1A = $object->Parag1A;
		$LibSsTitr1 = $object->LibSsTitr1;
		$Parag2A = $object->Parag2A;
		$LibSsTitr2 = $object->LibSsTitr2;
		$Parag3A = $object->Parag3A;
		$LibConclA = $object->LibConclA;
		$UrlPhotA = $object->UrlPhotA;
		$Likes = $object->Likes;
		$NumAngl = $object->NumAngl;
		$NumThem = $object->NumThem;
		$NumLang = $object->NumLang;

	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['DtCreA'])) AND !empty($_POST['DtCreA']))
			AND ((isset($_POST['LibTitrA'])) AND !empty($_POST['LibTitrA']))
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
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_DtCreA = (ctrlSaisies($_POST["DtCreA"]));
			$nv_LibTitrA = (ctrlSaisies($_POST["LibTitrA"]));
			$nv_LibChapoA = (ctrlSaisies($_POST["LibChapoA"]));
			$nv_LibAccrochA = (ctrlSaisies($_POST["LibAccrochA"]));
			$nv_Parag1A = (ctrlSaisies($_POST["Parag1A"]));
			$nv_LibSsTitr1 = (ctrlSaisies($_POST["LibSsTitr1"]));
			$nv_Parag2A = (ctrlSaisies($_POST["Parag2A"]));
			$nv_LibSsTitr2 = (ctrlSaisies($_POST["LibSsTitr2"]));
			$nv_Parag3A = (ctrlSaisies($_POST["Parag3A"]));
			$nv_LibConclA = (ctrlSaisies($_POST["LibConclA"]));
			$nv_UrlPhotA = (ctrlSaisies($_POST["UrlPhotA"]));
			$nv_Likes = (ctrlSaisies($_POST["Likes"]));
			$nv_NumAngl = (ctrlSaisies($_POST["TypAngl"]));
			$nv_NumThem = (ctrlSaisies($_POST["TypThem"]));
			$nv_NumLang = (ctrlSaisies($_POST["TypLang"]));
			$NumArt = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE ARTICLE SET DtCreA = :nv_DtCreA, LibTitrA = :nv_LibTitrA, LibChapoA = :nv_LibChapoA, LibAccrochA = :nv_LibAccrochA, Parag1A = :nv_Parag1A, LibSsTitr1 = :nv_LibSsTitr1, Parag2A = :nv_Parag2A, LibSsTitr2 = :nv_LibSsTitr2, Parag3A = :nv_Parag3A, LibConclA = :nv_LibConclA, UrlPhotA = :nv_UrlPhotA, NumAngl = :nv_NumAngl, NumThem = :nv_NumThem, NumLang = :nv_NumLang WHERE NumArt = :NumArt');

			$query->execute(
				array(
					':nv_DtCreA' => $nv_DtCreA,
					':nv_LibTitrA' => $nv_LibTitrA,
					':nv_LibChapoA' => $nv_LibChapoA,
					':nv_LibAccrochA' => $nv_LibAccrochA,
					':nv_Parag1A' => $nv_Parag1A,
					':nv_LibSsTitr1' => $nv_LibSsTitr1,
					':nv_Parag2A' => $nv_Parag2A,
					':nv_LibSsTitr2' => $nv_LibSsTitr2,
					':nv_Parag3A' => $nv_Parag3A,
					':nv_LibConclA' => $nv_LibConclA,
					':nv_UrlPhotA' => $nv_UrlPhotA,
					':nv_NumAngl' => $nv_NumAngl,
					':nv_NumThem' => $nv_NumThem,
					':nv_NumLang' => $nv_NumLang,
					':NumArt' => $NumArt
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Article_read.php");

		} //if (((isset($_POST['Parag1A'])) AND !empty($_POST['Parag1A'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumArt ?> </h2>

	<form method="POST" action="Article_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>DtCreA</label>
				<input type="datatime" name="DtCreA"
				value="<?php if(isset($_GET['id']))echo $DtCreA?>">
			</div>

			<div>
				<label>LibTitrA</label>
				<input type="text" size='20' name="LibTitrA" id="LibTitrA"
				value="<?php if(isset($_GET['id']))echo $LibTitrA?>">
			</div>

			<div>
				<label>LibChapoA</label>
				<input type="text" size='60' name="LibChapoA" id="LibChapoA"
				value="<?php if(isset($_GET['id']))echo $LibChapoA?>">
			</div>

			<div>
				<label>LibAccrochA</label>
				<input type="text" size='60' name="LibAccrochA" id="LibAccrochA"
				value="<?php if(isset($_GET['id']))echo $LibAccrochA?>">
			</div>			

			<div>
				<label>Parag1A</label>
				<input type="text" name="Parag1A" id="Parag1A"
				value="<?php if(isset($_GET['id']))echo $Parag1A?>">
			</div>

			<div>
				<label>LibSsTitr1</label>
				<input type="text" size='60' name="LibSsTitr1" id="LibSsTitr1"
				value="<?php if(isset($_GET['id']))echo $LibSsTitr1?>">
			</div>	

			<div>
				<label>Parag2A</label>
				<input type="text" size='60' name="Parag2A" id="Parag2A"
				value="<?php if(isset($_GET['id']))echo $Parag2A?>">
			</div>

			<div>
				<label>LibSsTitr2</label>
				<input type="text" size='60' name="LibSsTitr2" id="LibSsTitr2"
				value="<?php if(isset($_GET['id']))echo $LibSsTitr2?>">
			</div>

			<div>
				<label>Parag3A</label>
				<input type="text" size='60' name="Parag3A" id="Parag3A"
				value="<?php if(isset($_GET['id']))echo $Parag3A?>">
			</div>

			<div>
				<label>LibConclA</label>
				<input type="text" size='60' name="LibConclA" id="LibConclA"
				value="<?php if(isset($_GET['id']))echo $LibConclA?>">
			</div>	

			<div>
				<label>UrlPhotA</label>
				<input type="text" size='62' maxlength="62" name="UrlPhotA" id="UrlPhotA"
				value="<?php if(isset($_GET['id']))echo $UrlPhotA?>">
			</div>

			<div>
				<label>Likes</label>
				<input type="number" size='60' max="10000000000" name="Likes" id="Likes"
				value="<?php if(isset($_GET['id']))echo $Likes?>">
			</div>

<!-- 			<div>
				<label>NumAngl</label>
				<input type="text" name="NumAngl" size='10' maxlength="8" 
				value="<?php if(isset($_GET['id']))echo $NumAngl?>">
			</div>

			<div>
				<label>NumThem</label>
				<input type="text" name="NumThem" size='10' maxlength="8" 
				value="<?php if(isset($_GET['id']))echo $NumThem?>">
			</div>		


			<div>
				<label>NumLang</label>
				<input type="text" name="NumLang" size='10' maxlength="8" 
				value="<?php if(isset($_GET['id']))echo $NumLang?>">
			</div> -->

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

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>

</body>
</html>