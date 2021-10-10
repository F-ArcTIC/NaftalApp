<?php

require_once("../../../cnx.php");

$query="UPDATE `user` SET "; 


$reply=array();
$reply["success"]=TRUE;

if(isset($_POST["id_user"])){
    
    $alpabet="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                $pass=array();
                $len=strlen($alpabet);
                for($i=0;$i<11;$i++)
                {
                    $n=rand(0,$len);
                    $pass[]=$alpabet[$n];
                }
                $password=implode($pass);
	 if ($conn->query($query."`password` = '".$password."' WHERE `id_user` =".$_POST["id_user"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
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
