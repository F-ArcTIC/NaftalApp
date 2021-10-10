<?php
require_once("../../../cnx.php");

$sql1="SELECT date_pv, accord, code, type_visa from pv_cmb ";


$gg=array();$lancement=array();$attribution=array();$pq=array();$total=array();

$gg['objet']="Visa recours au gré à gré";
$lancement['objet']="Visa du lancement AO/CS";
$attribution['objet']="Visa d'attribution définitive AO/ CS";
$pq['objet']="Visa de préqualification";
$total['objet']="Total";

$gg['Nb_total_br']=0;$gg['Nb_accord_br']=0;$gg['Nb_refus_br']=0;$gg['Nb_total_dec']=0;$gg['Nb_accord_dec']=0;$gg['Nb_refus_dec']=0;
$lancement['Nb_total_br']=0;$lancement['Nb_accord_br']=0;$lancement['Nb_refus_br']=0;$lancement['Nb_total_dec']=0;$lancement['Nb_accord_dec']=0;$lancement['Nb_refus_dec']=0;
$attribution['Nb_total_br']=0;$attribution['Nb_accord_br']=0;$attribution['Nb_refus_br']=0;$attribution['Nb_total_dec']=0;$attribution['Nb_accord_dec']=0;$attribution['Nb_refus_dec']=0;
$pq['Nb_total_br']=0;$pq['Nb_accord_br']=0;$pq['Nb_refus_br']=0;$pq['Nb_total_dec']=0;$pq['Nb_accord_dec']=0;$pq['Nb_refus_dec']=0;
$reply=array();
if(isset($_GET["mois"]))
	if(isset($_GET["an"]))
	{ $reply["success"]=TRUE;
		$mois=$_GET["mois"];
		$an=$_GET["an"];
		$datatable=array();


		if ($result1 = $conn->query($sql1)) 
		{

			while ($row = $result1->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date_pv']);
				if($tab[0]==$an and $tab[1]==$mois) 
				{
						$tab1=preg_split("#\/#",$row['code']);
						if($tab1[4]=="DIR")
						{
							if($row['type_visa']=='Recours au gré a gré')
							{
								if($row['accord']==0)
									$gg['Nb_refus_br']++;
								else
									$gg['Nb_accord_br']++;
							}
							if($row['type_visa']=="Lancement d'appel d'offres")
							{	
								if($row['accord']==0)
									$lancement['Nb_refus_br']++;
								else
									$lancement['Nb_accord_br']++;
								
							}
							if($row['type_visa']=='Attribution définitive')
							{	
								if($row['accord']==0)
									$attribution['Nb_refus_br']++;
								else
									$attribution['Nb_accord_br']++;
							}
							if($row['type_visa']=='Lancement de pré-qualification')
							{
								if($row['accord']==0)
									$pq['Nb_refus_br']++;
								else
									$pq['Nb_accord_br']++;
							}
						}
						else
						{
							if($row['type_visa']=='Recours au gré a gré')
							{
								if($row['accord']==0)
									$gg['Nb_refus_dec']++;
								else
									$gg['Nb_accord_dec']++;
							}
							if($row['type_visa']=="Lancement d'appel d'offres")
							{	
								if($row['accord']==0)
									$lancement['Nb_refus_dec']++;
								else
									$lancement['Nb_accord_dec']++;
								
							}
							if($row['type_visa']=='Attribution définitive')
							{	
								if($row['accord']==0)
									$attribution['Nb_refus_dec']++;
								else
									$attribution['Nb_accord_dec']++;
							}
							if($row['type_visa']=='Lancement de pré-qualification')
							{
								if($row['accord']==0)
									$pq['Nb_refus_dec']++;
								else
									$pq['Nb_accord_dec']++;
							}

						}
				}
			}
 $gg['Nb_total_br']=$gg['Nb_accord_br']+$gg['Nb_refus_br'];  $gg['Nb_total_dec']=$gg['Nb_accord_dec']+$gg['Nb_refus_dec'];
$lancement['Nb_total_br']=$lancement['Nb_accord_br']+$lancement['Nb_refus_br'];  $lancement['Nb_total_dec']=$lancement['Nb_accord_dec']+$lancement['Nb_refus_dec'];
$attribution['Nb_total_br']=$attribution['Nb_accord_br']+$attribution['Nb_refus_br'];  $attribution['Nb_total_dec']=$attribution['Nb_accord_dec']+$attribution['Nb_refus_dec'];
   $pq['Nb_total_br']=$pq['Nb_accord_br']+$pq['Nb_refus_br'];  $pq['Nb_total_dec']=$pq['Nb_accord_dec']+$pq['Nb_refus_dec'];

   $total['Nb_total_br']=$gg['Nb_total_br']+$lancement['Nb_total_br']+$attribution['Nb_total_br']+$pq['Nb_total_br'];
   $total['Nb_accord_br']=$gg['Nb_accord_br']+$lancement['Nb_accord_br']+$attribution['Nb_accord_br']+$pq['Nb_accord_br'];
   $total['Nb_refus_br']=$gg['Nb_refus_br']+$lancement['Nb_refus_br']+$attribution['Nb_refus_br']+$pq['Nb_refus_br'];
   $total['Nb_total_dec']=$gg['Nb_total_dec']+$lancement['Nb_total_dec']+$attribution['Nb_total_dec']+$pq['Nb_total_dec'];
   $total['Nb_accord_dec']=$gg['Nb_accord_dec']+$lancement['Nb_accord_dec']+$attribution['Nb_accord_dec']+$pq['Nb_accord_dec'];
   $total['Nb_refus_dec']=$gg['Nb_refus_dec']+$lancement['Nb_refus_dec']+$attribution['Nb_refus_dec']+$pq['Nb_refus_dec'];

		$datatable[]=$gg;
		$datatable[]=$lancement;
		$datatable[]=$attribution;
		$datatable[]=$pq;
		$datatable[]=$total;
		$reply["data"]=$datatable;	
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}	

	}
	else
	{
		$reply["success"]=FALSE;
		$reply["message"]="l'années non recu!";
	}
else
{
	$reply["success"]=FALSE;
	$reply["message"]="le mois non recu!";
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>

