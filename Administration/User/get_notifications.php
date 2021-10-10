<?php
session_start();
require_once("../../cnx.php");

$sql="SELECT * FROM `notification` WHERE `distinataire`=";
$sql2="SELECT  `districte`, `direction`, `password` FROM `user` WHERE `id_user`=";

$sqldel="delete from `notification` where id_not=";
//-----------------------
//-----------------------
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
    "DEV" => "Direction Developpement",
   ];

 
$lu="";
if(isset($_POST["lu"])) if($_POST["lu"]=="0") $lu=" and `lu`= '0'";
$nb=0;
$nblu=0;
$reply=array();
$del=array();
$datatable=array();
//echo $result ;
	if ($result = $conn->query(($sql.$_SESSION['id_user'].$lu." order by id_not desc"))) {
	    while ($row = $result->fetch_assoc()) {
	    	if ($result2= $conn->query($sql2.$row['expediteur']))
         {
          if($row2 = $result2->fetch_assoc()) 
          {
            $row += array ('districte'=> $districteArray[$row2['districte']]);
            $row += array ('direction'=> $DirectionArray[$row2['direction']]);
            $row += array ('password'=> $row2['password']);
            $nb++;
            if($row["lu"]=="0")
                $nblu++;
          }
         }

	    	$time_actuel=time();
	    	$time_not=$row['time'];
	    	if($time_actuel-$time_not>= 2592000)
	    	{
	    		$del[]=$row['id_not'];
	    	}
	    	else
	       		$datatable[]=$row;
	    }

	    foreach($del as $d)
	    {
	    	 if ($conn->query($sqldel.$d) === FALSE)
	    		 { 
	    		 	$reply["success"]=FALSE;
		            $reply["message"]=$conn->error;
		          }
	    }

	    /* free result set */
	    $reply["success"]=TRUE;
	    $reply["nb"]=$nb;
        $reply["nblu"]=$nblu;
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