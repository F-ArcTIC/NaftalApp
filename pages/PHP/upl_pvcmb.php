<?php
$reply= array();


if(isset($_FILES['pvcmb']) )
{ 
	if($_FILES["pvcmb"]["name"] != '')
	{ 
			$uploaddir = 'fichier/PVCMB/';
			
		    $data = explode(".", $_FILES["pvcmb"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['pvcmb']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["pvcmb"]=$targetPath;
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
 $reply["success"]=FALSE;
 $reply["message"]="PV CMB Non inseré !";
}
}
else
{
 $reply["success"]=FALSE;
 $reply["message"]="Champs PDAO vide !";
}



if(isset($_FILES['sl']) )
{ 
	if($_FILES["sl"]["name"] != '')
	{ 
			$uploaddir = 'fichier/FicheS/';
			
		    $data = explode(".", $_FILES["sl"]["name"]);
		     $extension = $data[1];
		     $allowed_extension = array("pdf");
		     if(in_array($extension, $allowed_extension))
		    	{
		          $new_file_name = rand() . '.' . $extension;
		          $targetPath = $uploaddir. $new_file_name;
		 		  $sourcePath = $_FILES['sl']['tmp_name'];			
				  if(move_uploaded_file($sourcePath,$targetPath)) 
				  	{
						//$reply["success"]=TRUE;
						$reply["sl"]=$targetPath;
						$reply["success"]=TRUE;
									
					 }
				  else
					{	$reply["success"]=FALSE;
		                 $reply["message"]=' Fiche de suivi Non chargé !'."\r\n";

					 }

				}
			else
				{
					$reply["success"]=FALSE;
		           $reply["message"]='Extension de Fiche de suivi Non valide, Veuillez ajouter un pdf !!'."\r\n"."\r\n";
		        }
	}else
{
 $reply["success"]=FALSE;
 $reply["message"]="Fiche de suivi Non inseré !";
}
}
else
{
 $reply["success"]=FALSE;
 $reply["message"]="Champs Fiche de suivi vide !";
}
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);	

?>