
<?php
session_start();
require_once("../../../cnx.php");
$sql = "SELECT distinct  code FROM `commission` where `type`= 'CEOT'";


$reply=array();
$datatable=array();
//echo $result ;

	
		
					if ($result = $conn->query(($sql))) {
				    while ($row = $result->fetch_assoc()) {
				    	
				       				$datatable[]=$row;}
				       				 $reply["success"]=TRUE;
				       		
				       	}

				       	else
				       	{
				       		 $reply["message"]=$conn->error;
							$reply["success"]=FALSE;

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