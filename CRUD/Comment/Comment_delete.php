<?php

include '../includes/Connect_PDO.php';

$NumCom = $_GET['NumCom'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM COMMENT WHERE NumCom = :NumCom');
		$query->execute(
			array(
				':NumCom' => $NumCom,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("Location:Comment_read.php");
?>