<?php
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
session_start();
require_once("../../../cnx.php");
 

$query1='select * , concat(`num_pv`," / ",`date_pv`) as n_date from pv_fin';
$query2='select `objet` from `appel_doffre` where `code`= "';
 $reply=array();
 $data=array();


  $datatable=array();                     
 if ($result = $conn->query(($query1))) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($result2 = $conn->query(($query2).$row['code'].'"')) {
                while ($row2 = $result2->fetch_assoc()) {
                $row += array ('objet'=> $row2["objet"]);
            }
            }else {
                $reply["message1"]=$conn->error;
            }
           $datatable[]=$row;
        }

        /* free result set */
        $reply["success"]=TRUE;
        $reply["data"]=$datatable;
        $result->free();
    } else {
       $reply["message"]="NO DATA";
        $reply["success"]=FALSE;
}
           
/*echo '<pre>';
print_r($datatable);
echo '</pre>';*/

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>