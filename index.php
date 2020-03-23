<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/style.css">
</head>

<body>

	<nav>
<!-- 		<a><img src="assets/png/logo.png"></a> -->
	</nav>



	<div class="container"> <!-- Corps de la page -->

		<div> 
			<h2>Article les plus populaires</h2>
			<div>
				<?php //liste les plus populaires

					include './CRUD/includes/Connect_PDO.php';
					
				    $query = "SELECT * FROM ARTICLE ORDER BY Likes DESC;";
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

				    if ($NbreData > 2) {

						for ($i = 0; $i <= 2; $i++) {
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='" .$rowAll[$i]['UrlPhotA'] ."'></a>";
						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $row['NumArt'] ."'><img src='" .$row['UrlPhotA'] ."'></a>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré.";
					}
				?>
			</div>
			<a href="">Voir tout</a>
		</div>

		<div>
			<h2>Evenements</h2>
			<div>
				<?php //liste 3 évenements

					include './CRUD/includes/Connect_PDO.php';
					
				    $query = "SELECT * FROM ARTICLE WHERE NumThem = 'THE0106'";
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

				    if ($NbreData > 2) {

						for ($i = 0; $i <= 2; $i++) {
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='" .$rowAll[$i]['UrlPhotA'] ."'></a>";
						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $row['NumArt'] ."'><img src='" .$row['UrlPhotA'] ."'></a>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré dans événements.";
					}
				?>
			</div>
			<a href="">Voir tout</a>
		</div>

		<div>
			<h2>Portraits</h2>
			<div>
				<?php //liste 3 évenements

					include './CRUD/includes/Connect_PDO.php';
					
				    $query = "SELECT * FROM ARTICLE WHERE NumThem = 'THE0107'";
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

				    if ($NbreData > 2) {

						for ($i = 0; $i <= 2; $i++) {
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='" .$rowAll[$i]['UrlPhotA'] ."'></a>";					
						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "<a href='CRUD/Article/Article_show.php?id=" . $row['NumArt'] ."'><img src='" .$row['UrlPhotA'] ."'></a>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré dans portrait.";
					}
				?>
			</div>
			<a href="">Voir tout</a>
		</div>
	</div>

</body>