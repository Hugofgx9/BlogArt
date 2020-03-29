<?php //Change la directionle lien suivant si la personne est connectée et admin
if (!empty($_SESSION['Login'])) {
	if ($_SESSION['admin'] == 0){

		echo '<a class="user" href="user_page.php"><img class="user" src="assets/png/user.png" alt="Bouton User"></a>';

	}

	elseif ($_SESSION['admin'] == 1){

		echo '<a class="user" href="admin.php"><img class="user" src="assets/png/user.png" alt="Bouton User"></a>';

	}
}
else {

	echo '<a class="user" href="connexion.php"><img class="user" src="assets/png/user.png" alt="Bouton User"></a>';

}
?>