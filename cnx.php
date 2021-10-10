<?php
try {
	$conn = mysqli_connect("sql11.freemysqlhosting.net", "sql11443513", "PMbAtJmp4R", "sql11443513");
	$conn->query("SET NAMES 'utf8'");
}catch (Exception $e){
		
		die('Erreur : impossible de se connecter à la base de donnée');
	}	
?>
