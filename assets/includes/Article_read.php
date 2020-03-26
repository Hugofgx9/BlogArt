<?php //liste Artment
		
	    $query = "SELECT * FROM ARTICLE ORDER BY NumArt ASC;";
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

		    	<th>Titre</th>
		    	<th>NumThem</th>
		    	<th>NumAngl</th>
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

				<td><?php echo $row['LibTitrA']; ?></td>
				<td><?php echo $row['NumThem']; ?></td>
				<td><?php echo $row['NumAngl']; ?></td>
				<td><?php echo $row['NumLang']; ?></td>
				<td><a href="CRUD/Article/Article_edit.php?id=<?php echo $row['NumArt'] ?>">Modifier</a></td>
				<td><a href="CRUD/Article/Article_delete.php?NumArt=<?php echo $row['NumArt'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucun Article enregistré.";
	}
?>