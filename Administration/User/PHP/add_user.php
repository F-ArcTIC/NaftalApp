<?php
require_once("../../../cnx.php");

$sql = "INSERT INTO `user` (`id_user`, `username`, `password`, `Type`, `districte`, `direction`) VALUES (NULL, '"; 

$reply= array();
$reply["success"]=TRUE;

        if(isset($_POST['Type']) ){
          	if(isset($_POST['Districte']) )
          	{
          		$username=$_POST['Type']."_".$_POST['Districte'];
          		////////////////random password
          		$alpabet="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
          		$pass=array();
          		$len=strlen($alpabet);
          		for($i=0;$i<11;$i++)
          		{
          			$n=rand(0,$len);
          			$pass[]=$alpabet[$n];
          		}
          		$password=implode($pass);
          		///////////////////////////////
          			if($_POST['Type']!="CM")
          			{     
                $username=$_POST['Type'].$_POST['Direction']."_".$_POST['Districte'];     				
          				if(isset($_POST['Direction']) )
          					$query=$sql.$username."','".$password."','".$_POST['Type']."','".$_POST['Districte']."','".$_POST['Direction']."')";
          				 else{
								 $reply["success"]=FALSE;
								 $reply["message"]="Direction non recu!";
							}
					}
					else
						$query=$sql.$username."','".$password."','".$_POST['Type']."','".$_POST['Districte']."',NULL)";

				if($conn->query($query)===FALSE)
				{
					$reply["success"]=FALSE;
				 	$reply["message"]=$conn->error;
				}
       		 }
       		 else
       		 {
			 $reply["success"]=FALSE;
			 $reply["message"]="operateur non recu!";
			}	     
       	 }
       	 else
       	 {
			 $reply["success"]=FALSE;
			 $reply["message"]="Type non recu!";
       	 }	
   

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>
