<?php

require_once("../../../cnx.php");

$query="UPDATE `user` SET "; 


$reply=array();
$reply["success"]=TRUE;

if(isset($_POST["id_user"])){

if(isset($_POST["Districte"]))
{
	 if ($conn->query($query."`districte` = '".$_POST["Districte"]."' WHERE `id_user` =".$_POST["id_user"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}

if(isset($_POST["Direction"]))
{
	if ($conn->query($query."`direction` = '".$_POST["Direction"]."' WHERE `id_user` =".$_POST["id_user"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}
if(isset($_POST["Type"]))
{ 
    if($_POST["Type"]=='CM')
{$username=$_POST["Type"]."_".$_POST['Districte'];} else  
    $username=$_POST["Type"].$_POST["Direction"]."_".$_POST['Districte'];
    if ($conn->query($query."`username` = '".$username."' WHERE `id_user` =".$_POST["id_user"]) === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }

}
}

else
{
	$reply["success"]=FALSE;
    $reply["message"]="id du user non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
