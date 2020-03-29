<?php

include 'ctrlSaisies.php';
include 'Connect_PDO.php';

//init les variables



if (isset($_SESSION['Login']) AND  $_SESSION['Login']) {

	$Login = $_SESSION['Login'];

	$queryText = 'SELECT * FROM USER WHERE Login = :Login;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':Login' => $Login
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$EMail = $object->EMail;
		$FirstName = $object->FirstName;
		$LastName = $object->LastName;

	}

}

?>


<h2> Mes Informations:  </h2>

			<p><b>Prénom : </b><?php echo $FirstName; ?></p>
			<p><b>Nom : </b><?php echo $LastName; ?></p>
			<p><b>Email : </b><?php echo $EMail; ?></p>



	
