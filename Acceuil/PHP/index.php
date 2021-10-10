<?php
session_start();
if($_SESSION['Type']=='Administrateur'){
	//header("location:acceuil_administrateur.php");
	header("location:../../Administration/User/index.php");
}

else if($_SESSION['Type']=='Audit')
	{
		header("location:../../Audit/pages/acceuil.php");
	}
	else
		if($_SESSION['Type']=='CM')
		{
			//header("location:acceuil_cm.php");
		}
		else
		{
			header("location:../../Structure/pages/acceuil.php");
		}


?>