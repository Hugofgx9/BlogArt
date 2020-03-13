<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibThem = "";
$NumLang = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumThem = $_GET['id'];

	$queryText = 'SELECT * FROM THEMATIQUE WHERE NumThem = :NumThem;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumThem' => $NumThem
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibThem = $object->LibThem;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
			AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_LibThem = (ctrlSaisies($_POST["LibThem"]));
			$nv_NumLang = (ctrlSaisies($_POST["TypLang"]));
			$NumThem = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE THEMATIQUE SET LibThem = :nv_LibThem, NumLang = :nv_NumLang WHERE NumThem = :NumThem');

			$query->execute(
				array(
					':nv_LibThem' => $nv_LibThem,
					':nv_NumLang' => $nv_NumLang,
					':NumThem' => $NumThem
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Thematique_read.php");

		} //if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumThem ?> </h2>

	<form method="POST" action="Thematique_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>LibTheme</label>
				<input type="text" name="LibThem" id="LibThem" size="60" maxlength="60" 
				value="<?php if(isset($_GET['id']))echo $LibThem?>">
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
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>

</body>
</html>