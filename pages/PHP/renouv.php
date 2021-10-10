<?php

require_once("../../cnx.php");

$query1="UPDATE `commission` SET ";
$query2="UPDATE `commission-membre` SET ";
$query3="DELETE FROM `commission-membre` WHERE `poste`= 'membre' and `id_c` = ";
$query4="INSERT INTO `commission-membre` (`id_cm`, `id_c`, `id_m`, `poste`, `date_deb`, `date_fin`) VALUES (NULL, '";//1', '1', 'membre', NULL, NULL)";

$reply=array();
$reply["success"]=TRUE;


    if(isset($_POST['id_c']))
    {
        if(isset($_POST["renouv"]))
        {  $date =date("Y-m-d");
            
            $daterenouv =  date("Y-m-d",strtotime(date("Y-m-d", strtotime($date))."+ 2year" ));
           $date =date("Y-m-d");

           if ($conn->query($query1." `date_renouv` = '".$daterenouv."' WHERE `id_c` =".$_POST["id_c"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message1"]="renouv";
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
