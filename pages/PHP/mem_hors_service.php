 

<?php
session_start();
require_once("../../cnx.php");

$query1="UPDATE `membre` SET `etat` = '0' WHERE `id_mem` =";



$reply=array();
if(isset($_POST["id_mem"])){
   
    if ($conn->query($query1.$_POST["id_mem"]) === TRUE) 
    	
			$reply["success"]=TRUE;
    else {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
            }
}
else
{
	$reply["success"]=FALSE;
    $reply["message"]="id du membre non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
