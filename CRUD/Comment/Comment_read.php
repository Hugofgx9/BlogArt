<?php //liste Comment

		include '../includes/Connect_PDO.php';
		
	    $query = "SELECT * FROM COMMENT ORDER BY NumCom ASC;";
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
		      <th>NumCom</th>
		      <th>DtCreC</th>
		      <th>PseudoAuteur</th>
		      <th>EmailAuteur</th>
		      <th>TitrCom</th>
		      <th>LibCom</th>
		      <th>NumArt</th>
		      <th>Modifier</th>
		      <th>Supprimer</th>
		  </tr>
		</thead>
		<tbody>

		<?php
		  foreach ($rowAll as $row) { // pour chaque ligne
		?>

			<tr>
			  <td><?php echo $row['NumCom']; ?></td>
			  <td><?php echo $row['DtCreC']; ?></td>
			  <td><?php echo $row['PseudoAuteur']; ?></td>
			  <td><?php echo $row['EmailAuteur']; ?></td>
			  <td><?php echo $row['TitrCom']; ?></td>
			  <td><?php echo $row['LibCom']; ?></td>
			  <td><?php echo $row['NumArt']; ?></td>
			  <td><a href="Comment_edit.php?id=<?php echo $row['NumCom'] ?>">Modifier</a></td>
			  <td><a href="Comment_delete.php?NumCom=<?php echo $row['NumCom'] ?>">Supprimer</a></td>
			</tr>

		<?php
		  }
		?>

		</tbody>
	</table>

	<?php
	}
	else {
	  echo "Il n'y a aucun Come enregistré.";
	}
	?>

	<a href="Comment_insert.php">Créer un nouveau commentaire</a>

</body>
</html>