<?php //liste angles

		include './assets/includes/Connect_PDO.php';
		
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

	<table>
		<thead>
		  <tr>
		      <th>Angle</th>
		      <th>Modifier</th>
		      <th>Supprimer</th>
		  </tr>
		</thead>
		<tbody>

		<?php
		  foreach ($rowAll as $row) { // pour chaque ligne
		?>

			<tr>
			  <td><?php echo $row['LibAngl']; ?></td>
			  <td><a href="./CRUD/Angle/Angle_edit.php?id=<?php echo $row['NumAngl'] ?>">Modifier</a></td>
			  <td><a href="./CRUD/Angle/Angle_delete.php?NumAngl=<?php echo $row['NumAngl'] ?>">Supprimer</a></td>
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

	<a href="./CRUD/Angle/Angle_insert.php">Créer un nouvel angle</a>