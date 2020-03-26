<?php


	$hostBD = 'localhost';
	$nameBD = 'BLOGART20';
	$user = 'root';
	$password = 'root';

	try
	{
	  $bdPdo = new PDO("mysql:host=$hostBD;dbname=$nameBD;charset=utf8", $user, $password);
	}
	catch (Exception $error)
	{
	        die('Erreur : ' . $error->getMessage());
	}


?>
