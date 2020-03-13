<?php

include './includes/Connect_PDO.php';

$NumLang = $_GET['NumLang'];

try {
		$bdPdo->beginTransaction();
		$query = $bdPdo->prepare('DELETE FROM LANGUE WHERE NumLang = :NumLang');
		$query->execute(
			array(
				':NumLang' => $NumLang,
			)
		);

		$bdPdo->commit();
		echo "La langue <i>" . $NumLang . "</i> a bien été supprimée";
		echo "<br/>";
	}

	catch (PDOExeception $e) {
		$bdPDO->rollBack();
	}

	$query->closeCursor();
		header("Location:ReadLangue.php");
?>