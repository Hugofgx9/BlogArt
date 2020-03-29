<?php

include '../includes/Connect_PDO.php';

$NumArt = $_GET['NumArt'];

try {
		$bdPdo->beginTransaction();

				$query = $bdPdo->prepare('DELETE FROM MOTCLEARTICLE WHERE NumArt = :NumArt');
		$query->execute(
			array(
				':NumArt' => $NumArt, 
			)
		);

		
		$query = $bdPdo->prepare('DELETE FROM ARTICLE WHERE NumArt = :NumArt');
		$query->execute(
			array(
				':NumArt' => $NumArt,
			)
		);

		$bdPdo->commit();
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("location:".  $_SERVER['HTTP_REFERER']);
?>