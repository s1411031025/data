<?php
	include("mysql.inc.php");
    session_start();
	$_SESSION['user'] = null;
	$_SESSION['pass'] = null;
	$_SESSION['ad'] = null;
	unset($_SESSION['user']);
	unset($_SESSION['pass']);
	unset($_SESSION['ad']);
	echo "<script>window.location.href = 'index.php'</script>";
?>