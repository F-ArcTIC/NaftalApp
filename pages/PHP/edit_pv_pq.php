<?php
session_start();
require_once("../../../cnx.php");

$query="UPDATE `pv_cpq` SET "; 
$query2="UPDATE `préqualif` SET `etape` = 'CPQ' WHERE `code` = '"; 
$query4="UPDATE `préqualif` SET `etape` = 'CMB' WHERE `code` = '"; 
$query5="UPDATE `préqualif` SET "; 

$reply=array();
$reply["success"]=TRUE;

if(isset($_POST["id_ceot"]))
{

if(isset($_POST["num_pv"]))
{
     if ($conn->query($query."`num_pv` = '".$_POST["num_pv"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nm pv vide";
}

if(isset($_POST["num_sl"]))
{
     if ($conn->query($query."`num_ShorList` = '".$_POST["num_sl"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nm sl vide";
}


if(isset($_POST["date_pv"]))
{
     if ($conn->query($query."`date_pv` = '".$_POST["date_pv"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
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
     if ($conn->query($query."`file_pv` = '".$_POST["file_pv"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
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

if(isset($_POST["file_sl"]))
{
     if ($conn->query($query."`file_ShortList` = '".$_POST["file_sl"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
        if(isset($_POST['an_pv']))
                {
                    if(file_exists($_POST['an_sl'])) {unlink($_POST['an_sl']); }
                } else {
                    $reply["message"]="an_sl vide";
                }
}

if(isset($_POST["code"]))
{if(isset($_POST["ancode"]))
{ if($_POST["code"]!=$_POST["ancode"])
     {if ($conn->query($query."`code` = '".$_POST["code"]."' WHERE `id_cpq` =".$_POST["id_ceot"]) === FALSE) 
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
    $reply["message"]="id ceot non recu!";

}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>



