<?php //liste Comment

		include '../includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM USER ORDER BY Login ASC;";
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
		      <th>Login</th>
		      <th>Pass</th>
		      <th>LastName</th>
		      <th>FirstName</th>
		      <th>EMail</th>
		      <th>admin</th>
		      <th>Modifier</th>
		      <th>Supprimer</th>
		  </tr>
		</thead>
		<tbody>

		<?php
		  foreach ($rowAll as $row) { // pour chaque ligne
		?>

			<tr>
			  <td><?php echo $row['Login']; ?></td>
			  <td><?php echo $row['Pass']; ?></td>
			  <td><?php echo $row['LastName']; ?></td>
			  <td><?php echo $row['FirstName']; ?></td>
			  <td><?php echo $row['EMail']; ?></td>
			  <td><?php echo $row['admin']; ?></td>
			  <td><a href="User_edit.php?id=<?php echo $row['Login'] ?>">Modifier</a></td>
			  <td><a href="User_delete.php?Login=<?php echo $row['Login'] ?>">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucun user enregistré.";
	}
	?>

	<a href="User_insert.php">Créer un nouveau User</a>

</body>
</html>