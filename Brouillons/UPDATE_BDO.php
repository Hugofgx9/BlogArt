<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include '../includes/Connect_PDO.php';


	$nv_Lib1Lang = "";
	$nv_Lib2Lang = "joseph";
	$nv_NumPays = "";
	$NumLang = "PHIL";

	try {
		$bdPdo->beginTransaction();

		$query = $bdPdo->prepare('UPDATE LANGUE SET Lib2Lang = :nv_Lib2Lang WHERE NumLang = :NumLang');

		$query->execute(
			array(
				':NumLang' => $NumLang,
				':nv_Lib2Lang' => $nv_Lib2Lang
			)
		);

		$bdPdo->commit();

		echo 'La requete est effectuée';
	}

	catch (PDOExeception $e) {

		$bdPdo->rollBack();
	}

	$query->closeCursor();


	include '../includes/Disconnect_PDO.php';

?>