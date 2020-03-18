<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$LibMoCle = "";
$NumLang = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumMoCle = $_GET['id'];

	$queryText = 'SELECT * FROM MOTCLE WHERE NumMoCle = :NumMoCle;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumMoCle' => $NumMoCle
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibMoCle = $object->LibMoCle;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle']))
			AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
			$nv_NumLang = (ctrlSaisies($_POST["TypLang"]));
			$NumMoCle = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE MOTCLE SET LibMoCle = :nv_LibMoCle, NumLang = :nv_NumLang WHERE NumMoCle = :NumMoCle');

			$query->execute(
				array(
					':nv_LibMoCle' => $nv_LibMoCle,
					':nv_NumLang' => $nv_NumLang,
					':NumMoCle' => $NumMoCle
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:MotCle_read.php");

		} //if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumMoCle ?> </h2>

	<form method="POST" action="MotCle_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>Libellé MotCle</label>
				<input type="text" name="LibMoCle" id="LibMoCle" size="30" maxlength="30" 
				value="<?php if(isset($_GET['id']))echo $LibMoCle?>">
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
                    <option <?php if ($ListnumLang == $NumLang_get)echo "selected='selected'"?> value="<?= $ListnumLang; ?>" >
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