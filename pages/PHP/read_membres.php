    
<?php
session_start();
 //include ("connexion.php");
//header('Content-Type: text/html;charset=utf-8'); 
require_once("../../cnx.php");
 
$query1='select * from membre';
 $reply=array();
$datatable=array();
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
 if ($result = $conn->query(($query1)))
 {
        while($row = $result->fetch_assoc())
        {
        	$row['Districte']=$districteArray[$row['Districte']];
           $datatable[]=$row;

         }

     $reply["success"]=TRUE;
     $reply["data"]=$datatable;

 }
else
{
    $reply["success"]=FALSE;
    $reply["message"]="NO DATA";
}

/*echo '<pre>';
print_r($datatable);
echo '</pre>';*/

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>