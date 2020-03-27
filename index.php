<?php
session_start();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

	<nav><!-- 		<a><img src="assets/png/logo.png"></a> -->
	</nav>

	<div class="head"> <!-- Corps de la page -->

		<a><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

		<input class="search" type="input" name="search">

		<div class="user"><?php //Le boutton user
		include './assets/includes/user_link.php';
		?>
		</div>

	</div>
	<div class="container">

		<div id="last_art">
		    <?php //liste les plus populaires

				include './CRUD/includes/Connect_PDO.php';
				
			    $query = "SELECT * FROM ARTICLE ORDER BY DtCreA DESC;";
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
					echo "<div>";
					// echo "<a href='Article_show.php?id=" . $rowAll[0]['NumArt'] ."'><img src='assets/image_article/" .$rowAll[0]['UrlPhotA'] ."'></a>";
					echo "<a href='Article_show.php?id=" . $rowAll[0]['NumArt'] ."'><img src='assets/image_article/art1.jpg'></a>";
					echo "<h1>" . $rowAll[0]['LibTitrA'] . "</h1>";
					echo "</div>";
				}

				else {
				  echo "Il n'y a aucun Article enregistré.";
				}
			?>

		</div>

		<div id="art_popu"> 
			<h2>Article les plus populaires :</h2>
			<div class="trio">
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
							echo "<div>";
							// echo "<a href='Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='assets/image_article/" .$rowAll[$i]['UrlPhotA'] ."'></a>";
							echo "<a href='Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='assets/image_article/art1.jpg'></a>";
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "</div>";

						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<div>";
							// echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" .$row['UrlPhotA'] ."'></a>";
							echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/art1.jpg'></a>";
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "</div>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré.";
					}
				?>
			</div>
			<a class="bouton" href="">Voir tout</a>
		</div>

		<div id="events">
			<h2>Evenements :</h2>
			<div class="trio">
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
							echo "<div>";
							echo "<a href='Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='assets/image_article/" .$rowAll[$i]['UrlPhotA'] ."'></a>";
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "</div>";
						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<div>";
							echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" .$row['UrlPhotA'] ."'></a>";
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "</div>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré dans événements.";
					}
				?>
			</div>
			<a class="bouton" href="">Voir tout</a>
		</div>

		<div id="portraits">
			<h2>Portraits :</h2>
			<div class="trio">
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
							echo "<div>";
							echo "<a href='Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='assets/image_article/" .$rowAll[$i]['UrlPhotA'] ."'></a>";
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";					
							echo "</div>";
						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<div>";
							echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" .$row['UrlPhotA'] ."'></a>";
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "</div>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré dans portrait.";
					}
				?>
			</div>
			<a class="bouton" href="">Voir tout</a>
		</div>
	</div>

	<footer>
		<p class="footer">MENTIONS LEGALES</p>
	</footer>

</body>