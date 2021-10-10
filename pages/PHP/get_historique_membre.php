<?php
require_once("../../../cnx.php");

$reply=array();
$reply["success"]=TRUE;
$datatable=array();

$sql1="select * from `commission-membre` where id_m =";
$sql2="select type,date_dec,code from commission where id_c =";
$sql3="select date_pv from `"; //where code =' 

if(isset($_POST['id_mem']))
{
	if ($result = $conn->query($sql1.$_POST['id_mem']))
  	{
	    while ($row = $result->fetch_assoc())
	     {
	     	$ligne=array();
	     	$ligne+= array ('poste'=> $row['poste']);
	     	if ($result2 = $conn->query($sql2.$row['id_c']))
		  	{
			    if($row2 = $result2->fetch_assoc())
			     {
			     	$ligne+= array ('type'=> $row2['type']);

			     	if($row2['type']=='CM' or $row2['type']=='COP')
			     	{
			     		$ligne+= array ('date_dec'=> $row['date_dec']);
			     		$ligne+= array ('date_fin'=> $row['date_fin']);
			     	}
			     	else
			     	{		////ahdoc
			     		$ligne+= array ('date_dec'=> $row2['date_dec']);
			     		if ($result3 = $conn->query($sql3.$row2['type']."` where code ='".$row2['code']."'"))
					  	{
						    if($row3 = $result2->fetch_assoc())
						     {
						     	$ligne+= array ('date_fin'=> $row3['date_pv']);
						     }
						}
						else
						{
							$reply["message"]=$conn->error;
		    				$reply["success"]=FALSE;
						}
			     	}
			     }
			}
			else
			{
				$reply["message"]=$conn->error;
		    	$reply["success"]=FALSE;
		    }
		    $datatable[]=$ligne;
	     }
	     $reply["data"]=$datatable;  
	}
	else
	{
		$reply["message"]=$conn->error;
    	$reply["success"]=FALSE;
    }
}
else
{

    $reply["message"]="id_mem non recu!";
    $reply["success"]=FALSE;
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>