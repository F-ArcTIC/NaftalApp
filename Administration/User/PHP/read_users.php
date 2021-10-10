
<?php
require_once("../../../cnx.php");
$sql = "SELECT * from user ";


$reply=array();
//echo $result ;
$districteArray=[
	"" => "",
	"DIR" => "Branche",
    "D02" => "Districte de Chlef",
    "D04" => "Districte d'Oum El Bouaghi",
    "D05" => "Districte de Batna",
    "D06" => "Districte de Béjaïa",
    "D08" => "Districte de Béchar",
    "D09" => "Districte de Blida",
    "D10" => "Districte de Bouira",
    "D13" => "Districte de Tlemcen",
    "D14" => "Districte de Tiaret",
    "D15" => "Districte de Tizi Ouzou",
    "D16" => "Districte de d'Alger",
    "D17" => "Districte de Djelfa",
    "D19" => "Districte de Sétif",
    "D20" => "Districte de Saïda",
    "D21" => "Districte de Skikda",
    "D25" => "Districte de Constantine",
    "D30" => "Districte d'Ouargla",
    "D31" => "Districte  d'Oran",
    "D34" => "Districte de Bordj Bou Arreridj",

];

$DirectionArray=[
	"" => "",
    "Audit" => "Audit",
	"TECH" => "Direction Technique",
    "TRS" => "Direction Transport",
    "DAM" => "Direction Administration",
    "CAN" => "Direction Canalisation",
    "PETR" => "Direction Lubrifiants",
    "INF" => "Direction Informatique",
    "HSE" => "Direction HSE",
    "DEV" => "Direction Developpemnet",
    

];

	if ($result = $conn->query(($sql))) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	    	$distr=$row['districte'];
	    	$distr= $districteArray[$distr];
	    	$dir=$row['direction'];
	    	$dir= $DirectionArray[$dir];
	    	$row += array ('Districte'=> $distr);
	    	$row += array ('Direction'=> $dir);
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

$conn->close();
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>