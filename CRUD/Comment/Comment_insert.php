<?php  
	
	include '../includes/ctrlSaisies.php';
	include '../includes/Connect_PDO.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")  {

		// SUBMIT
		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

			if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
				// AND ((isset($_POST['DtCreC'])) AND !empty($_POST['DtCreC']))
				AND ((isset($_POST['PseudoAuteur'])) AND !empty($_POST['PseudoAuteur']))
				AND ((isset($_POST['EmailAuteur'])) AND !empty($_POST['EmailAuteur']))
				AND ((isset($_POST['TitrCom'])) AND !empty($_POST['TitrCom']))
				AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
				AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {


				$erreur = false;

				$NumCom = 0;
			    $dt = new DateTime();
    			$DtCreC = $dt->format('Y-m-d H:i:s');
				$PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
				$EmailAuteur = (ctrlSaisies($_POST["EmailAuteur"]));
				$TitrCom = (ctrlSaisies($_POST["TitrCom"]));
				$LibCom = (ctrlSaisies($_POST["LibCom"]));
				$NumArt = (ctrlSaisies($_POST["NumArt"]));

				$NumComSelect = $NumCom; // exemple : '021'
				$parmNumCom = $NumComSelect . "%";
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

					$query->execute(
						array(
							':NumCom' => $NumCom,
							':DtCreC' => $DtCreC,
							':PseudoAuteur' => $PseudoAuteur,
							':EmailAuteur' => $EmailAuteur,
							':TitrCom' => $TitrCom,
							':LibCom' => $LibCom,
							':NumArt' => $NumArt
						) //array
					); //$query->execute

					$Comid = $NumCom;

					$query->closeCursor();

						header("Location:Comment_read.php");

			} //if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom'])) [...] AND (*Submit == "Valider")))
			else {

				$erreur = true;

			} //else
		

	} //if ($_SERVER["REQUEST_METHOD"] == "POST")

	//init les variables
	$NumCom = "";
	$DtCreC = "";
	$PseudoAuteur = "";
	$EmailAuteur = "";
	$TitrCom = "";
	$LibCom = "";
	$NumArt = "";
?>

<?php include '../includes/Head.php'; ?>

<body>
	<form method="POST" action="Comment_insert.php">

<!-- 		<div>
			<label>DtCreC</label>
			<input type="datatime" name="DtCreC">
		</div> -->

		<div>
			<label>PseudoAuteur</label>
			<input type="text" size='20' maxlength="20" name="PseudoAuteur" id="PseudoAuteur">
		</div>

		<div>
			<label>EmailAuteur</label>
			<input type="text" size='60' maxlength="60" name="EmailAuteur" id="EmailAuteur">
		</div>

		<div>
			<label>TitrCom</label>
			<input type="text" size='60' maxlength="60" name="TitrCom" id="TitrCom">
		</div>			

		<div>
			<label>Libellé Comment</label>
			<input type="text" name="LibCom" id="LibCom">
		</div>

		<div>
			<label>NumArt</label>
			<input type="text" name="NumArt" size='12' maxlength="10" >
		</div>

		<div>
			<input type="submit" name="Submit" value="Valider">
		</div>
	</form>

</body>
</html>


