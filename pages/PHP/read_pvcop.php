<?php
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
session_start();
require_once("../../cnx.php");

$query1='select * , concat(`num_pv`," / ",`date_pv`) as n_date from pv_tech';
$query2='select `nb_offre`,`nb_cc` from `appel_doffre` where `code`= "';
 $reply=array();
 $data=array();


                       
 if ($result = $conn->query(($query1))) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($result2 = $conn->query(($query2).$row['code'].'"')) {
                while ($row2 = $result2->fetch_assoc()) {
                $row += array ('nb_offre'=> $row2["nb_offre"]);
                 $row += array ('nb_cc'=> $row2["nb_cc"]);
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