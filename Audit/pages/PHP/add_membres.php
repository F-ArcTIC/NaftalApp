<?php
session_start();
require_once("../../../cnx.php");

$sql = "INSERT INTO `membre` (`id_mem`, `nom_mem`, `prenom_mem`, `etat`, `Districte`, `poste`) VALUES (NULL, \""; 

$reply= array();

if(isset($_POST['nom_mem']) ) { $nom_mem=$_POST['nom_mem'];
  if(isset($_POST['prenom_mem']) ) {$prenom_mem=$_POST['prenom_mem'];
        if(isset($_POST['Districte']) ){$Districte=$_POST['Districte'];
          	if(isset($_POST['poste']) ) {$poste=$_POST['poste'];
				          			       
				                    if ($conn->query($sql.$nom_mem."\",\"".$prenom_mem."\" ,'1',\"".$Districte."\",\"".$poste."\")") === TRUE) 
				                          $reply["success"]=TRUE;
				                    else 
				                   {
				                     $reply["success"]=FALSE;
				                     $reply["message"]=$conn->error;
				                     
				                     }
       		 }
       		 else{
					 $reply["success"]=FALSE;
					 $reply["message"]="poste";
				     
       		 }	
       	 }
       	 else{
			 $reply["success"]=FALSE;
			 $reply["message"]="Districte";
			
       	 }	
   }
   else{
 		$reply["success"]=FALSE;
 		$reply["message"]="prenom_mem";
		
   }
}
else{
	 $reply["success"]=FALSE;
	 $reply["message"]="nom membre ";
	
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();;
?>
