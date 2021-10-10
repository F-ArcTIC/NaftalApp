<?php
session_start();
require_once("../../cnx.php");

$sql ="INSERT INTO `pv_cmb` (`id_pv`, `num_pv`, `date_pv`, `file_pv`, `accord`, `num_visa`, `type_visa`, `code`) VALUES (NULL, '";//15', '2019-05-08', 'a.com', '0', NULL, 'world')";
$query="UPDATE `appel_doffre` SET  "; 
$query2="UPDATE `préqualif` SET "; 
$query3="UPDATE `gré_a_gré` SET "; 
$sqlnot="INSERT INTO `notification` (`id_not`,`date`, `heure`, `time`, `expediteur`, `distinataire`, `type`, `contenu`, `lu`, `code`) VALUES (NULL, '";


$sqlop="Select `id_operateur` from `appel_doffre` where code='";

if ($res = $conn->query(($sqlop).$_POST["code"]."'"))
{
    while ($r = $res->fetch_assoc())
     {
     	$oper=$r["id_operateur"];
     }
 }
if(isset($_POST["numpv"]))
{	$num_pv=$_POST["numpv"];	
	if(isset($_POST["datepv"]))
	{	$date_pv=$_POST["datepv"];
		if(isset($_POST["file_pv"]))
			{	$file_pv=$_POST["file_pv"];
				if(isset($_POST["accord"]))
				{    $accord=$_POST["accord"];
			if($accord==1) $typevisa=$_POST["typevisa"]; else $typevisa=NULL;
					if(isset($_POST["code"]))
					{	$code=$_POST["code"];
						if(isset($_POST["num_visa"]))
							{	$num_visa=$_POST["num_visa"];
						}
						else
							{ $num_visa=NULL;}

						if($conn->query($sql.$num_pv."','".$date_pv."','".$file_pv."','".$accord."','".$num_visa."',\"".$typevisa."\",'".$code."')")===TRUE)
								{ $reply["success"]=TRUE;
							if($accord==1){
							if ($conn->query($query."`etape` = 'CMB' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                if ($conn->query($query2."`etape` = 'CMB' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                if ($conn->query($query3."`etape` = 'CMB' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }

						                $jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
								$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
								$date = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");		
								$h=date("H")+1;  $heure = $h.date(":i");
								$time=time();
								 		if($conn->query($sqlnot.$date."','".$heure."','".$time."','".$_SESSION['id_user']."','".$oper. "','1','Demande de publication','0',\"".$_POST["code"]."\")")===FALSE)
													{
														$reply["notif"]=FALSE;
											   		    $reply["messagen"]=$conn->error;
													}
						    }else {
						    	if ($conn->query($query."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                if ($conn->query($query2."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message"]=$conn->error;
						                }
						                if ($conn->query($query3."`etat` = 'Ajourné' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
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

						    if(isset($_POST["fs"]))
				{   
						    if ($conn->query($query."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message1"]=$conn->error;
						                }
						                if ($conn->query($query2."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message1"]=$conn->error;
						                }
						                if ($conn->query($query3."`fiche_suivi` = '".$_POST["fs"]."' WHERE `code` = '".$_POST["code"]."'") === FALSE) 
						                {
						                    $reply["success"]=FALSE;
						                    $reply["message1"]=$conn->error;
						                }
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