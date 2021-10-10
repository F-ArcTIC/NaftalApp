
<?php
session_start();
require_once("../../../cnx.php");
$sql = "SELECT * FROM `projet`";
$sql2="DELETE FROM `projet` WHERE `id_projet` =";
$sql5="INSERT INTO `gré_a_gré` (`id_g`, `code`, `objet`, `nature`, `type`, `projet`, `id_operateur`, `nom_cocantractant`, `montant`, `date_signature`, `cc`, `etape`, `etat`) VALUES (NULL, '";
$sql6="INSERT INTO `préqualif` (`id_pq`, `code`, `objet`, `projet`, `type`, `id_operateur`, `etat`, `date_etat`, `motif`, `cc`, `etape`) VALUES (NULL, '";
$sql7="INSERT INTO `appel_doffre` (`id_ao`, `code`, `objet`, `mode`, `type`, `nature`, `id_operateur`, `etape`, `nb_offre`, `nb_cc`, `montant`, `soum_moins_disant`, `etat`, `date_etat`, `motif`, `pdao`,  `fiche_suivi`, `date_signature_contract`, `cc`) VALUES (NULL, '";


$reply=array();
$datatable=array();
//echo $result ;
$reply["success"]=TRUE;
$date=date("y");
$nb=0;
$nbg=0;
$nbp=0;
$query="select count(*) as nb from appel_doffre where code LIKE '%/".$date."%'";
if ($result2 = $conn->query(($query))) 
  if ($row2 = $result2->fetch_assoc())
                 {
              { 
               $nb=$row2['nb'];
                 
                }
              }else{
                                      $reply["message1"]=$conn->error;
                }
                $query3="select count(*) as nb from gré_a_gré where code LIKE '%/".$date."%'";
if ($result3 = $conn->query(($query3))) 
  if ($row3 = $result3->fetch_assoc())
                 {
              { 
               $nbg=$row3['nb'];
                 
                }
              }else{
                                      $reply["message1"]=$conn->error;
                }
                                $query4="select count(*) as nb from préqualif where code LIKE '%/".$date."%'";
if ($result4 = $conn->query(($query3))) 
  if ($row4 = $result4->fetch_assoc())
                 {
              { 
               $nbp=$row4['nb'];
                 
                }
              }else{
                                      $reply["message1"]=$conn->error;
                }
		
					if ($result = $conn->query(($sql))) {
				    while ($row = $result->fetch_assoc()) {
				    	if($row['mode']=="Grés a Grés"){
                $code=str_replace("XX", sprintf("%03d", $nbg), $row['code']);
				    	if ($conn->query($sql5.$code."',\"".$row['objet']."\" ,'".$row['nature']."','".$row['type']."','".$row['pdao']."','".$row['id_user']."', NULL, NULL, NULL,'".$row['cahierc']."','initiale', 'En cours')") === FALSE) 
                              {
                              	 $reply["success"]=FALSE;
                                      $reply["message1"]=$conn->error;
                                    }else $nbg ++;
                        }else{
                        if($row['mode']=="Préqualification"){
                                          $code=str_replace("XX",  sprintf("%03d", $nbp), $row['code']);

                    if ($conn->query($sql6.$code."',\"".$row['objet']."\",'".$row['pdao']."','".$row['type']."','".$row['id_user']."', 'En cours', NULL, '','".$row['cahierc']."','initiale')") === FALSE) 
                                    {
                                      $reply["success"]=FALSE;
                                      $reply["message2"]=$conn->error;
                                    }else $nbp ++;

                                }else{
                                                  $code=str_replace("XX",  sprintf("%03d", $nb), $row['code']);

                                    if ($conn->query($sql7.$code."',\"".$row['objet']."\",\"".$row['mode']."\",'".$row['type']."','".$row['nature']."','".$row['id_user']."', 'initiale', NULL, NULL, NULL, '', 'En cours', NULL, NULL, '".$row['pdao']."',  NULL, NULL, '".$row['cahierc']."')") === FALSE) 
                                    { $reply["success"]=FALSE;
                                      $reply["message3"]=$conn->error;
                                    }else $nb ++;
                                }
                            }
                            if($conn->query($sql2.$row['id_projet'])===FALSE)
                        { $reply["success"]=FALSE;
                                      $reply["message"]=$conn->error;
                                    }
                           }
                       }
				       	else
				       	{
				       		 $reply["message"]=$conn->error;
							$reply["success"]=FALSE;

				       	}

				    	
                    
				    

				    /* free result set */
				   
			
		

	

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>