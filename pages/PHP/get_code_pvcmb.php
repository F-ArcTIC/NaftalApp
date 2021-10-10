
<?php
session_start();
require_once("../../cnx.php");
$sql = "SELECT code FROM `appel_doffre` where `etape`='CVT' ";
$sql3 = "SELECT code FROM `préqualif`  where `etape`='CVT'";
$sql4 = "SELECT code FROM `gré_a_gré` where `etape`='initiale'";
$sql2="select count(*) as nb from pv_cmb where code ='";

$reply=array();
$datatable=array();
//echo $result ;

	
		
					if ($result = $conn->query(($sql))) {
				    while ($row = $result->fetch_assoc()) {
				    	if ($result2 = $conn->query(($sql2.$row['code']."'"))) 
				    	{
				    		if ($row2 = $result2->fetch_assoc())
				    		 {
				    			if($row2['nb']==0)
				       				{$datatable[]=$row;
				       				 $reply["success"]=TRUE;}
				       		}
				       	}
				       			}
				       	
				       	}

				       	else
				       	{
				       		 $reply["message"]=$conn->error;
							$reply["success"]=FALSE;

				       	}
				    
				    if ($result = $conn->query(($sql3))) {
				    while ($row = $result->fetch_assoc()) {
				    	if ($result2 = $conn->query(($sql2.$row['code']."'"))) 
				    	{
				    		if ($row2 = $result2->fetch_assoc())
				    		 {
				    			if($row2['nb']==0)
				       				{$datatable[]=$row;
				       				 $reply["success"]=TRUE;}
				       		}
				       	}
				       			}
				       	
				       	}

				       	else
				       	{
				       		 $reply["message"]=$conn->error;
							$reply["success"]=FALSE;

				       	}
				   
				   if ($result = $conn->query(($sql4))) {
				    while ($row = $result->fetch_assoc()) {
				    	if ($result2 = $conn->query(($sql2.$row['code']."'"))) 
				    	{
				    		if ($row2 = $result2->fetch_assoc())
				    		 {
				    			if($row2['nb']==0)
				       				{$datatable[]=$row;
				       				 $reply["success"]=TRUE;}
				       		}
				       	}
				       			}
				       	
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