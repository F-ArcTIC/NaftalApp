   
<?php

require_once("../../../cnx.php");

$query1 = "SELECT * from préqualif " ;
$query2='select * from publication where num_p in (select num_p from placard where nature ="Avis de préqualif" and  code= "' ;
$query3='select concat( num_dec, " / ", date_dec) as Decisioncvt from commission where type="cvt" and code="';
$query4='select concat( num_pv, " / ", date_pv) as pvcvt from pv_cvt where code="';
$query5='select concat( num_pv, " / ", date_pv) as pvcmb from pv_cmb where type_visa="Lancement de pré-qualification" and code="';
$query6='select * from publication where num_p in (select num_p from placard where nature="Resultat Préqualification" and  code= "';
$query7='select concat( num_dec, " / ", date_dec) as Decisioncpq from commission where type="pq" and code="';
$query8='select concat( num_pv, " / ", date_pv) as pvcpq from pv_cpq where code="';


$reply=array();
$datatable=array();


if ($result = $conn->query($query1))
{
    while ($row = $result->fetch_assoc())
     {
            if ($row['date_etat'] == NULL)  $row['date_etat']='/';
             if ($row['motif'] == "")  $row['motif']='/';
             if ($row['short_list'] == NULL)  $row['short_list']='/';

        ///publication
        if ($sql2=$conn->query($query2.$row['code'].'")'))
         {
            $exist=false;
            $proro=0;
            $pub='';
            $cloture='/';
            while($donnee=$sql2->fetch_assoc())
            {
                $exist=true;
                if($donnee['proro']==0)
                {
                 $pub=$donnee['num_pub'].'/'.$donnee['date_pub'];
                }
                else if($donnee['proro']==1)
                    {
                        $proro =1;
                    }
            $cloture=$donnee['date_cloture'];
            }
            if($exist==false) { $row+= array ('pub' => '/' );  }
            else{
                    if($proro==1)
                    {
                        $pub='<font color="red">'.$pub.'* </font>';
                    }
                    $row+= array ('pub' => $pub);
                }
             $row+= array ('cloture' => $cloture);
         }
         else
         {
             $reply["success"]=FALSE;
            $reply["message"]=$conn->error;
         }

         //decision cvt

            if ( $sql3=$conn->query($query3.$row['code'].'"')) 
                    {$dec="";
                        while($donnee=$sql3->fetch_assoc()) 
                            $dec .= nl2br($donnee['Decisioncvt']."\n\r"); 
                        if($dec!='')
                            $row += array('Decisioncvt' => $dec); 
                        else $row += array('Decisioncvt' =>'/');
                    }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->error;
                }
          // date pv cvt

                $pvcvt="";
                if ($sql4=$conn->query($query4.$row['code'].'"'))
                {
                     while ($donnee=$sql4->fetch_assoc()) 
                        $pvcvt.= nl2br($donnee['pvcvt']."\n\r"); 
                      if ($pvcvt!='')$row += array('pvcvt' => $pvcvt);
                     else $row += array('pvcvt' => '/');
                }
                else
                {
                     $reply["success"]=FALSE;
                     $reply["message"]= $conn->error;
                }


                 //decision cpq

            if ( $sql7=$conn->query($query7.$row['code'].'"')) 
                    {$dec="";
                        while($donnee=$sql7->fetch_assoc()) 
                            $dec .= nl2br($donnee['Decisioncpq']."\n\r"); 
                        if($dec!='')
                            $row += array('Decisioncpq' => $dec); 
                        else $row += array('Decisioncpq' =>'/');
                    }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->error;
                }
          // date pv cpq

                $pvcpq="";
                if ($sql8=$conn->query($query8.$row['code'].'"'))
                {
                     while ($donnee=$sql8->fetch_assoc()) 
                        $pvcpq.= nl2br($donnee['pvcpq']."\n\r"); 
                      if ($pvcpq!='')$row += array('pvcpq' => $pvcpq);
                     else $row += array('pvcpq' => '/');
                }
                else
                {
                     $reply["success"]=FALSE;
                     $reply["message"]= $conn->error;
                }

            // date pv cmb

                if ( $sql5=$conn->query($query5.$row['code'].'"')) 
                {
                    if ($donnee=$sql5->fetch_assoc()) $row += array('pvcmb' => $donnee['pvcmb']); 
                    else $row += array('pvcmb' =>'/');
                }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->error;
                }

            //resultat de préqualif 

               if ( $sql6=$conn->query($query6.$row['code'].'")')) 
                {
                    if ($donnee=$sql6->fetch_assoc()) $row += array('pub_resultat' => $donnee['num_pub'].'/'.$donnee['date_pub']); 
                    else $row += array('pub_resultat' =>'/');
                }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $conn->error;
                }   

          $datatable[]=$row;
     }
 if(!empty($datatable))
    $reply["data"]=$datatable;
 else {$reply["success"]=FALSE;
       $reply["message"]="NO DATA";}  
}
else {
  $reply["success"]=FALSE;
  $reply["message"]="NO DATA";
}

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>
