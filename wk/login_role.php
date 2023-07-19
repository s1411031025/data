<?php
session_start();
	if($_SESSION['auth_role'] == "root")
	{
		header('Location: admin.php');
		exit(0);
	}
	else 
	{
		header('Location: conDB.php');
		exit(0);
	}
	  
   
?>