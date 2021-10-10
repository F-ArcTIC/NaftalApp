<?php
session_start();
require_once("../../../cnx.php");

$query="UPDATE `pv_tech` SET "; 
$query2="UPDATE `appel_doffre` SET `etape` = 'COP technique' WHERE `code` = '"; 
$query4="UPDATE `appel_doffre` SET `etape` = 'Publication' WHERE `code` = '"; 
$query5="UPDATE `appel_doffre` SET "; 

$reply=array();
$reply["success"]=TRUE;

if(isset($_POST["id_cop"]))
{

if(isset($_POST["num_pv"]))
{
	 if ($conn->query($query."`num_pv` = '".$_POST["num_pv"]."' WHERE `id_pv` =".$_POST["id_cop"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nm pv vide";
}

if(isset($_POST["nbcc"]))
{
     if ($conn->query($query5."`nb_cc` = '".$_POST["nbcc"]."' WHERE `code` ='".$_POST["code"]."'") === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nombre de cc vide";
}
if(isset($_POST["nboff"]))
{
     if ($conn->query($query5."`nb_offre` = '".$_POST["nboff"]."' WHERE `code` ='".$_POST["code"]."'") === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nb offre vide";
}


if(isset($_POST["date_pv"]))
{
	 if ($conn->query($query."`date_pv` = '".$_POST["date_pv"]."' WHERE `id_pv` =".$_POST["id_cop"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
} else {
     $reply["success"]=FALSE;
            $reply["message"]="date pv vide";
}
if(isset($_POST["file_pv"]))
{
	 if ($conn->query($query."`file_pv` = '".$_POST["file_pv"]."' WHERE `id_pv` =".$_POST["id_cop"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
        if(isset($_POST['an_pv']))
                {
                    if(file_exists($_POST['an_pv'])) {unlink($_POST['an_pv']); }
                } else {
                    $reply["message"]="an_pv vide";
                }
}

if(isset($_POST["code"]))
{if(isset($_POST["ancode"]))
{ if($_POST["code"]!=$_POST["ancode"])
	 {if ($conn->query($query."`code` = '".$_POST["code"]."' WHERE `id_pv` =".$_POST["id_cop"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
       
                                            if ($conn->query($query4.$_POST["ancode"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
           if ($conn->query($query2.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                                                     
        
       }         
                                    
}
}


}
else
{
	$reply["success"]=FALSE;
    $reply["message"]="id cvt non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>



