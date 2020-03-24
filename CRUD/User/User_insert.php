<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['EMail'])) AND !empty($_POST['EMail']))
				//AND ((isset($_POST['admin'])) AND !empty($_POST['admin']))
				AND ((isset($_POST['Login'])) AND !empty($_POST['Login']))
				AND ((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
				AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
				AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {


				$erreur = false;

				$Login = (ctrlSaisies($_POST["Login"]));
				$Pass = (ctrlSaisies($_POST["Pass"]));
				$LastName = (ctrlSaisies($_POST["LastName"]));
				$EMail = (ctrlSaisies($_POST["EMail"]));
				$FirstName = (ctrlSaisies($_POST["FirstName"]));
				$admin = (int)(ctrlSaisies($_POST["admin"]));


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
			    	echo "Ce nom d'utilisateur est déjà pris";
		    	}
		    	else {

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

						header("Location:User_read.php");

		    	}// else

			} //if (((isset($_POST['Email'])) AND !empty($_POST['Email'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$admin = "";
	$Login = "";
	$Pass = "";
	$LastName = "";
	$EMail = "";
	$FirstName = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="User_insert.php">

<!-- 		<div>
			<label>admin</label>
			<input type="datatime" name="admin">
		</div> -->

		<div>
			<label>Login</label>
			<input type="text" size='30' maxlength="30" name="Login" id="Login">
		</div>

		<div>
			<label>Pass</label>
			<input type="text" size='15' maxlength="15" name="Pass" id="Pass">
		</div>			

		<div>
			<label>EMail</label>
			<input type="text" size='30' maxlength="30" name="EMail" id="EMail">
		</div>

		<div>
			<label>LastName</label>
			<input type="text" size='30' maxlength="30" name="LastName" id="LastName">
		</div>

		<div>
			<label>FirstName</label>
			<input type="text" name="FirstName" size='50' maxlength="50" >
		</div>



			    <!-- Listbox admin -->
        <div>
	        <label for="admin">	     
	                Admin :
	        </label>
	        <input type="hidden" id="idadmin" name="idadmin"/>            
	        <select size="1" name="admin" id="admin"  class="form-control form-control-create" tabindex="30" >

                <option value="1" >
                    Yes
                </option>

                <option value="0" >
                    No
                </option>
	        </select>
    	</div>
    	<!-- FIN Listbox admin -->

		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


