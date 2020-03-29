<?php

include 'Connect_PDO.php';

$Login = $_GET['id'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM USER WHERE Login = :Login');
		$query->execute(
			array(
				':Login' => $Login,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("location:../../deconnexion.php");
?>

