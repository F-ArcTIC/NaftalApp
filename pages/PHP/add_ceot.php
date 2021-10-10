
<?php
require_once("../../../cnx.php");

$sql = "INSERT INTO `commission` (`id_c`, `type`, `num_dec`, `date_dec`, `code`, `district`, `date_renouv`) VALUES (NULL, '"; 
$sql1="select MAX(id_c)id_c from commission where code='";
$sql3="INSERT INTO `commission-membre` (`id_cm`, `id_c`, `id_m`, `poste`, `date_deb`, `date_fin`) VALUES (NULL, ";



$reply= array();

if(isset($_POST['type']) )
 {
  	if(isset($_POST['numD']) ) 
  	{
	    if(isset($_POST['dateD']) )
	    {      
	   		if(isset($_POST['code']) )
	   		{
	   			if($conn->query($sql.$_POST['type']."','".$_POST['numD']."','".$_POST['dateD']."','".$_POST['code']."',NULL,NULL)")===TRUE)
				            {$reply["success"]=TRUE;
				              if ($result = $conn->query(($sql1.$_POST['code']."' and type='".$_POST['type']."'"))) 
				               {
	  								if ($id = $result->fetch_assoc()) 
	  								{ 
	  									
	  									if(isset($_POST['Juriste']))
	  									{
							          			 		if($conn->query($sql3.$id['id_c'].",".$_POST['Juriste'].",'Juriste' ,NULL,NULL)")===FALSE)
							          			 		{
							          			 			$reply["success"]=FALSE;
							          			 			$reply["message1"]="jur";
										            	    $reply["message"]=$conn->error;
							          			 		}
							          			 	
	  									}
	  									else
	  									{
	  										$reply["success"]=FALSE;
								            $reply["message"]="Juriste non recu!";
	  									}

	  									if(isset($_POST['Financier']))
	  									{
							          			 		if($conn->query($sql3.$id['id_c'].",".$_POST['Financier'].",'Financier' ,NULL,NULL)")===FALSE)
							          			 		{
							          			 			$reply["success"]=FALSE;
										            	    $reply["message"]=$conn->error;
							          			 		}
							          			 	
							          			 
							          			 
	  									}
	  									else
	  									{
	  										$reply["success"]=FALSE;
								            $reply["message"]="Financier non recu!";
	  									}

	  									if(isset($_POST['President']))
	  									{
	  										
							          			 		if($conn->query($sql3.$id['id_c'].",".$_POST['President'].",'President' ,NULL,NULL)")===FALSE)
							          			 		{
							          			 			$reply["success"]=FALSE;
										            	    $reply["message"]=$conn->error;
							          			 	}
	  									}
	  									else
	  									{
	  										$reply["success"]=FALSE;
								            $reply["message"]="president non recu!";
	  									}


	  									if(isset($_POST['Membres']))
	  									{
	  										$mem=$_POST['Membres'];
							     			foreach($mem as $m)
							     			{
	  										
							     			
							          			 		if($conn->query($sql3.$id['id_c'].",".$m.",'membre',NULL, NULL)")===FALSE)
							          			 		{
							          			 			$reply["success"]=FALSE;
										            	    $reply["message"]=$conn->error;
							          			 		}
							          			 	
								            }
	  									}
	  									else
	  									{
	  										$reply["success"]=FALSE;
								            $reply["message"]="Membres non recu!";
	  									}
	  								}
	  							}
				              else 
				                {
				                	$reply["success"]=FALSE;
				            	    $reply["message"]=$conn->error;
				                }

	      	                }
				else 
				{
				    $reply["success"]=FALSE;
				    $reply["message"]=$conn->error;
				    $reply["message1"]="sql";
				}


	    	}
	    	else
			{
				$reply["success"]=FALSE;
				$reply["message"]="code non recu!";
			}
	   	}
	   	else
		{
			$reply["success"]=FALSE;
			$reply["message"]="date non recu!";
		}
   }
   else
	{
		$reply["success"]=FALSE;
		$reply["message"]="num non recu!";
	}
}
else
{
	$reply["success"]=FALSE;
	$reply["message"]="type non recu!";
}

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>
