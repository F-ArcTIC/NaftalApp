     
<?php
session_start();
require_once("../../../cnx.php");
 

 ////// update te table after codification

$query1 = "SELECT `id_projet`,`code`,`objet`,`type`,`mode`,`nature`,`pdao` ,`id_user`from projet" ;
$query2=" SELECT `districte`,`direction` FROM `user` WHERE id_user=";

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

if ($result = $conn->query($query1))
{
    while ($row = $result->fetch_assoc())

     {
      if ($result2= $conn->query($query2.$row['id_user']))
         {
          if($row2 = $result2->fetch_assoc()) 
          {
            $row += array ('districte'=> $districteArray[$row2['districte']]);
            $row += array ('direction'=> $DirectionArray[$row2['direction']]);
          }
         }
         else 
          {
            $reply["success"]=FALSE;
            $reply["message"]="NO DATA";
          }

          $datatable[]=$row;
     }
$reply["data"]=$datatable;     
}
else {
  $reply["success"]=FALSE;
  $reply["message"]="NO DATA";
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>
