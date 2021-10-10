<?php
require_once("../../../cnx.php");
 $sql1="SELECT * FROM `commission` WHERE type='CMB' or type='CMD'";
 $sql2="select concat(nom_mem,' ',prenom_mem) as nom from membre where id_mem in (select id_m from `commission-membre` where id_c='";

$reply=array();
$reply["success"]=TRUE;
$reply["message"]='';
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
if ($result = $conn->query($sql1))
{
    while ($row = $result->fetch_assoc())
     {
      if ($result2= $conn->query($sql2.$row['id_c']."' and poste='president')"))
         {
          if($row2 = $result2->fetch_assoc()) 
            $row += array ('president'=> $row2['nom']);
          else
          	$row += array ('president'=> '/');

         }
         else 
          {
            $reply["success"]=FALSE;
            $reply["message"].=$conn->error;
          }

        if ($result2= $conn->query($sql2.$row['id_c']."' and poste='membre')"))
         {
         	$mem='';
          while($row2 = $result2->fetch_assoc()) 
          	$mem .= nl2br($row2['nom']."\n");

        if($mem!='')
          $row += array ('membres'=> substr($mem, 0, -7));    
        else  
          $row += array ('membres'=> '/');       
         }
         else 
          {
            $reply["success"]=FALSE;
            $reply["message"].=$conn->error;
          }

          $row += array ('districtC'=> $districteArray[$row['district']]);    
          $datatable[]=$row;
     }

	$reply["data"]=$datatable;     
}
else {
  $reply["success"]=FALSE;
  $reply["message"].=$conn->error;
}


header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>

