<?php

require_once("../../../cnx.php");

$query="UPDATE `commission` SET "; 
$query2="UPDATE `commission-membre` SET ";
$query3="DELETE FROM `commission-membre` WHERE `poste`= 'membre' and `id_c` = ";
$query4="INSERT INTO `commission-membre` (`id_cm`, `id_c`, `id_m`, `poste`, `date_deb`, `date_fin`) VALUES (NULL, '";//1', '1', 'membre', NULL, NULL)";

$reply=array();
$reply["success"]=TRUE;


    if(isset($_POST['id_c']))
    {
        if(isset($_POST['numD']))
        {
             if ($conn->query($query."`num_dec` = '".$_POST['numD']."' WHERE `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="num_dec";
                    $reply["message"]=$conn->error;
                }
        }

        if(isset($_POST['code']))
        { 
            if ($conn->query($query."`code` = '".$_POST['code']."' WHERE `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="code";
                    $reply["message"]=$conn->error;
                }
        }

        if(isset($_POST['dateD']))
        {
            if ($conn->query($query."`date_dec` = '".$_POST['dateD']."' WHERE `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="date_dec";
                    $reply["message"]=$conn->error;
                }
        }

         if(isset($_POST['Juriste']))
        {
            if ($conn->query($query2." `id_m` = '".$_POST['Juriste']."' WHERE `poste`= 'Juriste' and `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="Juriste";
                    $reply["message"]=$conn->error;
                }
        }

         if(isset($_POST['Financier']))
        {
            if ($conn->query($query2." `id_m` = '".$_POST['Financier']."' WHERE `poste`= 'Financier' and `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="Financier";
                    $reply["message"]=$conn->error;
                }
        }

         if(isset($_POST['President']))
        {
            if ($conn->query($query2." `id_m` = '".$_POST['President']."' WHERE `poste`= 'President' and `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="President";
                    $reply["message"]=$conn->error;
                }
        }

        if(isset($_POST['Membres']))
        {
            if($conn->query($query3.$_POST['id_c'])===TRUE)
            {
                $mem=$_POST['Membres'];
                foreach($mem as $m)
                {
                     if($conn->query($query4.$_POST['id_c']."','".$m."','membre',NULL, NULL)")===FALSE)
                        {
                            $reply["success"]=FALSE;
                            $reply["message1"]="Membres1";
                            $reply["message"]=$conn->error;
                        
                        }
                }
            }
            else
            {
                $reply["success"]=FALSE;
                $reply["message1"]="Membres2";
                $reply["message"]=$conn->error;
            }
        }


    }
    else
    {
        $reply["success"]=FALSE;
        $reply["message"]="id de commision non recu!";
    }

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();


?>
