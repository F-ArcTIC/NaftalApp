<?php
require_once("../../cnx.php");
 $sql1="SELECT `id_c`,`num_dec`,`date_dec`, concat(`num_dec`,' / ',`date_dec`) as N_date,`code` FROM `commission` WHERE type='";
 $sql2="select concat(nom_mem,' ',prenom_mem) as nom from membre where id_mem in (select id_m from `commission-membre` where id_c='";

$reply=array();
$reply["success"]=TRUE;
$reply["message"]='';
$datatable=array();
$type=$_POST["type"];
if ($result = $conn->query($sql1.$type."'"))
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

       if ($result2= $conn->query($sql2.$row['id_c']."' and poste='juriste')"))
         {
          if($row2 = $result2->fetch_assoc()) 
            $row += array ('juriste'=> $row2['nom']);
          else
          	$row += array ('juriste'=> '/');

         }
         else 
          {
            $reply["success"]=FALSE;
            $reply["message"].=$conn->error;
          }

        if ($result2= $conn->query($sql2.$row['id_c']."' and poste='financier')"))
         {
          if($row2 = $result2->fetch_assoc()) 
            $row += array ('financier'=> $row2['nom']);
          else
          	$row += array ('financier'=> '/');

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

