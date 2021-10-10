
<?php
session_start();
require_once("../../../cnx.php");
$sql = "SELECT code FROM `appel_doffre` where `etape`='CEOT' ";

$reply=array();
$datatable=array();
//echo $result ;

	
		
					if ($result = $conn->query(($sql))) {
				    while ($row = $result->fetch_assoc()) {
				    	
				       				$datatable[]=$row;}
				       				 $reply["success"]=TRUE;
				       		
				       	}else { $reply["message1"]=$conn->error;
				       			}
				       	
				    
				    /* free result set */
				   if(!empty($datatable))
				    	$reply["data"]=$datatable;
				    else {$reply["success"]=FALSE;
					
						$reply["message"]="NO DATA";}
			
		

	

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>