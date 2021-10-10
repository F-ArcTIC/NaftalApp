<?php
	require_once("../../cnx.php");
	session_start();

	$requete="select * from user where username='";

	$reply=array();
	if(isset($_POST['username']))
	{	$username=$_POST['username'];
		if(isset($_POST['password']))
		{
			$password=$_POST['password'];
			if ($result = $conn->query(($requete.$username."' and password ='".$password."'")))
			{
				if($user=$result->fetch_assoc())
				{ $reply["success"]=TRUE;
					$_SESSION['id_user']=$user['id_user'];
					$_SESSION['username']=$user['username'];
					$_SESSION['direction']=$user['direction'];
					$_SESSION['districte']=$user['districte'];
					$_SESSION['Type']=$user['Type'];
					
					header("Location:index.php");
				}
				else
				{
					 $_SESSION["success"]=FALSE;
					 $_SESSION["message"]='<div class="alert alert-danger" role="alert" id="erreur"><strong>Erreur : </strong> Nom d\'utilisateur ou Mot de passe éroné</div>';
        			 header("Location:../../Acceuil/register.php");    
				}
			}
			else
			{
				$reply["success"]=FALSE;
				$reply["message"]=$conn->error;
			}

		}
		else
		{
			$reply["message"]="password non recu !";
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