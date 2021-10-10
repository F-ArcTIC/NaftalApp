<?php
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
session_start();
require_once("../../cnx.php");
 
$query1='select * , concat(`num_pv`," / ",`date_pv`) as n_date from pv_cmb';
$query2='select `fiche_suivi` from `appel_doffre` where `code`= "';
$query3='select `fiche_suivi` from `préqualif` where `code`= "';
$query4='select `fiche_suivi` from `gré_a_gré` where `code`= "';

 $reply=array();
 $data=array();
$recom=array('0' =>'Non Accordée',
'1' =>'Accordée');
 $datatable=array();
                       
 if ($result = $conn->query(($query1))) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($result2 = $conn->query(($query2).$row['code'].'"')) {
                while ($row2 = $result2->fetch_assoc()) {
                $row += array ('fs'=> $row2["fiche_suivi"]);
            }
            }else {
                $reply["message1"]=$conn->error;
            }
            if ($result3 = $conn->query(($query3).$row['code'].'"')) {
                while ($row2 = $result3->fetch_assoc()) {
                $row += array ('fs'=> $row2["fiche_suivi"]);
            }
            }else {
                $reply["message2"]=$conn->error;
            }
            if ($result4 = $conn->query(($query4).$row['code'].'"')) {
                while ($row2 = $result4->fetch_assoc()) {
                $row += array ('fs'=> $row2["fiche_suivi"]);
            }
            }else {
                $reply["message3"]=$conn->error;
            }
        // output data of each row
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