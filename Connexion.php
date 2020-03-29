<?php
session_start();

include("CRUD/includes/Connect_PDO.php");
include './CRUD/includes/ctrlSaisies.php';
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

	<div id="connexion" class=container>

		<h1>Connexion</h1>

<?php
if (!isset($_POST['Login'])) //On est dans la page de formulaire
{
	echo '<form id="connexion" method="post" action="connexion.php">
	<p>
	<label for="Login">Login : <br></label><input name="Login" type="text" id="Login" /><br />
	<label for="Pass">Mot de Passe : <br></label><input type="password" name="Pass" id="Pass" />
	</p>
	<p><input class="bouton" type="submit" value="Connexion" /></p>
	<p><a class="bouton" href="./register.php">Pas encore inscrit ?</a></p>
	</form>
	 
	</div>
	</body>
	</html>';
}
else
{
    $message='';
    if (empty($_POST['Login']) || empty($_POST['Pass']) ) //Oublie d'un champ
    {
        $message = '<p>Une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query = $bdPdo->prepare('SELECT Login, Pass, LastName, FirstName, EMail, admin
        FROM user WHERE Login = :Login');
        $query->bindValue(':Login',$_POST['Login'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

	if ($data AND $data['Pass'] == $_POST['Pass']) // Acces OK !
	{
	    $_SESSION['Login'] = $data['Login'];
	    $_SESSION['admin'] = $data['admin'];
	    $_SESSION['EMail'] = $data['EMail'];
	    $message = '<p>Bienvenue '.$data['Login'].',
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a>
			pour revenir à la page d\'accueil</p>';
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le Login 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

}
?>

	<footer>
		<p class="footer">MENTIONS LEGALES</p>
	</footer>
<<<<<<< HEAD



=======
>>>>>>> 2e9938d6854054a506bfc441f1dec93a6869a9aa

</body>
</html>



