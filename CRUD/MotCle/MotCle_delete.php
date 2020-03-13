<?php

include '../includes/Connect_PDO.php';

$NumMoCle = $_GET['NumMoCle'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM MOTCLE WHERE NumMoCle = :NumMoCle');
		$query->execute(
			array(
				':NumMoCle' => $NumMoCle,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("Location:MotCle_read.php");
?>