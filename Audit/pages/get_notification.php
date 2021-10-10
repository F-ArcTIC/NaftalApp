<?php
require_once("../../cnx.php");

$sql="SELECT * FROM `notification` WHERE `distinataire`='";
$sql2="SELECT  `operateur`, `direction` FROM `user` WHERE `id_user`=";
//-----------------------
$_SESSION['id_user']='2';
//-----------------------
$nb=0;
$reply=array();
//echo $result ;

	if ($result = $conn->query(($sql.$_SESSION['id_user']."' order by id_not desc"))) {
	    while ($row = $result->fetch_assoc()) {
	    	
	       if ($result2= $conn->query($sql2.$row['expediteur']))
         {
          if($row2 = $result2->fetch_assoc()) 
          {
            $row += array ('operateur'=> $row2['operateur']);
            $row += array ('direction'=> $row2['direction']);
            $nb++;
          }
         }
         else 
          {
            $reply["success"]=FALSE;
            $reply["message"]="NO DATA";
          }

          $datatable[]=$row;
	    }

	    /* free result set */
	    $reply["success"]=TRUE;
	    $reply["nb"]=$nb;
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