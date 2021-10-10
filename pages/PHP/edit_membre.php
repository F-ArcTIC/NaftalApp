<?php
session_start();
require_once("../../cnx.php");
$query="UPDATE `membre` SET ";//' WHERE `membre`.`id_mem` =";



$reply=array();
$reply["success"]=TRUE;
if(isset($_POST["id_mem"])){

if(isset($_POST["Nom"])) 
{
	 if ($conn->query($query."`nom_mem` = \"".$_POST["Nom"]."\" WHERE `id_mem` =".$_POST["id_mem"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
        
}else {$reply["success"]=FALSE;
 $reply["message"]="nom";}

if(isset($_POST["Prenom"]))
{
	if ($conn->query($query."`prenom_mem` = \"".$_POST["Prenom"]."\" WHERE `id_mem` =".$_POST["id_mem"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {$reply["success"]=FALSE;
 $reply["message"]="pre";}


if(isset($_POST["Districte"]))
{
	if ($conn->query($query."`Districte` = \"".$_POST["Districte"]."\" WHERE `id_mem` =".$_POST["id_mem"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {$reply["success"]=FALSE;
$reply["message"]="dis";}

if(isset($_POST["Poste"]))
{
	if ($conn->query($query."`poste` = '".$_POST["Poste"]."' WHERE `id_mem` =".$_POST["id_mem"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {$reply["success"]=FALSE;
$reply["message"]="pos";}

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
