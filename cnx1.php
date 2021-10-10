<?php
try {
	  $con = new PDO("mysql:host=sql11.freemysqlhosting.net;dbname=sql11443513;", "sql11443513", "PMbAtJmp4R");
	 $con->query("SET NAMES 'utf8'");}
}catch (Exception $e){
		
		die('Erreur : impossible de se connecter à la base de donnée');
	}	
?>