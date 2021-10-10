<?php
session_start();

require_once("../../../cnx.php");

$sql1="SELECT count(*) as nb FROM `appel_doffre` WHERE code ='";
$sql2="SELECT count(*) as nb FROM `gré_a_gré` WHERE code ='";
$sql3="SELECT count(*) as nb FROM `préqualif` WHERE code ='";
$sql4="DELETE FROM `projet` WHERE `id_projet` =";

$sql5="INSERT INTO `gré_a_gré` (`id_g`, `code`, `objet`, `nature`, `type`, `projet`, `id_user`, `nom_cocantractant`, `montant`, `date_signature`, `motif`) VALUES (NULL, '";
$sql6="INSERT INTO `préqualif` (`id_pq`, `code`, `objet`, `projet`, `type`, `id_user`, `etat`, `date_etat`, `motif`) VALUES (NULL, '";
$sql7="INSERT INTO `appel_doffre` (`id_ao`, `code`, `objet`, `mode`, `type`, `nature`, `id_operateur`, `etape`, `nb_offre`, `nb_cc`, `montant`, `soum_moins_disant`, `etat`, `date_etat`, `motif`, `pdao`, `projet_contract`, `fiche_suivi`, `date_signature_contract`) VALUES (NULL, '";

$reply=array();

 if(isset($_POST["N_seq"]))
 {
  $N_seq=$_POST["N_seq"];
  if(isset($_POST["id_projet"]))
  {
   $id_projet= $_POST["id_projet"];
    if(isset($_POST["objet"]))
    {
      $objet=$_POST["objet"];
      if(isset($_POST["mode"]))
      {
        $mode=$_POST["mode"];
        if(isset($_POST["nature"]))
        {
          $nature=$_POST["nature"];
          if(isset($_POST["pdao"]))
          {
            $pdao=$_POST["pdao"];
            if(isset($_POST["type"]))
            {
              $type=$_POST["type"];
              if(isset($_POST["code"]))
              {
                $code=$_POST["code"];
                if(isset($_POST["id_user"]))
                {
                  $id_user=$_POST["id_user"];
                   $code=str_replace("XX", $N_seq, $code);

                    $result=NULL;
                    if($mode=="Grés a Grés")
                      $result = $conn->query($sql2.$code."'");  
                    else
                      if($mode=="Préqualification")
                          $result = $conn->query($sql3.$code."'");  
                      else
                          $result = $conn->query($sql1.$code."'");  
                    if ($nb= $result->fetch_assoc())
                    {

                      if($nb['nb']>0) 
                        { 
                          $reply["success"]=FALSE;
                          $reply["message"]='N_seq existe deja !';
                        }
                      else
                      {
                        if($conn->query($sql4.$id_projet)===TRUE)
                        {
                          if($mode=="Grés a Grés")
                          {
                             if ($conn->query($sql5.$code."',\"".$objet."\" ,'".$nature."','".$type."','".$pdao."','".$id_user."', NULL, NULL, NULL, NULL)") === FALSE) 
                              {
                                $reply["success"]=FALSE;
                                $reply["message"]=$conn->error;
                              } 
                              else{$reply["success"]=TRUE;}
                          }
                          else
                              if($mode=="Préqualification")
                              {
                                  if ($conn->query($sql6.$code."',\"".$objet."\",'".$pdao."','".$type."','".$id_user."', 'En cours', NULL, '')") === FALSE) 
                                    {
                                      $reply["success"]=FALSE;
                                      $reply["message"]=$conn->error;
                                    } 
                                    else{$reply["success"]=TRUE;}
                              }
                              else
                              {
                                   if ($conn->query($sql7.$code."',\"".$objet."\",\"".$mode."\",'".$type."','".$nature."','".$id_user."', 'initiale', NULL, NULL, NULL, '', 'En cours', NULL, NULL, '".$pdao."', NULL, NULL, NULL)") === FALSE) 
                                    {
                                      $reply["success"]=FALSE;
                                      $reply["message"]=$conn->error;
                                    } 
                                    else{$reply["success"]=TRUE;}
                              }
                        }
                        else
                        {
                          $reply["success"]=FALSE;
                          $reply["message"]=$conn->error;
                        }

                      }
                    }
                }
                else
                {
                  $reply["success"]=FALSE;
                  $reply["message"]='id_user non recu!';
                }
              }
              else
              {
                $reply["success"]=FALSE;
                $reply["message"]='code non recu!';
              }
            }
            else
            {
              $reply["success"]=FALSE;
              $reply["message"]='type non recu!';
            }
          }
          else
          {
            $reply["success"]=FALSE;
            $reply["message"]='pdao non recu!';            
          }
      }
       else
        {
          $reply["success"]=FALSE;
          $reply["message"]='nature non recu!';            
        }
    }
    else
      {
        $reply["success"]=FALSE;
        $reply["message"]='mode non recu!';            
      }
    }
    else
    {
      $reply["success"]=FALSE;
      $reply["message"]='objet non recu!';            
    }
  }
  else
  {
    $reply["success"]=FALSE;
    $reply["message"]='id_projet non recu!';            
  }
}
else
{
$reply["success"]=FALSE;
$reply["message"]='N_seq non recu!';  
}

header('Content-type: application/json;charset=utf-8');

echo json_encode($reply);
exit();
?>