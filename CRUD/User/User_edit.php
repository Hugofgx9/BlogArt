<?php

include '../includes/ctrlSaisies.php';
include '../includes/Connect_PDO.php';

//init les variables



if (isset($_GET['id']) AND  $_GET['id']) {

	$Login = $_GET['id'];

	$queryText = 'SELECT * FROM USER WHERE Login = :Login;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':Login' => $Login
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$Pass = $object->Pass;
		$EMail = $object->EMail;
		$FirstName = $object->FirstName;
		$LastName = $object->LastName;
		$admin = $object->admin;

	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
			AND ((isset($_POST['EMail'])) AND !empty($_POST['EMail']))
			AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
			AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$nv_Pass = (ctrlSaisies($_POST["Pass"]));
			$nv_EMail = (ctrlSaisies($_POST["EMail"]));
			$nv_FirstName = (ctrlSaisies($_POST["FirstName"]));
			$nv_LastName = (ctrlSaisies($_POST["LastName"]));
			$nv_LibCom = (ctrlSaisies($_POST["LibCom"]));
			$nv_admin = (ctrlSaisies($_POST["admin"]));
			$Login = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE USER SET Pass = :nv_Pass, EMail = :nv_EMail, FirstName = :nv_FirstName, admin = :nv_admin, LastName = :nv_LastName WHERE Login = :Login');

			$query->execute(
				array(
					':nv_Pass' => $nv_Pass,
					':nv_EMail' => $nv_EMail,
					':nv_FirstName' => $nv_FirstName,
					':nv_LastName' => $nv_LastName,
					':nv_admin' => $nv_admin,
					':Login' => $Login
				) //array
			); //$query->execute

			if (!empty($_SESSION['backpage'])){

				header("location:".  $_SESSION['backpage']);;
			}

			else {
				header("location:Thematique_read.php");
			}

		} //if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>



<?php include '../includes/Head.php'; ?>

<body>
	<h2> Edit <?php echo $Login; ?> </h2>

	<form method="POST" action="User_edit.php">

			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">

			<div>
				<label>Pass</label>
				<input type="datatime" name="Pass"
				value="<?php if(isset($_GET['id']))echo $Pass?>">
			</div>

			<div>
				<label>EMail</label>
				<input type="text" size='20' maxlength="20" name="EMail" id="EMail"
				value="<?php if(isset($_GET['id']))echo $EMail?>">
			</div>

			<div>
				<label>FirstName</label>
				<input type="text" size='60' maxlength="60" name="FirstName" id="FirstName"
				value="<?php if(isset($_GET['id']))echo $FirstName?>">
			</div>

			<div>
				<label>LastName</label>
				<input type="text" size='60' maxlength="60" name="LastName" id="LastName"
				value="<?php if(isset($_GET['id']))echo $LastName?>">
			</div>			

		    <!-- Listbox admin -->
	        <div>
		        <label for="admin">	     
		                Admin :
		        </label>
		        <input type="hidden" id="idadmin" name="idadmin"/>            
		        <select size="1" name="admin" id="admin"  class="form-control form-control-create" tabindex="30" >

	                <option <?php if ($admin == 1 )echo "selected='selected'"?> value="1" >
	                    Yes
	                </option>

	                <option <?php if ($admin == 0 )echo "selected='selected'"?>value="0" >
	                    No
	                </option>
		        </select>
	    	</div>
	    	<!-- FIN Listbox admin -->

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>

	</form>

</body>
</html>