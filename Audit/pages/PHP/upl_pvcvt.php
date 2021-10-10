<?php
$reply= array();


if(isset($_FILES['pvcvt']) )
{ 
	if($_FILES["pvcvt"]["name"] != '')
	{ 
			$uploaddir = 'fichier/PVCVT/';
			
		    $data = explode(".", $_FILES["pvcvt"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['pvcvt']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["pvcvt"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]='PV CVT Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension du fichier PV CVT Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=FALSE;
 $reply["message"]="PV CVT Non inseré !";
}
}
else
{
 $reply["success"]=FALSE;
 $reply["message"]="Champs PDAO vide !";
}
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);	

?>