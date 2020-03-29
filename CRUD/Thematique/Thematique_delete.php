<?php

include '../includes/Connect_PDO.php';

$NumThem = $_GET['NumThem'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM THEMATIQUE WHERE NumThem = :NumThem');
		$query->execute(
			array(
				':NumThem' => $NumThem,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("location:".  $_SERVER['HTTP_REFERER']);;
?>