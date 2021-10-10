
<?php
session_start();
require_once("../../cnx.php");
$sql = "SELECT code FROM `projet`";
$sql2="select count(*) as nb from commission where code ='";


$reply=array();
$datatable=array();
//echo $result ;

	
		
					if ($result = $conn->query(($sql))) {
				    while ($row = $result->fetch_assoc()) {
				    	if ($result2 = $conn->query(($sql2.$row['code']."'"))) 
				    	{ 
				    		$code=explode("/",$row['code']);
				    		if($code[2]!="GG"){
				    		if ($row2 = $result2->fetch_assoc())
				    		 {
				    			if($row2['nb']==0)
				       				{$datatable[]=$row;
				       				 $reply["success"]=TRUE;}
				       		}
				       	}
				       	}

				       	else
				       	{
				       		 $reply["message"]=$conn->error;
							$reply["success"]=FALSE;

				       	}
				    }
				    } else {
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