
<?php
//read.php
//$connect = mysqli_connect(<host>, <user>, <pass>, <database>);
session_start();
require_once("../../cnx.php");
$sql = "SELECT num_pub, date_pub, date_cloture FROM publication WHERE num_p='";


$reply=array();
//echo $result ;
if(isset($_POST["placard"])){
	if ($result = $conn->query(($sql).$_POST['placard']."'")) {
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
	}
}
else {
	$reply["success"]=FALSE;
}

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>