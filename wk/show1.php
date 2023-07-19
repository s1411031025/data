
<?php 
	session_start();
	include 'mysql.inc.php';
    if(isset($_SESSION['auth']))
    {
        echo $_SESSION['auth_role'];
    }
?>