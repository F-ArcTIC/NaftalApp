<?php
session_start();
require_once("../../cnx.php");

$query="UPDATE `pv_cmb` SET "; 
$query2="UPDATE `appel_doffre` SET `etape` = 'CMB' WHERE `code` = '"; 
$query3="UPDATE `préqualif` SET `etape` = 'CMB' WHERE `code` = '"; 
$query6="UPDATE `gré_a_gré` SET `etape` = 'CMB' WHERE `code` = '"; 

$query4="UPDATE `appel_doffre` SET `etape` = 'CVT' WHERE `code` = '"; 
$query5="UPDATE `préqualif` SET `etape` = 'CVT' WHERE `code` = '"; 
$query7="UPDATE `gré_a_gré` SET `etape` = 'initial' WHERE `code` = '"; 

$query8="UPDATE `appel_doffre` SET  "; 
$query9="UPDATE `préqualif` SET "; 
$query10="UPDATE `gré_a_gré` SET "; 
$reply=array();
$reply["success"]=TRUE;


if(isset($_POST["id_cmb"]))
{

if(isset($_POST["fs"]))
                {   
                            if ($conn->query($query8."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message1"]=$con->error;
                                        }
                                        if ($conn->query($query9."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message1"]=$conn->error;
                                        }
                                        if ($conn->query($query10."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message1"]=$conn->error;
                                        }
                                }

if(isset($_POST["num_pv"]))
{
	 if ($conn->query($query."`num_pv` = '".$_POST["num_pv"]."' WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="nm pv vide";
}
if(isset($_POST["typevisa"]))
    
{ if($_POST["accord"]==0 ) $type=""; else $type=$_POST["typevisa"];
     if ($conn->query($query."`type_visa` =\"".$type."\" WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
        {
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
}else {
     $reply["success"]=FALSE;
            $reply["message"]="type pv vide";
}
if(isset($_POST["date_pv"]))
{
	 if ($conn->query($query."`date_pv` = '".$_POST["date_pv"]."' WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
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
	 if ($conn->query($query."`file_pv` = '".$_POST["file_pv"]."' WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
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
if(isset($_POST["accord"]))
{
	 if ($conn->query($query."`accord` = ".$_POST["accord"]." WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
    	{
            $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
        }
    if($_POST["accord"]==1){
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
                                        if ($conn->query($query6.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }if ($conn->query($query8."`etat` = 'En cours' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["succenss"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        if ($conn->query($query9."`etat` = 'En cours' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        if ($conn->query($query10."`etat` = 'En cours' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                            }else {
                                if ($conn->query($query8."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["succenss"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        if ($conn->query($query9."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        if ($conn->query($query10."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        if ($conn->query($query4.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                                        
        
                                            if ($conn->query($query5.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }

                                            if ($conn->query($query7.$_POST["code"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
                            }
}
if(isset($_POST["code"]))
{if(isset($_POST["ancode"]))
{ if($_POST["code"]!=$_POST["ancode"]){
	 if ($conn->query($query."`code` = '".$_POST["code"]."' WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
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

                                            if ($conn->query($query7.$_POST["ancode"]."'") === FALSE) 
                                        {
                                            $reply["success"]=FALSE;
                                            $reply["message"]=$conn->error;
                                        }
 }                                   
}
}
if(isset($_POST["num_visa"]))
{
	 if ($conn->query($query."`num_visa` = '".$_POST["num_visa"]."' WHERE `id_pv` =".$_POST["id_cmb"]) === FALSE) 
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



