<?php //liste angles

		include '../includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM ANGLE ORDER BY NumAngl ASC;";
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
	<table>
		<thead>
		  <tr>
		      <th>NumAngl</th>
		      <th>LibAngl</th>
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
			  <td><?php echo $row['NumAngl']; ?></td>
			  <td><?php echo $row['LibAngl']; ?></td>
			  <td><?php echo $row['NumLang']; ?></td>
			  <td><a href="Angle_edit.php?id=<?php echo $row['NumAngl'] ?>">Modifier</a></td>
			  <td><a href="Angle_delete.php?NumAngl=<?php echo $row['NumAngl'] ?>">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucun angle enregistré.";
	}
	?>

	<a href="Angle_insert.php">Créer un nouvel angle</a>

</body>
</html>