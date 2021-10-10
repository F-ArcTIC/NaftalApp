     
<?php

require_once("../../../cnx.php");

$query1 = "SELECT * from gré_a_gré " ;
$query8='select concat( num_pv, " / ", date_pv) as pvcmb from pv_cmb where code="'; /////////////// a revoire la NATURE

$reply=array();
$datatable=array();


if ($result = $conn->query($query1))
{
    while ($row = $result->fetch_assoc())
     {
          
          if ( $sql8=$conn->query($query8.$row["code"].'"')) 
                    {if ($donnee=$sql8->fetch_assoc()) $row += array('pvcmb' => $donnee["pvcmb"]); 
                    else $row += array('pvcmb' =>'/');}
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->errorInfo();
                    $err=1;
                }
                $datatable[]=$row;
     }
 if(!empty($datatable))
    $reply["data"]=$datatable;
 else {$reply["success"]=FALSE;
       $reply["message"]="NO DATA";}  
}
else {
  $reply["success"]=FALSE;
  $reply["message"]="NOu DATA";
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>
