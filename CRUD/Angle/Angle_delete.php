<?php

include '../includes/Connect_PDO.php';

$NumAngl = $_GET['NumAngl'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM ANGLE WHERE NumAngl = :NumAngl');
		$query->execute(
			array(
				':NumAngl' => $NumAngl,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("Location:Angle_read.php");
?>