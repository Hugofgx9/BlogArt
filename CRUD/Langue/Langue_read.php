<?php //liste langues

		include '../includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM LANGUE ORDER BY NumLang ASC;";
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
		      <th>NumLang</th>
		      <th>Lib1Lang</th>
		      <th>Lib2Lang</th>
		      <th>NumPays</th>
		      <th>Modifier</th>
		      <th>Supprimer</th>
		  </tr>
		</thead>
		<tbody>

		<?php
		  foreach ($rowAll as $row) { // pour chaque ligne
		?>

			<tr>
			  <td><?php echo $row['NumLang']; ?></td>
			  <td><?php echo $row['Lib1Lang']; ?></td>
			  <td><?php echo $row['Lib2Lang']; ?></td>
			  <td><?php echo $row['NumPays']; ?></td>
			  <td><a href="Langue_edit.php?id=<?php echo $row['NumLang'] ?>">Modifier</a></td>
			  <td><a href="Langue_delete.php?NumLang=<?php echo $row['NumLang'] ?>">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucune langue enregistrée.";
	}
	?>

	<a href="Langue_insert.php">Créer une nouvelle Langue</a>

</body>
</html>