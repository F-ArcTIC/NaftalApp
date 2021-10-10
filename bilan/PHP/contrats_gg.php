<?php
require_once("../../../cnx.php");


$sql1="SELECT code, date_signature FROM `gré_a_gré` WHERE date_signature is not NULL";

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
			$br['nb']=0; $dec['nb']=0;
			while($row = $result1->fetch_assoc())
			{
				$tab=preg_split("#\-#",$row['date_signature']);
				if($tab[0]==$an and $tab[1]==$mois) 
					{
						$tab1=preg_split("#\/#",$row['code']);
						if($tab1[4]=="DIR")
							$br['nb']++;
						else
							$dec['nb']++;
					}
			}
			$total['nb']=$br['nb']+$dec['nb'];

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