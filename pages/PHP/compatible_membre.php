<?php
require_once("../../../cnx.php");
$reply=array();
$compatible=1;
$query1= "select id_mem from `membre` where id_mem = ";
$query3= "select concat(nom_mem,' ',prenom_mem) as mem from `membre` where id_mem =";
$query2="SELECT type from commission where type in('COP','CMD', 'CMB') and id_c in (select id_c from `commission-membre` where id_m = ";
 

$reply['message']='';
if (isset($_POST['type']))
{
     if (isset($_POST['Membres']))
     {
     	if(isset($_POST['code']))
     		{
     			foreach($_POST['Membres'] as $m)
     			{
     			if ($result =$conn->query($query1.$m)) 
          			 { if ($id= $result->fetch_assoc())
          			 	{
                     if ($result3 =$conn->query($query3.$id['id_mem'])) 
                        {
                          if ($membre= $result3->fetch_assoc()) 
                            { $nom_mem= $membre['mem'];}
                          else
                            { $nom_mem= "un des membre";}
                        }
                    else
                    {
                      $reply["message"]=$conn->error;
                      $reply["success"]=FALSE;
                    }


                    
          			 		if($_POST['type']=='CVT')
                                   {
                                        if ($result2 =$conn->query($query2.$id['id_mem'].")")) 
                                        {
                                             while ($type= $result2->fetch_assoc())
                                                   if($type['type']=='CMB')
                                                   {
                                                       $compatible=0;
                                                        $reply["message"].= $nom_mem. " est deja membre dans la CM !\r\n";

                                                   }
                                                   if($type['type']=='CMD')
                                                   {
                                                       $compatible=0;
                                                        $reply["message"].= $nom_mem. " est deja membre dans la CM !\r\n";

                                                   }
                                        }
                                        else
                                        {
                                          $reply["message"]=$conn->error;
                                          $reply["success"]=FALSE;   
                                        }
                                   }
                                   else if($_POST['type']=='CEOT')
                                   {
                                        if ($result2 =$conn->query($query2.$id['id_mem'].")")) 
                                        {
                                             $count=mysqli_num_rows($result2);
                                              if($count==2)
                                              {
                                                  $compatible=0;
                                                  $reply["message"].= $nom_mem. " est deja membre dans la CM et la COP!!\r\n";

                                              }
                                              else if($count==1)
                                                      {
                                                       $compatible=0;
                                                       if ($type= $result2->fetch_assoc())
                                                            { if($type['type']=='CMB')
                                                                  $reply["message"].= $nom_mem. " est deja membre dans la CM !\r\n";
                                                             if($type['type']=='COP')
                                                                  $reply["message"].= $nom_mem. " est deja membre dans la COP !\r\n";
                                                                if($type['type']=='CMD')
                                                                  $reply["message"].= $nom_mem. " est deja membre dans la CM !\r\n";
                                                            }        
                                                       }
                                                   else 
                                                   { //count==0
                                                        if ($result3 =$conn->query("SELECT type from commission where type ='cpq' and code='".$_POST['code']."' and id_c in (select id_c from `commission-membre` where id_m =".$id['id_mem'].")")) 
                                                            {
                                                                 $count=mysqli_num_rows($result3);
                                                                 if($count==1)
                                                                 {
                                                                      $compatible=0;
                                                                      $reply["message"].= $nom_mem. " est deja membre dans la CPQ !\r\n";
                                                                 }
                                                            }
                                                       else
                                                            {
                                                              $reply["message"]=$conn->error;
                                                              $reply["success"]=FALSE;   
                                                            }

                                                   }
                                        }
                                        else
                                        {
                                          $reply["message"]=$conn->error;
                                          $reply["success"]=FALSE;   
                                        }
                                   }
                                   else if($_POST['type']=='cpq')
                                        {
                                         if ($result2 =$conn->query($query2.$id['id_mem'].")")) 
                                             {
                                             while ($type= $result2->fetch_assoc())
                                                   if($type['type']=='COP')
                                                   {
                                                       $compatible=0;
                                                        $reply["message"].= $nom_mem . "  deja membre dans la COP !\r\n";

                                                   }
                                             }
                                             else
                                             {
                                               $reply["message"]=$conn->error;
                                               $reply["success"]=FALSE;   
                                             }

                                             if ($result3 =$conn->query("SELECT type from commission where type ='ceot' and code='".$_POST['code']."' and id_c in (select id_c from `commission-membre` where id_m =".$id['id_mem'].")")) 
                                                            {
                                                                 $count=mysqli_num_rows($result3);
                                                                 if($count==1)
                                                                 {
                                                                      $compatible=0;
                                                                      $reply["message"].= $nom_mem. " est deja membre dans la CEOT !\r\n";
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
             	}
             	$reply['compatible']=$compatible;

     		}
     		else
     		{
     			$reply["message"]="	Code non recu!";
     			$reply["success"]=FALSE;
     		}
     }
     else
     {
     	$reply["message"]="Membres non recu!";
     	$reply["success"]=FALSE;
     }
 }
else
{
     $reply["message"]="Type non recu!";
     $reply["success"]=FALSE;
}
	
header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
?>
