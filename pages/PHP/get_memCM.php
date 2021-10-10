
<?php
session_start();
require_once("../../cnx.php");
$sql = "SELECT CONCAT(nom_mem,' ',prenom_mem) as mem, id_mem from membre where poste in('Chef de section','Ingenieur Technique','Cadre d\'etude','Chargé d\'etude') and etat = '1' and Districte ='";

$reply=array();
$datatable=array();
//echo $result ;

	
		if(isset($_POST['dist']))
					{if ($result = $conn->query(($sql).$_POST['dist']."'")) {
				    while ($row = $result->fetch_assoc()) {
				    	
				       				$datatable[]=$row;
				       				 $reply["success"]=TRUE;
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
			
		
}	else
				       	{
				       		 $reply["message"]="Dist vide";
							$reply["success"]=FALSE;

				       	}
				    
	

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>