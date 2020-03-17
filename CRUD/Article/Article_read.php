<?php //liste Artment

		include '../includes/Connect_PDO.php';
		
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

<?php include '../includes/Head.php'; ?>

<body>
	<table border="1">
		<thead>
		  <tr>
		      <th>NumArt</th>
		      <th>DtCreA</th>
		      <th>LibTitrA</th>
		      <th>LibChapoA</th>
		      <th>LibAccrochA</th>
		      <th>Parag1A</th>
		      <th>LibSsTitr1</th>
		      <th>Parag2A</th>
		      <th>LibSsTitr2</th>
		      <th>Parag3A</th>
		      <th>LibConclA</th>
		      <th>UrlPhotA</th>
		      <th>Likes</th>
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
			  <td><?php echo $row['NumArt']; ?></td>
			  <td><?php echo $row['DtCreA']; ?></td>
			  <td><?php echo $row['LibTitrA']; ?></td>
			  <td><?php echo $row['LibChapoA']; ?></td>
			  <td><?php echo $row['LibAccrochA']; ?></td>
			  <td><?php echo substr($row['Parag1A'], 0, 100) . "..."; ?></td>
			  <td><?php echo $row['LibSsTitr1']; ?></td>
			  <td><?php echo substr($row['Parag2A'], 0, 100) . "..."; ?></td>
			  <td><?php echo $row['LibSsTitr2']; ?></td>
			  <td><?php echo substr($row['Parag3A'], 0, 100) . "..."; ?></td>
			  <td><?php echo substr($row['LibConclA'], 0, 100) . "..."; ?></td>
			  <td><?php echo $row['UrlPhotA']; ?></td>
			  <td><?php echo $row['Likes']; ?></td>
			  <td><?php echo $row['NumThem']; ?></td>
			  <td><?php echo $row['NumAngl']; ?></td>
			  <td><?php echo $row['NumLang']; ?></td>
			  <td><a href="Article_edit.php?id=<?php echo $row['NumArt'] ?>">Modifier</a></td>
			  <td><a href="Article_delete.php?NumArt=<?php echo $row['NumArt'] ?>">Supprimer</a></td>
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

	<a href="Article_insert.php">Créer un nouvel article</a>

</body>
</html>