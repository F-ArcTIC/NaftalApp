
<?php
require_once("../../cnx.php");
$sql = "SELECT code FROM `appel_doffre`";


$reply=array();
//echo $result ;

	if ($result = $conn->query(($sql))) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
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

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>