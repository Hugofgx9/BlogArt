<?php

include '../includes/Connect_PDO.php';

$Login = $_GET['Login'];

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
		header("Location:User_read.php");
?>