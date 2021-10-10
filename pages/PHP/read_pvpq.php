<?php
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
session_start();
require_once("../../../cnx.php");
 
 
$query1='select * , concat(`num_pv`," / ",`date_pv`) as n_date from pv_cpq';
$query2="select objet from préqualif where code='";
 $reply=array();
 $data=array();

 if ($sql1= $conn->query($query1))
 {
        while($code=$sql1->fetch_assoc())
        {
            if ($sql2= $conn->query($query2.$code['code']."'"))
             {
                    if($objet=$sql2->fetch_assoc())
                    {   
                        $code += array ('objet'=>$objet['objet']);
                        
                         $data[]=$code;
                    }
                    else
                    {
                                
                    }


            }
            else
            {
                 $reply["success"]=FALSE;
                  $reply["message"]=$conn->error;
            }  
            

         }

     $reply["success"]=TRUE;
     $reply["data"]=$data;

 }
else
{
    $reply["success"]=FALSE;
    $reply["message"]="NO DATA";
}

/*echo '<pre>';
print_r($datatable);
echo '</pre>';*/

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>