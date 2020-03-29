<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/general.css">
</head>

<body>

	<nav>
	</nav>

	<div class=container>

		<a href="index.php"><img class="logo" src="assets/png/logo.png" alt="Logo de l'Avant Première Bordelaise"></a>

<?php
session_start();
session_destroy();

echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="./index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';
?>

</body>
</html>