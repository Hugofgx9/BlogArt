<?php
session_start();

include './CRUD/includes/ctrlSaisies.php';
include './CRUD/includes/Connect_PDO.php';

//init les variables
$DtCreA = "";
$LibTitrA = "";
$LibChapoA = "";
$LibAccrochA = "";
$Parag1A = "";
$LibSsTitr1 = "";
$Parag2A = "";
$LibSsTitr2 = "";
$Parag3A = "";
$LibConclA = "";
$UrlPhotA = "";
$Likes = "";
$NumAngl = "";
$NumThem = "";
$NumLang = "";
$NumArt = "";


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumArt = $_GET['id'];
	$NumArtCom = $_GET['id'];

	$queryText = 'SELECT * FROM ARTICLE WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$DtCreA = $object->DtCreA;
		$LibTitrA = $object->LibTitrA;
		$LibChapoA = $object->LibChapoA;
		$LibAccrochA = $object->LibAccrochA;
		$Parag1A = $object->Parag1A;
		$LibSsTitr1 = $object->LibSsTitr1;
		$Parag2A = $object->Parag2A;
		$LibSsTitr2 = $object->LibSsTitr2;
		$Parag3A = $object->Parag3A;
		$LibConclA = $object->LibConclA;
		$UrlPhotA = $object->UrlPhotA;
		$Likes = $object->Likes;
		$NumAngl_get = $object->NumAngl;
		$NumThem_get = $object->NumThem;
		$NumLang_get = $object->NumLang;

	}

	$queryText = 'SELECT * FROM MOTCLEARTICLE WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);


	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$NumMoCle_get = $object->NumMoCle;

	}

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/article.css">
</head>

<body>

	<nav>

		<a href="index.php"><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

	</nav>

	<div class="head"> <!-- Corps de la page -->

<!-- 		<input class="search" type="input" name="search"> -->

		<div class="user">
			<?php //Le boutton user
				include './assets/includes/user_link.php';
			?>
		</div>

	</div>

	<div class=container>

		<input class="search" type="input" name="search">

		<!-- <h2> SHOW <?php echo $NumArt ?> </h2> -->

		<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<!-- <img src="<?php if(isset($_GET['id']))echo $UrlPhotA?>"> -->
			<img class="illustration" src="assets/image_article/<?php if(isset($_GET['id']))echo $UrlPhotA?>" alt="Couverture de l'article">
			<p class="date">JJ/MM/AAAA HH:MM</p>
		<h1>
			<!-- <acronym title="LibTitrA :"> -->
			<?php if(isset($_GET['id']))echo $LibTitrA?>
			<!-- </acronym> -->
		</h1>

		<h2>
			 <!-- <acronym title="LibChapoA :"> -->
			<?php if(isset($_GET['id']))echo $LibChapoA?>
			<!-- </acronym> -->
		</h2>

		<p>
			 <!-- <acronym title="LibAccrochA :"> -->
			<?php if(isset($_GET['id']))echo $LibAccrochA?>
			<!-- </acronym> -->
			 <!-- <acronym title="Parag1A :"> -->
			<?php if(isset($_GET['id']))echo $Parag1A?>
			<!-- </acronym> -->
		</p>

		<h3>
			 <!-- <acronym title="LibSsTitr1 :"> -->
			<?php if(isset($_GET['id']))echo $LibSsTitr1?>
			<!-- </acronym> -->
		</h3>

		<p>
			 <!-- <acronym title="Parag2A :"> -->
			<?php if(isset($_GET['id']))echo $Parag2A?>
			<!-- </acronym> -->
		</p>

		<h3>
			 <!-- <acronym title="LibSsTitr2 :"> -->
			<?php if(isset($_GET['id']))echo $LibSsTitr2?>
			<!-- </acronym> -->
		</h3>

		<p>
			 <!-- <acronym title="Parag3A :"> -->
			<?php if(isset($_GET['id']))echo $Parag3A?>
			<!-- </acronym> -->
		</p>

		<p>
			 <!-- <acronym title="LibConclA :"> -->
			<?php if(isset($_GET['id']))echo $LibConclA?>
			<!-- </acronym> -->
		</p>	

		<p  class="nbLike">
			<img src="assets/png/unlike.png" class="like" alt="Like">
		</p>


<!-- 		<p>
			<input class="nbLike" type="button" alt="Like" style="background-image:url('assets/png/unlike.png')"/>
		</p> -->

		<div id="comments">
			<?php //les commentaires

				include './assets/includes/Connect_PDO.php';
				
			    $query = "SELECT * FROM COMMENT WHERE NumArt = :NumArt ORDER BY DtCreC DESC;";
			    try {
			      $bdPdo_select = $bdPdo->prepare($query);
			      $bdPdo_select->execute(
			      	array(
  						':NumArt' => $NumArt,	
		      	  )); // recup toutes les infos nécéssaires
			      $NbreData = $bdPdo_select->rowCount(); // nombre d'enregistrements
			      $rowAll = $bdPdo_select->fetchAll();
			    }
			    catch (PDOException $e) {
			      echo 'Erreur SQL : '. $e->getMessage().'<br/>';
			      die();
			    }

			    echo '<h4>Commentaires : </h4>';

			    if ($NbreData != 0) {		    	

					foreach ($rowAll as $row) {
						echo '<div class="comment">
									<p>' . $row['LibCom'] . '</p>
									<p>' . $row['PseudoAuteur'] . '</p>
							  </div>';
					}
				}

				if (!empty($_SESSION['Login'])) {
					echo '<form method="POST" action="Article_show.php">
							<input type="hidden" name="NumArtforCom" value="' . $NumArt .'">
							<input type="text" name="LibCom" id="LibCom">
							<input type="submit" name="Submit" value="Ajouter un commentaire">
						</form>';


						if ($_SERVER["REQUEST_METHOD"] == "POST")  {

							// SUBMIT
							$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

								if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
									// AND ((isset($_POST['DtCreC'])) AND !empty($_POST['DtCreC']))
									//AND ((isset($_POST['PseudoAuteur'])) AND !empty($_POST['PseudoAuteur']))
									//AND ((isset($_POST['EmailAuteur'])) AND !empty($_POST['EmailAuteur']))
									//AND ((isset($_POST['TitrCom'])) AND !empty($_POST['TitrCom']))
									//AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
									AND (!empty($_POST['Submit']) AND ($Submit == "Ajouter un commentaire"))) {


									$erreur = false;

									$NumCom = 0;
								    $dt = new DateTime();
					    			$DtCreC = $dt->format('Y-m-d H:i:s');
									$PseudoAuteur = $_SESSION['Login'];
									$EmailAuteur = $_SESSION['EMail'];
									$LibCom = (ctrlSaisies($_POST["LibCom"]));
									$TitrCom = substr($LibCom, 0, 15);
									$NumArtforCom = (ctrlSaisies($_POST["NumArtforCom"]));

									$parmNumCom = "%"; // exemple : '021'
									$requete = "SELECT MAX(NumCom) AS NumCom FROM COMMENT WHERE NumCom LIKE '$parmNumCom';";

									$result = $bdPdo->query($requete);

									if ($result) {

										$tuple = $result->fetch();
										$NumCom = $tuple["NumCom"];

										if (is_null($NumCom)) {

											$NumCom = 001;

										} //if (is_null($NumCom))
										else {

											$NumCom = $tuple["NumCom"];
											$numSeqCom = (int)$NumCom;
										} //else

										$numSeqCom++;

										// clé primR reconstituée
										if ($numSeqCom < 10) {
											$NumCom = "00" . $numSeqCom;
										} //if ($numSeqCom < 10)
										else if ($numSeqCom < 100 ) {
											$NumCom = "0" . $numSeqCom;
										}
										else {
											$NumCom = $numSeqCom;
										} //else
									} //if ($result)

										$query = $bdPdo->prepare('INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom, LibCom, NumArt) VALUES (:NumCom, :DtCreC, :PseudoAuteur, :EmailAuteur, :TitrCom, :LibCom, :NumArt);');

										//PB $NumArt n'a plus de valeurs

										$query->execute(
											array(
												':NumCom' => $NumCom,
												':DtCreC' => $DtCreC,
												':PseudoAuteur' => $PseudoAuteur,
												':EmailAuteur' => $EmailAuteur,
												':TitrCom' => $TitrCom,
												':LibCom' => $LibCom,
												':NumArt' => $NumArtforCom
											) //array
										); //$query->execute

										$Comid = $NumCom;

										$query->closeCursor();

											header("location:".  $_SERVER['HTTP_REFERER']); 

								} //if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom'])) [...] AND (*Submit == "Valider")))
								else {

									$erreur = true;

								} //else
							

						} //if ($_SERVER["REQUEST_METHOD"] == "POST")
				}
				else {
					echo'<a href="Connexion.php">Connectez vous</a> avant d\'ajouter un commentaires';
				}
			?>
		</div>

		<div id="art_last"> 
			<h2>Les derniers articles :</h2>
			<div class="trio">
				<?php //liste les plus populaires

					include './CRUD/includes/Connect_PDO.php';
					
				    $query = "SELECT * FROM ARTICLE ORDER BY NumArt DESC;";
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
							echo "<a href='Article_show.php?id=" . $rowAll[$i]['NumArt'] ."'><img src='assets/image_article/" . $rowAll[$i]['UrlPhotA'] . "'></a>";
							echo "<h4>" . $rowAll[$i]['LibTitrA'] . "</h4>";
							echo "</div>";

						}
					}

					elseif ($NbreData != 0) {

						foreach ($rowAll as $row) {
							echo "<div>";
							// echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" .$row['UrlPhotA'] ."'></a>";
							echo "<a href='Article_show.php?id=" . $row['NumArt'] ."'><img src='assets/image_article/" . $row['UrlPhotA'] . "'></a>";
							echo "<h4>" . $row['LibTitrA'] . "</h4>";
							echo "</div>";
						}
					}

					else {
					  echo "Il n'y a aucun Article enregistré.";
					}
				?>
			</div>
			<a class="bouton" href="Article_all.php">Voir tout</a>
		</div>
	</div>

	<footer>
		<p class="footer">MENTIONS LEGALES</p>	
	</footer>

</body>
</html>