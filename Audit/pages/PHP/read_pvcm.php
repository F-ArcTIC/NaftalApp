<?php
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
session_start();
require_once("../../../cnx.php");
 

 
$query1='select * , concat(`num_pv`," / ",`date_pv`) as n_date from pv_cmb';

 $reply=array();
 $data=array();
$recom=array('0' =>'Non Accordée',
'1' =>'Accordée');

                       
 if ($result = $conn->query(($query1))) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $a=$row['accord'];
            $row['accord']=$recom[$a];
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