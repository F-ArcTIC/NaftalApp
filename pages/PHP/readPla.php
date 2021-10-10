<?php
require_once("../../cnx.php");

$query = "SELECT num_p,code,nature,etat,date_demande_pub  FROM placard ";
$queryp="SELECT * FROM publication where num_p = ";

$reply=array();

if ($result = $conn->query($query)) {

    /* fetch associative array */
    $datatable=array();
    while ($row = $result->fetch_assoc()) {
        if ($result1= $conn->query($queryp.$row['num_p']))
        { $proro=""; $cloture_proro="";
            $pub="";$cloture=""; $num=""; $numproro="";
            $surface="";$referenceP="";$reference=""; $pubHT=""; $pubTTC="";
         

            while($publication= $result1->fetch_assoc())
            {
                if ($publication['proro']==0)
                {
                    if ($publication['num_pub']!=NULL )$num = nl2br($publication['num_pub']);
                    if($publication['date_pub']!=NULL )  $pub = nl2br($publication['date_pub']);
                    if ($publication['date_cloture']!=NULL) $cloture =  nl2br($publication['date_cloture']);
                    if ($publication['reference']!=NULL) $referenceP=  nl2br($publication['reference']);
                    if ($publication['pubHT']!=NULL) $pubHT =  nl2br($publication['pubHT']);
                    if ($publication['pubTTC']!=NULL) $pubTTC =  nl2br($publication['pubTTC']);
                }
                else{
                if ($publication['num_pub']!=NULL )$numproro .= nl2br($publication['num_pub']."\n");
                    if($publication['date_pub']!=NULL )  $proro .= nl2br($publication['date_pub']."\n");
                    if ($publication['date_cloture']!=NULL) $cloture_proro .=  nl2br($publication['date_cloture']."\n");
                    if ($publication['reference']!=NULL) $reference .=  nl2br($publication['reference']."\n");
                    if ($publication['pubHT']!=NULL) $pubHT +=  nl2br($publication['pubHT']);
                    if ($publication['pubTTC']!=NULL) $pubTTC +=  nl2br($publication['pubTTC']);
                }

            }
        }
        else {$pub='/'; $cloture='/';$proro='/';$cloture_proro='/'; $num="/"; $numproro="/";}
        $row += array ('num'=> $num);
        $row += array ('pub'=> $pub);
        $row += array ('date_cloture'=> $cloture);

        $row += array ('num_proro'=> $numproro);
        $row += array ('proro'=> $proro);
        $row += array ('date_cloture_proro'=> $cloture_proro);

         //$row += array ('surface'=> $surface);
        $row += array ('reference'=> $reference);
        $row += array ('referenceP'=> $referenceP);
        $row += array ('pubHT'=> $pubHT);
        $row += array ('pubTTC'=> $pubTTC);
       
       $datatable[]=$row;
    }

    /* free result set */
    $reply["success"]=TRUE;
    $reply["data"]=$datatable;
    $result->free();

}
else {
	$reply["success"]=FALSE;
	$reply["message"]="NO DATA";
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>
