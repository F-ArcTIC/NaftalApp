<?php
require_once("../../../cnx.php");

$sql1="select date_pub as date, num_p from publication";
$sql4="select code from placard where num_p=";
$sql2="select date_pub as date , num_p from publication where proro='0' and num_p in( select num_p from placard where etat='Publié' and nature =\"" ; 



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
			$br['Total_publication']=0;
			$dec['Total_publication']=0;
			
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}


			//prorogation

		if ($result3 = $conn->query($sql2.'Avis de prorogation")')) 
		{
			$br['Prorogation']=0;
			$dec['Prorogation']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Prorogation']++;
							}
							else
								$dec['Prorogation']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Prorogation']= $dec['Prorogation']+ $br['Prorogation'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}

// avis de lancement
			if ($result3 = $conn->query($sql2.'Insertion d\'Appel d\'offre ouvert" or nature= "Insertion d\'Appel d\'offre restreint" or nature="Insertion de Consultation selective")')) 
		{
			$br['Avis de lancement']=0;
			$dec['Avis de lancement']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Avis de lancement']++;
							}
							else
								$dec['Avis de lancement']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Avis de lancement']= $dec['Avis de lancement']+ $br['Avis de lancement'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}
//avis de prequalif
			if ($result3 = $conn->query($sql2.'Avis de Préqualification")')) 
		{
			$br['Avis de Préqualification']=0;
			$dec['Avis de Préqualification']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Avis de Préqualification']++;
							}
							else
								$dec['Avis de Préqualification']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Avis de Préqualification']= $dec['Avis de Préqualification']+ $br['Avis de Préqualification'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}
//Resultat de prequalif
			if ($result3 = $conn->query($sql2.'Résultat Préqualification")')) 
		{
			$br['Résultat Préqualification']=0;
			$dec['Résultat Préqualification']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Résultat Préqualification']++;
							}
							else
								$dec['Résultat Préqualification']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Résultat Préqualification']= $dec['Résultat Préqualification']+ $br['Résultat Préqualification'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}
// attribution des marchés
			if ($result3= $conn->query($sql2.'Attribution Définitive")')) 
		{
			$br['Attribution des marchés']=0;
			$dec['Attribution des marchés']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Attribution des marchés']++;
							}
							else
								$dec['Attribution des marchés']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Attribution des marchés']= $dec['Attribution des marchés']+ $br['Attribution des marchés'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}
//rectificatif
			if ($result3 = $conn->query($sql2.'Réctification")')) 
		{
			$br['Réctificatif']=0;
			$dec['Réctificatif']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Réctificatif']++;
							}
							else
								$dec['Réctificatif']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Réctificatif']= $dec['Réctificatif']+ $br['Réctificatif'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
			}
//annulation
			if ($result3 = $conn->query($sql2.'Annulation")')) 
		{
			$br['Avis annulation']=0;
			$dec['Avis annulation']=0;
			while ($row = $result3->fetch_assoc()) 
			{
				$tab=preg_split("#\-#",$row['date']);
				if($tab[0]==$an and $tab[1]==$mois)
				{ 
					if ($result4 = $conn->query($sql4.$row['num_p'])) 
					{	if ($row4 = $result4->fetch_assoc()) 
						{
							if(preg_match("#/DIR/GPL$#",$row4['code']))
							{
								$br['Avis annulation']++;
							}
							else
								$dec['Avis annulation']++;
						}
					}
					else
					{
						$reply["success"]=FALSE;
						$reply["message"]=$conn->error;
					}
				}
			}
			$total['Avis annulation']= $dec['Avis annulation']+ $br['Avis annulation'];
		}
		else {
			$reply["success"]=FALSE;
			$reply["message"]=$conn->error;
		}

$br["Total_publication"]=$br['Avis annulation']+$br['Réctificatif']+$br['Attribution des marchés']+$br['Résultat Préqualification']+$br['Avis de Préqualification']+$br['Avis de lancement']+$br['Prorogation'];
$dec["Total_publication"]=$dec['Avis annulation']+$dec['Réctificatif']+$dec['Attribution des marchés']+$dec['Résultat Préqualification']+$dec['Avis de Préqualification']+$dec['Avis de lancement']+$dec['Prorogation'];
$total['Total_publication']=$br["Total_publication"]+$dec["Total_publication"];

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