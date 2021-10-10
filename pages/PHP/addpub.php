<?php

require_once("../../cnx.php");

$query="UPDATE `placard` SET "; 
$sqlpub = "INSERT INTO `publication`(`num_pub`, `date_pub`, `date_cloture`, `num_p`, `proro`, `surface`, `reference`, `pubHT`, `pubTTC`) VALUES (NULL, '" ;

$reply=array();
$reply["success"]=TRUE;


$date =date("Y-m-d");
if(isset($_POST['num_p']) )
{
    
        if(isset($_POST['etat']))
        {
             if ($conn->query($query."`etat` = '".$_POST['etat']."' WHERE `num_p` =".$_POST["num_p"]) === FALSE) 
                {
                    $reply["success"]=FALSE;
                    $reply["message"]=$conn->error;
                }
        }




if(isset($_POST["delai"]))
{ $delai=" + ".$_POST["delai"]." day";
    $dateclo =  date("Y-m-d",strtotime(date("Y-m-d", strtotime($date)).$delai ));
   $date =date("Y-m-d");

    if(isset($_POST["Surface"]))
        {
        if(isset($_POST["Référence"]))
            { 
                if(isset($_POST["pubht"]))
        {
        if(isset($_POST["pubttc"]))
            { 
                if(isset($_POST["proro"]))
            { 
                if ($conn->query($sqlpub.$date."' , '".$dateclo."' , ".$_POST['num_p']." ,".$_POST["proro"].", '".$_POST["Surface"]." page ',".$_POST["Référence"].", ".$_POST["pubht"]." ,".$_POST["pubttc"]." )") === TRUE) 
                                            $reply["success"]=TRUE and $reply["success"] ;
                                         else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]=$conn->error;
                                               }
              }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="proro vide";
                                               }                                  
            }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="pubttc vide";
                                               }
            }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="pubht vide";
                                               }                                  
            }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="reference vide";
                                               }
            }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="Surface vide";
                                               }
            }else {
                                                 $reply["success"]=FALSE;
                                                 $reply["message"]="delai vide";
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
