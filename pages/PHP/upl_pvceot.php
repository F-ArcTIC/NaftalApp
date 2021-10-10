<?php
$reply= array();


if(isset($_FILES['pvceot']) )
{ 
	if($_FILES["pvceot"]["name"] != '')
	{ 
			$uploaddir = 'fichier/PVCEOT/';
			
		    $data = explode(".", $_FILES["pvceot"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['pvceot']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["pvceot"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]='PV CEOT Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension du fichier PV CEOT Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=FALSE;
 $reply["message"]="PV CEOT Non inseré !";
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