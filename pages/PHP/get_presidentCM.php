
<?php
require_once("../../cnx.php");

$reply=array();
//echo $result ;
$datatable=array();
if(isset($_POST['dist']))
{$dist=$_POST['dist'];


	if($dist=='DIR')
		$sql = "SELECT CONCAT(nom_mem,' ',prenom_mem) as mem, id_mem from membre where poste in('Attaché de direction','Chef de Projet','Cadre Superieur','Conseiller') and etat = '1' and Districte ='";
	else
		$sql = "SELECT CONCAT(nom_mem,' ',prenom_mem) as mem, id_mem from membre where poste in('Directeur','Chef de departement','Chef de centre','Chargé de service') and etat = '1' and Districte ='";
	if ($result = $conn->query($sql.$dist."'")) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	       $datatable[]=$row;
	    }

	    /* free result set */
	    $reply["success"]=TRUE;
	    $reply["data"]=$datatable;
	    $result->free();
	} else {
	   $reply["message"]="NO DATA";
		$reply["success"]=FALSE;
	}
}
else
{
	$reply["message"]="dist non recu !";
	$reply["success"]=FALSE;
}

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>