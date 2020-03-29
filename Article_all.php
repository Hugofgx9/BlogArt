<?php
session_start();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/articleall.css">
</head>

<body>

	<nav><!-- 		<a><img src="assets/png/logo.png"></a> -->

	<a href="index.php"><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

	</nav>

	<div class="head"> <!-- Corps de la page -->

		<input class="search" type="input" name="search">

		<div class="user"><?php //Le boutton user
		include './assets/includes/user_link.php';
		?>
		</div>

	</div>
	<div class="container">

		<div id="AllLastArt"> 
			<h2>Tout nos articles :</h2>
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

					$i = 0;

						foreach ($rowAll as $row) {

							if (($i % 3) == 0) { echo '<div class="trio">';}

							echo "<div>";
							// echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" .$row['UrlPhotA'] ."'></a>";
							echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" . $row['UrlPhotA'] . "'></a>";
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo $i;
							echo "</div>";

							$i++;

							if (($i % 3) == 0) {echo '</div>';}
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré.";
					}
				?>
			</div>
		</div>
	</div>

	<footer>
		<p class="footer">MENTIONS LEGALES</p>
	</footer>

</body>