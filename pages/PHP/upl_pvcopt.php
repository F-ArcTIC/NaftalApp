<?php
$reply= array();


if(isset($_FILES['pvcopt']) )
{ 
	if($_FILES["pvcopt"]["name"] != '')
	{ 
			$uploaddir = 'fichier/PVTECH/';
			
		    $data = explode(".", $_FILES["pvcopt"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['pvcopt']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["pvcopt"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]='PV Technique Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension du fichier PV Technique Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=FALSE;
 $reply["message"]="PV Technique Non inseré !";
}
}
else
{
 $reply["success"]=FALSE;
 $reply["message"]="Champs Fichier vide !";
}
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);	

?>