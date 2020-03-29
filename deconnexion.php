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

		<?php //Le boutton user
		include './assets/includes/user_link.php';
		?>
		
	</nav>

	<div class=container>

<?php
session_start();
session_destroy();

echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
pour revenir à la page précédente.<br />
Cliquez <a href="./index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';
?>

</body>
</html>