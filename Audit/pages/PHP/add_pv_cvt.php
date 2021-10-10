<?php
session_start();
require_once("../../../cnx.php");

$sql ="INSERT INTO `pv_cvt` (`id_cvt`, `num_pv`, `date_pv`, `file_pv`, `Recommandation`, `num_visa`, `code`) VALUES (NULL, '";//15', '2019-05-08', 'a.com', '0', NULL, 'world')";
$query="UPDATE `appel_doffre` SET `etape` = 'CVT' WHERE `code` = '"; 
$query2="UPDATE `préqualif` SET `etape` = 'CVT' WHERE `code` = '"; 

if(isset($_POST["numpv"]))
{	$num_pv=$_POST["numpv"];	
	if(isset($_POST["datepv"]))
	{	$date_pv=$_POST["datepv"];
		if(isset($_POST["file_pv"]))
			{	$file_pv=$_POST["file_pv"];
				if(isset($_POST["accord"]))
				{    $accord=$_POST["accord"];
					if(isset($_POST["code"]))
					{	$code=$_POST["code"];
						if(isset($_POST["num_visa"]))
							{	$num_visa=$_POST["num_visa"];}
						else
							{ $num_visa=NULL;}

						if($conn->query($sql.$num_pv."','".$date_pv."','".$file_pv."','".$accord."','".$num_visa."','".$code."')")===TRUE)
								{ $reply["success"]=TRUE;
							if($accord==1){
							if ($conn->query($query.$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                if ($conn->query($query2.$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						    }

						}else 
							{
								$reply["success"]=FALSE;
						      	$reply["message"]=$conn->error;
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
	 			    $reply["message"]="accord n'est pas inseré!";	
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