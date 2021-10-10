    
<?php
session_start();
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
require_once("../../../cnx.php");
 
$query1='select * from pv_cpq';
$query2="select objet from préqualif where code ='";
 $reply=array();
$datatable=array();

 if ($result = $conn->query(($query1)))
 {
        while($row = $result->fetch_assoc())
        {
        	if ( $sql2=$conn->query($query2.$row['code']."'")) 
                {
                    if ($donnee=$sql2->fetch_assoc()) $row += array('objet' => $donnee['objet']); 
                    else $row += array('objet' =>'/');
               
        		   $datatable[]=$row;
        		 }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->error;
                }

         }

     $reply["success"]=TRUE;
     $reply["data"]=$datatable;

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