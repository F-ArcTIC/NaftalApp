<?php
session_start();
require_once("../../../cnx.php");

$sql ="INSERT INTO `pv_cpq`(`id_cpq`, `num_pv`, `date_pv`, `file_pv`, `num_ShorList`, `file_ShortList`, `code`) VALUES (NULL, '";//15', '2019-05-08', 'a.com', '0', NULL, 'world')";
$query="UPDATE `préqualif` SET `etape` = 'CPQ' WHERE `code` = '";

if(isset($_POST["numpv"]))
{	$num_pv=$_POST["numpv"];	
	if(isset($_POST["datepv"]))
	{	$date_pv=$_POST["datepv"];
		if(isset($_POST["file_pv"]))
			{	$file_pv=$_POST["file_pv"];
					if(isset($_POST["code"]))
					{	$code=$_POST["code"];
						
if(isset($_POST["num_sl"]))
	{	$num_sl=$_POST["num_sl"];
		if(isset($_POST["file_sl"]))
			{$file_sl=$_POST["file_sl"];
						if($conn->query($sql.$num_pv."','".$date_pv."','".$file_pv."','".$num_sl."','".$file_sl."','".$code."')")===TRUE)
								{ $reply["success"]=TRUE;
							
							if ($conn->query($query.$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                

						    

						}else 
							{
								$reply["success"]=FALSE;
						      	$reply["message"]=$conn->error;
						    }
}}

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