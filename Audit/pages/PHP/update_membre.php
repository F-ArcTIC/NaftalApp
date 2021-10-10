<?php
//lors un ajout dans la table mem_commission
require_once("../../../cnx.php");
 

$reply=array();

$sql2="SELECT count(*) as nb from `commission-membre` where id_m = ";
$sql3="UPDATE membre SET activation = ? WHERE nom_mem = ? and prenom_mem= ?";

 if(isset($_POST['nom_mem']) ) { 
 		 if(isset($_POST['prenom_mem']) ) { 

            $param1=array($_GET['nom_mem'] ,$_GET['prenom_mem']);  
            $result1 = $conn->prepare($sql1);         
			if ($result1->execute($param1)) 
			{
				 if($id=$result1->fetch(PDO::FETCH_ASSOC))
				 	{
				 		if ($result2= $conn->query($sql2.$id['id_mem']))
 							{
        					if($nb=$result2->fetch(PDO::FETCH_ASSOC))
       							 {
								 if ($nb['nb'] > 0)
									  $param2=array(1,$_GET['nom_mem'] ,$_GET['prenom_mem']);  	
								 else 
								 	  $param2=array(0,$_GET['nom_mem'] ,$_GET['prenom_mem']);  
								 $result3 = $conn->prepare($sql3);         
	                   			 if ($result3->execute($param2)) 
	                   				$reply["success"]=TRUE;
	                   			 else {
		   							$reply["success"]=FALSE;
		     						$reply["message"]=$conn->errorInfo();
										}
								}
							}
					}
					else {
	   				$reply["success"]=FALSE;
	     			$reply["message"]=$conn->errorInfo();
					}

			}
			else {
	   		 $reply["success"]=FALSE;
	   		 $reply["message"]=$conn->errorInfo();
			}
    		
                     
       }
       else {
	    $reply["success"]=FALSE;
	    $reply["message"]=$conn->errorInfo();
		}

    } 
    else {
    $reply["success"]=FALSE;
    $reply["message"]=$conn->errorInfo();

}

header('Content-type: application/json');
echo json_encode($reply);
exit();
?>