<?php
session_start();
require_once("../../cnx.php");

$sql ="INSERT INTO `pv_tech` (`id_pv`, `num_pv`, `date_pv`, `file_pv`, `code`) VALUES (NULL, '";//15', '2019-05-08', 'a.com', '0', NULL, 'world')";
$query="UPDATE `appel_doffre` SET `etape` = 'COP technique' ,  `nb_cc`="; 

if(isset($_POST["numpv"]))
{	$num_pv=$_POST["numpv"];	
	if(isset($_POST["datepv"]))
	{	$date_pv=$_POST["datepv"];
		if(isset($_POST["file_pv"]))
			{	$file_pv=$_POST["file_pv"];
				
					if(isset($_POST["code"]))
					{	$code=$_POST["code"];
						if(isset($_POST["nbcc"]))
					{if(isset($_POST["nboff"]))
					{

						if($conn->query($sql.$num_pv."','".$date_pv."','".$file_pv."','".$code."')")===TRUE)
								{ $reply["success"]=TRUE;
							
							if ($conn->query($query.$_POST["nbcc"].", `nb_offre`=".$_POST["nboff"]." where  `code`='".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                
						    

						}else 
							{
								$reply["success"]=FALSE;
						      	$reply["message"]=$conn->error;
						    }

}else
					{
						$reply["success"]=FALSE;
	 				    $reply["message"]="nb_off n'est pas inseré!";	
					}
				}else
					{
						$reply["success"]=FALSE;
	 				    $reply["message"]="nb_cc n'est pas inseré!";	
					}
					}
					else
					{
						$reply["success"]=FALSE;
	 				    $reply["message"]="Code n'est pas inseré!";	
					}
				
			}
		else
			{
				$reply["success"]=FALSE;
			    $reply["message"]="fichier PV n'est pas inseré!";	
			}
	}
	else
		{
			$reply["success"]=FALSE;
		    $reply["message"]="Date PV n'est pas inseré!";	
		}
}
else
	{
		$reply["success"]=FALSE;
	    $reply["message"]="Num PV n'est pas inseré!";	
	}	


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();