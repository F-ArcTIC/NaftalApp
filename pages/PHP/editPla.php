<?php

require_once("../../cnx.php");

$query="UPDATE `placard` SET "; 

$reply=array();
$reply["success"]=TRUE;

if(isset($_POST['num_p']) )
{
    
        if(isset($_POST['code']))
        {
             if ($conn->query($query."`code` = '".$_POST['code']."' WHERE `num_p` =".$_POST["num_p"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message"]=$conn->error;
                }
        }

        if(isset($_POST['nature']))
        { 
            if ($conn->query($query."`nature` = \"".$_POST['nature']."\" WHERE `num_p` =".$_POST["num_p"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message"]=$conn->error;
                }
        }

}
else
{
    $reply["success"]=FALSE;
    $reply["message"]="id placard vide !";
}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
