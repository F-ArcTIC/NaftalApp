<?php
require_once("../../../cnx.php");

$sql1="SELECT code, date_dec, type FROM `commission` WHERE date_dec is not NULL";

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
			$br['cvt']=0;  $br['ceot']=0; $br['cpq']=0;  $dec['cvt']=0; $dec['ceot']=0; $dec['cpq']=0; 
			while($row = $result1->fetch_assoc())
			{
				$tab=preg_split("#\-#",$row['date_dec']);
				if($tab[0]==$an and $tab[1]==$mois) 
					{
						$tab1=preg_split("#\/#",$row['code']);
						if($tab1[4]=="DIR")
							{
								if($row['type']=='CVT')
									$br['cvt']++;
								if($row['type']=='CEOT')
									$br['ceot']++;
								if($row['type']=='PQ')
									$br['cpq']++;
							}
						else
							{
								if($row['type']=='CVT')
									$dec['cvt']++;
								if($row['type']=='CEOT')
									$dec['ceot']++;
								if($row['type']=='PQ')
									$dec['cpq']++;
							}
					}
			}
			$total['cvt']=$br['cvt']+$dec['cvt'];
			$total['ceot']=$br['ceot']+$dec['ceot'];
			$total['cpq']=$br['cpq']+$dec['cpq'];

			$datatable[]=$br;
			$datatable[]=$dec;
			$datatable[]=$total;
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