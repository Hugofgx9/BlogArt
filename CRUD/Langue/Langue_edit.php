<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables
$Lib1Lang = "";
$Lib2Lang = "";
$NumPays = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumLang = $_GET['id'];

	$queryText = 'SELECT * FROM LANGUE WHERE NumLang = :NumLang;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumLang' => $NumLang
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$Lib1Lang = $object->Lib1Lang;
		$Lib2Lang = $object->Lib2Lang;
		$NumPays = $object->NumPays;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
			AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
			$nv_Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
			$nv_NumPays = (ctrlSaisies($_POST["TypPays"]));
			$NumLang = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE LANGUE SET Lib1Lang = :nv_Lib1Lang, Lib2Lang = :nv_Lib2Lang, NumPays = :nv_NumPays WHERE NumLang = :NumLang');

			$query->execute(
				array(
					':nv_Lib1Lang' => $nv_Lib1Lang,
					':nv_Lib2Lang' => $nv_Lib2Lang,
					':nv_NumPays' => $nv_NumPays,
					':NumLang' => $NumLang
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:Langue_read.php");

		} //if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php $NumLang ?> </h2>

	<form method="POST" action="Langue_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>Libellé court</label>
				<input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25" 
				value="<?php if(isset($_GET['id']))echo $Lib1Lang?>">
			</div>

			<div>
				<label>Libellé long</label>
				<input type="text" name="Lib2Lang" id="Lib2Lang" size="40" maxlength="40" 
				value="<?php if(isset($_GET['id']))echo $Lib2Lang?>">
			</div>

					    <!-- Listbox Pays -->
	        <div>
		        <label for="LibTypPays">	     
		                Quel pays :
		        </label>
		        <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumPays; ?>" />            
		        <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
				<?php
			            $frPays = "";  

			            // 2. Preparation requete NON PREPAREE
			            // Récupération de l'occurrence pays à partir de l'id
			            $queryText = 'SELECT * FROM PAYS;';

			            // 3. Lancement de la requete SQL
			            $result = $bdPdo->query($queryText);

			            // S'il y a bien un resultat
			            if ($result) {
			                // Parcours chaque ligne du resultat de requete
			                // Récupération du résultat de requête
			                    while ($tuple = $result->fetch()) {
			                        $ListnumPays = $tuple["numPays"];
			                        $ListfrPays = $tuple["frPays"];
				?>    
	                    <option value="<?= $ListnumPays; ?>" >
	                        <?php echo $ListfrPays; ?>
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