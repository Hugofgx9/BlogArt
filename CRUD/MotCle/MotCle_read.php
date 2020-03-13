<?php //liste MOTCLEs

		include '../includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM MOTCLE ORDER BY NumMoCle ASC;";
	    try {
	      $bdPdo_select = $bdPdo->prepare($query);
	      $bdPdo_select->execute(); // recup toutes les infos nécéssaires
	      $NbreData = $bdPdo_select->rowCount(); // nombre d'enregistrements
	      $rowAll = $bdPdo_select->fetchAll();
	    }
	    catch (PDOException $e) {
	      echo 'Erreur SQL : '. $e->getMessage().'<br/>';
	      die();
	    }

	    if ($NbreData != 0) {
?>

<?php include '../includes/Head.php'; ?>

<body>
	<table border="1">
		<thead>
		  <tr>
		      <th>NumMoCle</th>
		      <th>LibMoCle</th>
		      <th>NumLang</th>
		      <th>Modifier</th>
		      <th>Supprimer</th>
		  </tr>
		</thead>
		<tbody>

		<?php
		  foreach ($rowAll as $row) { // pour chaque ligne
		?>

			<tr>
			  <td><?php echo $row['NumMoCle']; ?></td>
			  <td><?php echo $row['LibMoCle']; ?></td>
			  <td><?php echo $row['NumLang']; ?></td>
			  <td><a href="MotCle_edit.php?id=<?php echo $row['NumMoCle'] ?>">Modifier</a></td>
			  <td><a href="MotCle_delete.php?NumMoCle=<?php echo $row['NumMoCle'] ?>">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucun mot clé enregistré.";
	}
	?>

	<a href="MotCle_insert.php">Créer un nouveau mot clé</a>

</body>
</html>