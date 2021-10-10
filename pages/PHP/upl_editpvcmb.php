<?php
$reply= array();


if(isset($_FILES['mpvcmb']) )
{ 
	if($_FILES["mpvcmb"]["name"] != '')
	{ 
			$uploaddir = 'fichier/PVCMB/';
			
		    $data = explode(".", $_FILES["mpvcmb"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['mpvcmb']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["mpvcmb"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]='PV CMB Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension du fichier PV CMB Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=TRUE;
}
}

if(isset($_FILES['msl']) )
{ 
	if($_FILES["msl"]["name"] != '')
	{ 
			$uploaddir = 'fichier/FicheS/';
			
		    $data = explode(".", $_FILES["msl"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['msl']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["sl"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]='Fiche de suivi Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension du Fiche de suivi Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=TRUE;
}
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);	

?>