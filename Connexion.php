<?php
session_start();

include("CRUD/includes/Connect_PDO.php");
include './CRUD/includes/ctrlSaisies.php';
?>

<h1>Connexion</h1>

<?php
if (!isset($_POST['Login'])) //On est dans la page de formulaire
{
	echo '<form method="post" action="connexion.php">
	<p>
	<label for="Login">Login :</label><input name="Login" type="text" id="Login" /><br />
	<label for="Pass">Mot de Passe :</label><input type="password" name="Pass" id="Pass" />
	</p>
	<p><input type="submit" value="Connexion" /></p></form>
	<a href="./register.php">Pas encore inscrit ?</a>
	 
	</div>
	</body>
	</html>';
}
else
{
    $message='';
    if (empty($_POST['Login']) || empty($_POST['Pass']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query = $bdPdo->prepare('SELECT Login, Pass, LastName, FirstName, EMail, admin
        FROM USER WHERE Login = :Login');
        $query->bindValue(':Login',$_POST['Login'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['Pass'] == $_POST['Pass']) // Acces OK !
	{
	    $_SESSION['Login'] = $data['Login'];
	    $_SESSION['admin'] = $data['admin'];
	    $_SESSION['EMail'] = $data['EMail'];
	    $message = '<p>Bienvenue '.$data['Login'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
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






