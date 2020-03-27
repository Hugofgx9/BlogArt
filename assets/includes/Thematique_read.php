<?php //liste langues

		include './assets/includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM THEMATIQUE ORDER BY NumThem ASC;";
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
		      <th>NumThem</th>
		      <th>LibThem</th>
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
			  <td><?php echo $row['NumThem']; ?></td>
			  <td><?php echo $row['LibThem']; ?></td>
			  <td><?php echo $row['NumLang']; ?></td>
			  <td><a href="./assets/includes/Thematique_edit.php?id=<?php echo $row['NumThem'] ?>">Modifier</a></td>
			  <td><a href="./assets/includes/Thematique_delete.php?NumThem=<?php echo $row['NumThem'] ?>">Supprimer</a></td>
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

	<a href="Thematique_insert.php">Créer un nouveau mot-clé</a>