<?php

require_once("../../cnx.php");

$query="UPDATE `notification` SET "; 


$reply=array();
$reply["success"]=TRUE;

if(isset($_POST["id_not"])){

	 if ($conn->query($query."`lu` = '1' WHERE `id_not` =".$_POST["id_not"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }


}

else
{
	$reply["success"]=FALSE;
    $reply["message"]="id notif non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
