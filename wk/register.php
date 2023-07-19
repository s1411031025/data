<?php
	session_start();

	//$_POST使用者名稱和密碼
	$username = $_POST['username'];
	$password = $_POST['password'];
	//連線mysql
	$con = mysqli_connect('localhost','root','', 'data');
	//驗證mysql連線是否成功
	if(mysqli_errno($con)){
   
       
		echo "連線mysql失敗：".mysqli_error($con);
		exit;
	}
	//sql查詢語句
	$sql = "SELECT id  FROM user WHERE username='$username' AND password='$password'";
	//執行
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result); // 函式返回結果集中行的數量

	$sql1 = "SELECT id  FROM user WHERE admin='root' ";
	$result1 = mysqli_query($con,$sql1);
	$num1 = mysqli_num_rows($result1);


	


	if($num>0){
   		
       $row = mysqli_fetch_assoc($result);
		$_SESSION['userid'] = $row['id']; // session
		echo "<script>alert('登入成功');</script>";
		echo "<script>window.location.href = 'conDB.php'</script>";
		else if($num1>0){
		$row1 = mysqli_fetch_assoc($result1);
		$_SESSION['userid'] = $row['id'];
		echo "<script>window.location.href = 'act.php'</script>";

		}
	 


		else{
	   
	       
			echo "<script>alert('登入失敗，不存在此使用者');</script>";
			echo "<script>window.location.href = 'index.php'</script>";
		}
	}
	
	
	
	mysqli_close($con);
	
	
?>