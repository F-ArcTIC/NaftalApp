
<?php

require_once("../../../cnx1.php");

$query1='select code from appel_doffre ';  
$query2='select * from appel_doffre where code= "';
$query3='select * from publication where num_p in (select num_p from placard where nature in("'."Insertion d'Appel d'offre ouvert".'","'."Insertion d'Appel d'offre restreint".'","'."Insertion de Consultation selective".'") and  code= "' ;
$query4='select concat( num_pv, " / ", date_pv) as pv_tech from pv_tech where code="';
$query5='select concat( num_pv, " / ", date_pv) as pv_eval from pv_evaluation where code="';
$query6='select concat( num_pv, " / ", date_pv) as  pv_fin from pv_fin where code="';
$query7='select concat( num_pv, " / ", date_pv) as pvcvt from pv_cvt where code="';
$query8='select concat( num_pv, " / ", date_pv) as pvcmb from pv_cmb where type_visa="Lancement d\'appel d\'offres" and code="'; /////////////// a revoire la NATURE
$query9='select concat( num_dec, " / ", date_dec) as Decisioncvt from commission where type="cvt" and code="';
$query10='select concat( num_dec, " / ", date_dec) as date_dec from commission where type="ceot" and code="';
$query11='select date_pv from pv_cmb where type_visa="Attribution definitive" and code="' ;///////////////// a revoire la NATURE

$datatable=array();
 $reply=array();

$err=0;
 

 if ($sql1= $con->query($query1))
 {
        while($code=$sql1->fetch())
        {   
            $row=array();
         $sql2= $con -> query ($query2. $code[0].'"');  
         if ($donnee=$sql2->fetch(PDO::FETCH_ASSOC))
         { 
             $row+= $donnee;
             if ($donnee['nb_offre']!=NULL && $donnee['nb_cc']!=NULL)   $row += array ('offre_cc'=> $donnee['nb_offre'].'/'.$donnee['nb_cc']); else  $row += array ('offre_cc'=>'/');
             if ($donnee['soum_moins_disant'] == '')  $row['soum_moins_disant']="/";
             if ($donnee['date_etat'] == NULL)  $row['date_etat']='/';
             if ($donnee['motif'] == NULL)  $row['motif']='/';
             if ($donnee['date_signature_contract'] == NULL)  $row['date_signature_contract']='/';
             if ($donnee['montant'] == NULL)  $row['montant']='/';
             if ($donnee['short'] == NULL)  $row['short']='/';
             if ($donnee['short_list'] == NULL)  $row['short_list']='/';

         if ($sql3=$con->query($query3.$code[0].'")'))
         {
            $exist=false;
            $proro=0;
            $pub='';
            $cloture='/';
            while($donnee=$sql3->fetch())
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
                        $pub=$pub.'<font color="red" style="font-weight: bold">'.' * </font>';
                    }
                    $row+= array ('pub' => $pub);
                }
             $row+= array ('cloture' => $cloture);


                if ( $sql4=$con->query($query4.$code[0].'"'))  
                    if ($donnee=$sql4->fetch()) $row += array('pv_tech' => $donnee[0]); 
                    else $row += array('pv_tech' =>  '/');
                else
                {
                     $reply["success"]=FALSE;
                     $reply["message"]= $con->errorInfo();
                     $err=1;
                }

                $eval="";
                if ($sql5=$con->query($query5.$code[0].'"'))
                {
                     while ($donnee=$sql5->fetch()) 
                        $eval.= nl2br($donnee[0]."\n\r"); 
                      if ($eval!='')$row += array('pv_eval' => $eval);
                     else $row += array('pv_eval' => '/');
                }
                else
                {
                     $reply["success"]=FALSE;
                     $reply["message"]= $con->errorInfo();
                     $err=1;
                }

                if ( $sql6=$con->query($query6.$code[0].'"')) 
                     if ($donnee=$sql6->fetch()) $row += array('pv_fin' => $donnee[0]);
                      else $row += array('pv_fin' =>'/');
                else
                {
                     $reply["success"]=FALSE;
                      $reply["message"]= $con->errorInfo();
                      $err=1;
                }

                $pvcvt="";
                if ($sql7=$con->query($query7.$code[0].'"'))
                {
                     while ($donnee=$sql7->fetch()) 
                        $pvcvt.= nl2br($donnee['pvcvt']."\n\r"); 
                      if ($pvcvt!='')$row += array('pvcvt' => $pvcvt);
                     else $row += array('pvcvt' => '/');
                }
                else
                {
                     $reply["success"]=FALSE;
                     $reply["message"]= $con->errorInfo();
                     $err=1;
                }


                 if ( $sql8=$con->query($query8.$code[0].'"')) 
                    {if ($donnee=$sql8->fetch()) $row += array('pvcmb' => $donnee[0]); 
                    else $row += array('pvcmb' =>'/');}
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $con->errorInfo();
                    $err=1;
                }


                if ( $sql9=$con->query($query9.$code[0].'"')) 
                    {$dec="";
                        while($donnee=$sql9->fetch()) 
                            $dec .= nl2br($donnee['Decisioncvt']."\n\r"); 
                        if($dec!='')
                            $row += array('Decisioncvt' => $dec); 
                        else $row += array('Decisioncvt' =>'/');
                    }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $con->errorInfo();
                    $err=1;
                }


                 if ( $sql10=$con->query($query10.$code[0].'"')) 
                    {$dec="";
                        while($donnee=$sql10->fetch()) 
                            $dec .= nl2br($donnee['date_dec']."\n\r"); 
                        if($dec!='')
                            $row += array('Decisionceot' => $dec); 
                        else $row += array('Decisionceot' =>'/');
                    }
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $con->errorInfo();
                    $err=1;
                }


                 if ( $sql11=$con->query($query11.$code[0].'"')) 
                    {if ($donnee=$sql11->fetch()) $row += array('VisaD' => $donnee[0]); 
                    else $row += array('VisaD' =>'/');}
                else
                {
                     $reply["success"]=FALSE;
                    $reply["message"]= $con->errorInfo();
                    $err=1;
                }



                 $datatable[]=$row; 
        }
        else{
          $reply["success"]=FALSE;
       $reply["message"]= $con->errorInfo();
       $err=1;
        }

    }
    else {
        $reply["success"]=FALSE;
       $reply["message"]= $con->errorInfo();
       $err=1;
    }
             
                  
         }
if($err==0)
    {
    $reply["success"]=TRUE;
    $reply["data"]=$datatable;
    }         
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