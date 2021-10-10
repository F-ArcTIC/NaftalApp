<?php
//read.php
//$connect = mysqli_connect(<host>, <user>, <pass>, <database>);
session_start();
require_once("../../../cnx.php");
$sqlpub = "INSERT INTO `placard` (`num_p`, `nature`, `date_demande_pub`, `etat`, `code`) VALUES (NULL, \"" ;


$delquery1="DELETE FROM placard WHERE num_p='";


$replay=array();


if(isset($_POST["code"]))
{
	if(isset($_POST["nature"]))
		{
		if(isset($_POST["etat"]))
			{ 
			

							      		 if ($conn->query($sqlpub.$_POST["nature"]."\" , NULL , '".$_POST["etat"]."','".$_POST["code"]."')") === TRUE) 
							      		   	$reply["success"]=TRUE and $reply["success"] ;
										 else {
										         $reply["success"]=FALSE;
										         $reply["message"]=$conn->error;
										       }
										}
								 else {
										 $reply["success"]=FALSE;
										 $reply["message"]="etat vide";
									   }
								}
							else {

									$reply["success"]=FALSE;
									$reply["message"]="nature vide";
								 }
						}
					 	
						else {
							   $reply["success"]=FALSE;
							   $reply["message"]="code vide";
							}
					

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();

?>
