<?php
 //判斷session是否已啟動
if(!isset($_SESSION))
{
    session_start();
} 
include 'mysql.inc.php';

if(isset($_POST['login']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$log_query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
	$log_query_run = mysqli_query($conn,$log_query);

	if(mysqli_num_rows($log_query_run) > 0)
	{
		foreach ($log_query_run as $row){
			$user = $row['username'];
			$pass = $row['password'];
			$ad = $row['admin'];
			$userid = $row['id'];
		}
		$_SESSION['userid'] = $userid;
		$_SESSION['auth_role'] = "$ad";
		$_SESSION['auth'] = true;
		$_SESSION['auth_user'] = [
			'user' => $user,
			'pass' => $pass,
			'ad' => $ad
		];
		include 'login_role.php';
	}
	else
	{
		$_SESSION['status'] = "帳密輸入錯誤!!";
		header('Location: index.php');
	}
}
else
{
	$_SESSION['status'] = "登入失敗!!";
	header('Location: index.php');
}
?>