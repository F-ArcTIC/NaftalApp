<?php
	require_once("../../cnx.php");
	session_start();

	$requete="select * from user where username='";

$sqlnot="INSERT INTO `notification` (`id_not`,`date`, `heure`, `time`, `expediteur`, `distinataire`, `type`, `contenu`, `lu`, `code`, `email`) VALUES (NULL, '";

	$reply=array();

	if(isset($_POST['username']))
		{ $username=$_POST['username'];
		if(isset($_POST['Email']))
		{
			$Email=$_POST['Email'];
			if ($result = $conn->query(($requete.$username."'")))
			{
				if($user=$result->fetch_assoc())
				{ $reply["success"]=TRUE;
					$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
								$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
								$date = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");		
								$h=date("H")+1;  $heure = $h.date(":i");
								$time=time();
								 		if($conn->query($sqlnot.$date."','".$heure."','".$time."','".$user['id_user']."','1' ,'1','Mot de passe oublié','0','','".$Email."')")===FALSE)
													{
														$reply["success"]=FALSE;
														$reply["message"]="notification Non Envoyé !";
											   		    
													}
				}else {
					$reply["message"]="Ce Nom d'Utilisateur n'existe pas !";
					$reply["success"]=FALSE;
				}
			}else
				{
					$reply["success"]=FALSE;
					$reply["message"]="notification Non Envoyé !";	
				}
	}
	else
	{
		$reply["message"]="E-mail non recu !";
		$reply["success"]=FALSE;	
	}
	}
	else
	{
		$reply["message"]="username non recu !";
		$reply["success"]=FALSE;	
	}
	

header('Content-type: application/json;charset=utf-8');
echo json_encode($reply);
exit();
	
?>