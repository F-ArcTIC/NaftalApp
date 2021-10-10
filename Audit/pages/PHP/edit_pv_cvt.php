<?php
session_start();
require_once("../../../cnx.php");

$query="UPDATE `pv_cvt` SET "; 
$query2="UPDATE `appel_doffre` SET `etape` = 'CVT' WHERE `code` = '"; 
$query3="UPDATE `préqualif` SET `etape` = 'CVT' WHERE `code` = '"; 
$query4="UPDATE `appel_doffre` SET `etape` = 'initial' WHERE `code` = '"; 
$query5="UPDATE `préqualif` SET `etape` = 'initial' WHERE `code` = '"; 
$reply=array();
$reply["success"]=TRUE;


if(isset($_POST["id_cvt"]))
{

if(isset($_POST["num_pv"]))
{
	 if ($conn->query($query."`num_pv` = '".$_POST["num_pv"]."' WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nm pv vide";
}
if(isset($_POST["date_pv"]))
{
	 if ($conn->query($query."`date_pv` = '".$_POST["date_pv"]."' WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
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
	 if ($conn->query($query."`file_pv` = '".$_POST["file_pv"]."' WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
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
if(isset($_POST["Recommandation"]))
{
	 if ($conn->query($query."`Recommandation` = ".$_POST["Recommandation"]." WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
    if($_POST["Recommandation"]==1){
        
                            if ($conn->query($query2.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;

                                        }
                                        if ($conn->query($query3.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                            }
}
if(isset($_POST["code"]))
{if(isset($_POST["ancode"]))
{
	 if ($conn->query($query."`code` = '".$_POST["code"]."' WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
       
                                            if ($conn->query($query4.$_POST["ancode"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        
        
                                            if ($conn->query($query5.$_POST["ancode"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                    
}
}
if(isset($_POST["num_visa"]))
{
	 if ($conn->query($query."`num_visa` = '".$_POST["num_visa"]."' WHERE `id_cvt` =".$_POST["id_cvt"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
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



