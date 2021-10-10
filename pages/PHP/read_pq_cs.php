     
<?php

require_once("../../../cnx.php");
 

$query1 = "SELECT * from préqualif where id_operateur=" ;

$reply=array();
$datatable=array();


if ($result = $conn->query($query1.$_SESSION['id_user']))
{
    while ($row = $result->fetch_assoc())
     {
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
