<?php

require_once("../../../cnx.php");

$delquery1="DELETE FROM `user` WHERE `id_user` = ";



$reply=array();
if(isset($_POST["id_user"])){
   
    if ($conn->query($delquery1.$_POST["id_user"]) === TRUE) 
    	
			$reply["success"]=TRUE;
    else {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
            }
}
else
{
	$reply["success"]=FALSE;
    $reply["message"]="id de user non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
