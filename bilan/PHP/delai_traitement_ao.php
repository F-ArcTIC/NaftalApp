<?php
require_once("../../../cnx.php");


$sql1="SELECT code, date_signature_contract FROM `appel_doffre` WHERE date_signature_contract is not NULL";
$sql2='select date_pv from pv_cmb where type_visa="Lancement d\'appel d\'offres" and code="';
$sql3="SELECT `date_demande_pub` from placard where nature in ('Insertion d'Appel d'offre ouvert','Insertion de Consultaion selective','Insertion d\'Appel d\'offre restreint') and code ='";
$sql4='select * from publication where num_p in (select num_p from placard where nature in("'."Insertion d'Appel d'offre ouvert".'","'."Insertion d'Appel d'offre restreint".'","'."Insertion de Consultation selective".'") and  code= "' ;
$sql5='select date_pv from pv_tech where code="';
$sql6='select date_pv from pv_evaluation where code="';
$sql7='select date_pv from pv_fin where code="';
$sql8='select date_pv from pv_cmb where type_visa="Attribution definitive" and code="';


$ligne1['delai']="";$ligne1['nb_marché1']='Structures Branche';$ligne1['nb_jour1']="Structures Branche";$ligne1['moyenne1']="Structures Branche";$ligne1['nb_marché2']="Structures Décentralisées";$ligne1['nb_jour2']="Structures Décentralisées";$ligne1['moyenne2']="Structures Décentralisées";

$nb_marché_branche=0; $nb_marché_dec=0;
$ligne2['nb_jour1']=0; $ligne2['nb_jour2']=0;
$ligne3['nb_jour1']=0; $ligne3['nb_jour2']=0;
$ligne4['nb_jour1']=0; $ligne4['nb_jour2']=0;
$ligne5['nb_jour1']=0; $ligne5['nb_jour2']=0;
$ligne6['nb_jour1']=0; $ligne6['nb_jour2']=0;
$ligne7['nb_jour1']=0; $ligne7['nb_jour2']=0;
$ligne8['nb_jour1']=0; $ligne8['nb_jour2']=0;
$ligne9['nb_jour1']=0; $ligne9['nb_jour2']=0;
$ligne10['nb_jour1']=0; $ligne10['nb_jour2']=0;
$ligne11['nb_jour1']=0; $ligne11['nb_jour2']=0;
$err=0;

$ligne2['delai']='Date de visa du lancement et date de demande de publication';
$ligne3['delai']='Date demande de publication et date de publication';
$ligne4['delai']='Delai de retrait';
$ligne5['delai']='Date de clôture de retrait et date de la COP technique';
$ligne6['delai']='Date de la COP technique et la 1er date CEOT';
$ligne7['delai']='La premiere et la derniere date CEOT';
$ligne8['delai']='La derniere date CEOT et date COP financiere';
$ligne9['delai']='Date COP financiere et date d\'attribution definitive';
$ligne10['delai']='Date d\'attribution definitive et date de signature de contrat';
$ligne11['delai']='Delai de traitement des appels d\'offres';

if(isset($_GET["mois"]))
	if(isset($_GET["an"]))
	{ $reply["success"]=TRUE;
		$mois=$_GET["mois"];
		$an=$_GET["an"];
		$datatable=array();

		if ($result1 = $conn->query($sql1)) 
		{
			while($row = $result1->fetch_assoc())
			{
				$tab=preg_split("#\-#",$row['date_signature_contract']);
				if($tab[0]==$an and $tab[1]==$mois) 
					{ 
						 if ($result2 = $conn->query($sql2.$row['code'].'"')) 
								{if($row2 = $result2->fetch_assoc()) $date_visa=$row2['date_pv'];
								else $err=1;}
				        else
				          	{
				                $reply["success"]=FALSE;
				                $reply["message"]= $conn->error;
				            }
				            $date_dem=null;
				         if ($result3 = $conn->query($sql3.$row['code'].'"')) 
								{if($row3 = $result3->fetch_assoc()) $date_dem=$row3['date_demande_pub'];
								else $err=1;}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }
				        $dif2 = ceil(abs(strtotime($date_dem) - strtotime($date_visa)) / 86400);
$date_pub=null;
$date_cloture=null;
				         if ($result4 = $conn->query($sql4.$row['code'].'"')) 
							{
								if($row4 = $result4->fetch_assoc()) {$date_pub=$row4['date_pub']; $date_cloture=$row4['date_cloture'];}
								else $err=1;
								while($row4 = $result4->fetch_assoc()) $date_cloture=$row4['date_cloture'];
							}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }

				         if ($result5 = $conn->query($sql5.$row['code'].'"')) 
								{if($row5 = $result5->fetch_assoc()) $date_tech=$row5['date_pv'];
								else $err=1;}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }

				         if ($result6 = $conn->query($sql6.$row['code'].'"')) 
							{	if($row6 = $result6->fetch_assoc()) {$date_ceot_1=$row6['date_pv']; $date_ceot_2=$row6['date_pv'];}
								else $err=1;
								while($row6 = $result6->fetch_assoc()) $date_ceot_2=$row6['date_pv'];
							}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }

				         if ($result7 = $conn->query($sql7.$row['code'].'"')) 
								{if($row7 = $result7->fetch_assoc()) $date_fin=$row7['date_pv'];
								else $err=1;}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }

				         if ($result8 = $conn->query($sql8.$row['code'].'"')) 
								{if($row8 = $result8->fetch_assoc()) $date_attr=$row8['date_pv'];
								else $err=1;}
				        else
				            {
				                 $reply["success"]=FALSE;
				                 $reply["message"]= $conn->error;
				            }

				        if($err==0)
				        {
				        $dif2 = ceil(abs(strtotime($date_dem) - strtotime($date_visa)) / 86400);
				        $dif3 = ceil(abs(strtotime($date_pub) - strtotime($date_dem)) / 86400);
				        $dif4=ceil(abs(strtotime($date_cloture) - strtotime($date_pub)) / 86400);
				        $dif5=ceil(abs(strtotime($date_tech) - strtotime($date_cloture)) / 86400);
				        $dif6=ceil(abs(strtotime($date_ceot_1) - strtotime($date_tech)) / 86400);
				        $dif7=ceil(abs(strtotime($date_ceot_2) - strtotime($date_ceot_1)) / 86400);
				        $dif8=ceil(abs(strtotime($date_fin) - strtotime($date_ceot_2)) / 86400);
				        $dif9=ceil(abs(strtotime($date_attr) - strtotime($date_fin)) / 86400);
				        $dif10=ceil(abs(strtotime($row['date_signature_contract']) - strtotime($date_attr)) / 86400);

						$tab1=preg_split("#\/#",$row['code']); 
						if($tab1[4]=="DIR")
							{
								$nb_marché_branche++;

				                $ligne2['nb_jour1']=$ligne2['nb_jour1']+$dif2;
				                $ligne3['nb_jour1']=$ligne3['nb_jour1']+$dif3;
				                $ligne4['nb_jour1']=$ligne4['nb_jour1']+$dif4;
				                $ligne5['nb_jour1']=$ligne5['nb_jour1']+$dif5;
				                $ligne6['nb_jour1']=$ligne6['nb_jour1']+$dif6;
				                $ligne7['nb_jour1']=$ligne7['nb_jour1']+$dif7;
				                $ligne8['nb_jour1']=$ligne8['nb_jour1']+$dif8;
				                $ligne9['nb_jour1']=$ligne9['nb_jour1']+$dif9;
				                $ligne10['nb_jour1']=$ligne10['nb_jour1']+$dif10;
							}
						else
							{
								 $nb_marché_dec++;
								$ligne2['nb_jour2']=$ligne2['nb_jour2']+$dif2;
				                $ligne3['nb_jour2']=$ligne3['nb_jour2']+$dif3;
				                $ligne4['nb_jour2']=$ligne4['nb_jour2']+$dif4;
				                $ligne5['nb_jour2']=$ligne5['nb_jour2']+$dif5;
				                $ligne6['nb_jour2']=$ligne6['nb_jour2']+$dif6;
				                $ligne7['nb_jour2']=$ligne7['nb_jour2']+$dif7;
				                $ligne8['nb_jour2']=$ligne8['nb_jour2']+$dif8;
				                $ligne9['nb_jour2']=$ligne9['nb_jour2']+$dif9;
				                $ligne10['nb_jour2']=$ligne10['nb_jour2']+$dif10;
							}
						}
						else
						{
							$reply["success"]=FALSE;
							$reply["message"]=$conn->error;
							break;
						}
					}
			}

			$ligne2['nb_marché1']=$nb_marché_branche; $ligne2['nb_marché2']=$nb_marché_dec;
			$ligne3['nb_marché1']=$nb_marché_branche; $ligne3['nb_marché2']=$nb_marché_dec;
			$ligne4['nb_marché1']=$nb_marché_branche; $ligne4['nb_marché2']=$nb_marché_dec;
			$ligne5['nb_marché1']=$nb_marché_branche; $ligne5['nb_marché2']=$nb_marché_dec;
			$ligne6['nb_marché1']=$nb_marché_branche; $ligne6['nb_marché2']=$nb_marché_dec;
			$ligne7['nb_marché1']=$nb_marché_branche; $ligne7['nb_marché2']=$nb_marché_dec;
			$ligne8['nb_marché1']=$nb_marché_branche; $ligne8['nb_marché2']=$nb_marché_dec;
			$ligne9['nb_marché1']=$nb_marché_branche; $ligne9['nb_marché2']=$nb_marché_dec;
			$ligne10['nb_marché1']=$nb_marché_branche; $ligne10['nb_marché2']=$nb_marché_dec;
			$ligne11['nb_marché1']=$nb_marché_branche; $ligne11['nb_marché2']=$nb_marché_dec;

			$ligne11['nb_jour1']=$ligne2['nb_jour1']+$ligne3['nb_jour1']+$ligne4['nb_jour1']+$ligne5['nb_jour1']+$ligne6['nb_jour1']+$ligne7['nb_jour1']+$ligne8['nb_jour1']+$ligne9['nb_jour1']+$ligne10['nb_jour1'];
			$ligne11['nb_jour2']=$ligne2['nb_jour2']+$ligne3['nb_jour2']+$ligne4['nb_jour2']+$ligne5['nb_jour2']+$ligne6['nb_jour2']+$ligne7['nb_jour2']+$ligne8['nb_jour2']+$ligne9['nb_jour2']+$ligne10['nb_jour2'];
if($nb_marché_dec != 0 and $nb_marché_branche != 0)
{
			$ligne2['moyenne1']=intdiv($ligne2['nb_jour1'], $ligne2['nb_marché1']); $ligne2['moyenne2']=intdiv($ligne2['nb_jour2'], $ligne2['nb_marché2']);
			$ligne3['moyenne1']=intdiv($ligne3['nb_jour1'], $ligne3['nb_marché1']); $ligne3['moyenne2']=intdiv($ligne3['nb_jour2'], $ligne3['nb_marché2']);
			$ligne4['moyenne1']=intdiv($ligne4['nb_jour1'], $ligne4['nb_marché1']); $ligne4['moyenne2']=intdiv($ligne4['nb_jour2'], $ligne4['nb_marché2']);
			$ligne5['moyenne1']=intdiv($ligne5['nb_jour1'], $ligne5['nb_marché1']); $ligne5['moyenne2']=intdiv($ligne5['nb_jour2'], $ligne5['nb_marché2']);
			$ligne6['moyenne1']=intdiv($ligne6['nb_jour1'], $ligne6['nb_marché1']); $ligne6['moyenne2']=intdiv($ligne6['nb_jour2'], $ligne6['nb_marché2']);
			$ligne7['moyenne1']=intdiv($ligne7['nb_jour1'], $ligne7['nb_marché1']); $ligne7['moyenne2']=intdiv($ligne7['nb_jour2'], $ligne7['nb_marché2']);
			$ligne8['moyenne1']=intdiv($ligne8['nb_jour1'], $ligne8['nb_marché1']); $ligne8['moyenne2']=intdiv($ligne8['nb_jour2'], $ligne8['nb_marché2']);
			$ligne9['moyenne1']=intdiv($ligne9['nb_jour1'], $ligne9['nb_marché1']); $ligne9['moyenne2']=intdiv($ligne9['nb_jour2'], $ligne9['nb_marché2']);
			$ligne10['moyenne1']=intdiv($ligne10['nb_jour1'], $ligne10['nb_marché1']); $ligne10['moyenne2']=intdiv($ligne10['nb_jour2'], $ligne10['nb_marché2']);
			$ligne11['moyenne1']=intdiv($ligne11['nb_jour1'], $ligne11['nb_marché1']); $ligne11['moyenne2']=intdiv($ligne11['nb_jour2'], $ligne11['nb_marché2']);
}
else
{	
			$ligne2['moyenne1']=0; $ligne2['moyenne2']=0;
			$ligne3['moyenne1']=0 ;$ligne3['moyenne2']=0;
			$ligne4['moyenne1']=0 ;$ligne4['moyenne2']=0;
			$ligne5['moyenne1']=0 ;$ligne5['moyenne2']=0;
			$ligne6['moyenne1']=0 ;$ligne6['moyenne2']=0;
			$ligne7['moyenne1']=0 ;$ligne7['moyenne2']=0;
			$ligne8['moyenne1']=0 ;$ligne8['moyenne2']=0;
			$ligne9['moyenne1']=0 ;$ligne9['moyenne2']=0;
			$ligne10['moyenne1']=0 ;$ligne10['moyenne2']=0;
			$ligne11['moyenne1']=0 ;$ligne11['moyenne2']=0;

}
			$datatable[]=$ligne2;
			$datatable[]=$ligne3;
			$datatable[]=$ligne4;
			$datatable[]=$ligne5;
			$datatable[]=$ligne6;
			$datatable[]=$ligne7;
			$datatable[]=$ligne8;
			$datatable[]=$ligne9;
			$datatable[]=$ligne10;
			$datatable[]=$ligne11;

			$reply["data"]=$datatable;
		}
		else
		{
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