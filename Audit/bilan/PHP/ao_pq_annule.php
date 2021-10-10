<?php
require_once("../../../cnx.php");

 $sql1="SELECT date_etat as date ,code FROM `appel_doffre` WHERE etat='Ajourné'";
 $sql2="SELECT date_etat as date ,code FROM `préqualif` WHERE etat='Ajourné'";


$reply=array();
$br=array();
$dec=array();
$total=array();
$br['centre']="Structures Branche";
$dec['centre']="Structures Décentralisées";
$total['centre']="Total";

if(isset($_GET["mois"]))
	if(isset($_GET["an"]))
	{ $reply["success"]=TRUE;
		$mois=$_GET["mois"];
		$an=$_GET["an"];
		$datatable=array();

		if ($result1 = $conn->query($sql1)) 
		{
			$br['Nb_ao']=0;
			$dec['Nb_ao']=0;
			while ($row = $result1->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois) 
					{
						$tab1=preg_split("#\/#",$row['code']);
						if($tab1[4]=="DIR")
							$br['Nb_ao']++;
						else
							$dec['Nb_ao']++;
					}
			}
			$total['Nb_ao']=$dec['Nb_ao']+$br['Nb_ao'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}


if ($result2 = $conn->query($sql2)) 
		{
			$br['Nb_pq']=0;
			$dec['Nb_pq']=0;
			while ($row = $result2->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois) 
					{
						$tab1=preg_split("#\/#",$row['code']);
						if($tab1[4]=="DIR")
							$br['Nb_pq']++;
						else
							$dec['Nb_pq']++;
					}
			}
			$total['Nb_pq']=$dec['Nb_pq']+$br['Nb_pq'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}


$datatable[]=$br;
$datatable[]=$dec;
$datatable[]=$total;
$reply["data"]=$datatable;
}
	else 
		$reply["success"]=FALSE;
else
	$reply["success"]=FALSE;





header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>