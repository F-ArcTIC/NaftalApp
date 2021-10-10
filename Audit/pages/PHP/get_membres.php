
<?php
require_once("../../../cnx.php");
$sql = "SELECT CONCAT(nom_mem,' ',prenom_mem) as mem, id_mem from membre where poste in('Chef de section','Ingenieur Technique','Cadre d\'etude','Chargé d\'etude') and etat = '1' and Districte ='";


$reply=array();
//echo $result ;
$datatable=array();


if(isset($_POST['code']))
{$code=$_POST['code'];
$code=explode('/',$code);
	if ($result = $conn->query(($sql.$code[4]."'"))) {
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
	$reply["message"]="code non recu !";
	$reply["success"]=FALSE;
}

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>