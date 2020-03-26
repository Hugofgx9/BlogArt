<?php
session_start();

include("CRUD/includes/Connect_PDO.php");
include ("CRUD/includes/ctrlSaisies.php");

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
	</nav>

	<div class=container>

		<a href="index.php"><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

<h1>Inscription</h1>

<?php
if (empty($_POST['Login'])) {// Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire



	echo '<form class="formulaire" method="post" action="register.php">
		<label for="Login">Login : (maximum 30 caractères)</label>
			<input name="Login" type="text" id="Login" /> <br />
		<label for="Pass">Mot de Passe : (maximum 15 caractères)</label>
			<input type="password" name="Pass" id="Pass" /> <br />
		<label for="confirm">Confirmer le mot de passe :</label>
			<input type="password" name="confirm" id="confirm" /><br />
		<label for="LastName">Nom :</label>
			<input type="text" name="LastName" id="LastName" /><br />
		<label for="FirstName">Prénom :</label>
			<input type="text" name="FirstName" id="FirstName" /><br />
		<label for="EMail">Votre adresse Mail :</label>
			<input type="text" name="EMail" id="EMail" /><br />
		<p><input class="bouton" type="submit" name="Submit" value="Inscription" /></p>
		<p>Tous les champs sont obligatoires</p>
		<p>Déjà inscrit ? <a href="./Connexion.php">Connectez-vous</a></p>
	</form>
	</div>
	</body>
	</html>';
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	$error_msg = NULL;
	$i = 0;

	// SUBMIT
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

	if (((isset($_POST['EMail'])) AND !empty($_POST['EMail']))
		AND ((isset($_POST['Login'])) AND !empty($_POST['Login']))
		AND ((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
		AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
		AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
		AND (!empty($_POST['Submit']) AND ($Submit == "Inscription"))) {

		    //On récupère les variables    
			$Login = (ctrlSaisies($_POST["Login"]));
			$Pass = (ctrlSaisies($_POST["Pass"]));
			$LastName = (ctrlSaisies($_POST["LastName"]));
			$EMail = (ctrlSaisies($_POST["EMail"]));
			$FirstName = (ctrlSaisies($_POST["FirstName"]));
			$admin = 0;
		    $confirm = $_POST['confirm'];

		    $query = "SELECT * FROM USER WHERE Login = :Login";

		    try {
		      $bdPdo_select = $bdPdo->prepare($query);
		      $bdPdo_select->execute(
		      	array(
		      		':Login' => $Login,
		      	)
		      ); // recup toutes les infos nécéssaires
		      $NbreData = $bdPdo_select->rowCount(); // nombre d'enregistrements
		    }
		    catch (PDOException $e) {
		      echo 'Erreur SQL : '. $e->getMessage().'<br/>';
		      die();
		    }

		    if ($NbreData != 0) {
		    	$error_msg = "Ce nom d'utilisateur est déjà pris";
		    	$i++;
			}
			elseif ($Login > 30){
				$error_msg = "Le Login est trop grand";
				$i++;

			}
			elseif ($Pass > 15){
				$error_msg = "Le mot de passe est trop grand";
				$i++;
			}
			elseif ($Pass != $confirm) {
				$error_msg = "Les mots de passes ne correspondent pas";
				$i++;
			}
			    //On vérifie la forme maintenant
		    elseif (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $EMail) || empty($EMail))
		    {
		        $error_msg = "Votre adresse E-Mail n'a pas un format valide";
		        $i++;
			}
	}
	else {
		$error_msg = "Vous devez remplir tous les champs.";
		$i++;
	}
	if ($i == 0) {

		$query = $bdPdo->prepare('INSERT INTO USER (admin, Login, Pass, LastName, EMail, FirstName) VALUES (:admin, :Login, :Pass, :LastName, :EMail, :FirstName);');

		$query->execute(
			array(
				':admin' => $admin,
				':Login' => $Login,
				':Pass' => $Pass,
				':LastName' => $LastName,
				':EMail' => $EMail,
				':FirstName' => $FirstName
			) //array
		); //$query->execute

		$query->closeCursor();

		//Et on définit les variables de sessions
        $_SESSION['Login'] = $Login;
        $_SESSION['LastName'] = $LastName;
        $_SESSION['FirstName'] = $FirstName;
        $_SESSION['EMail'] = $EMail;
        $_SESSION['admin'] = $admin;
        $query->CloseCursor();

		echo "Votre inscription est réussie, bienvenue " . $Login;
	}
	else {
        echo'<h2>Inscription interrompue</h2>';
        echo'<p>Une erreur s\'est produite pendant l\'incription</p>';
        echo'<p>'. $error_msg . '</p>';
        echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
	}
}
?>

</body>
</html>