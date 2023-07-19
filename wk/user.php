<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="container">

	<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
		<div class="row g-3 align-items-center">
		  <div class="col-auto">
		    <label for="inputPassword6" class="col-form-label">新帳號</label>
		  </div>
		  <div class="col-auto">
		    <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" name="username">
		  </div>
		</div>
		<div class="row g-3 align-items-center">
		  <div class="col-auto">
		    <label for="inputPassword6" class="col-form-label">新密碼</label>
		  </div>
		  <div class="col-auto">
		    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" name="password">
		  </div>
		</div>

		<input type="submit" class="btn btn-outline-secondary" value="註冊會員">
	 	
	</form>
	<?php 
		include("mysql.inc.php");
		if (!empty( $_POST['username'] )&& !empty( $_POST['password'] )){
		
		$sql="INSERT INTO user (username, password, admin) VALUES ('" . $_POST['username']."', '".

			$_POST['password']."','general');";

		//把 SQL 印出來檢查, 之後要刪除
		//echo $sql;
		//進行資料庫新增
		mysqli_query($conn, $sql);
		echo "成功新增";
		echo "<script>window.location.href = 'index.php'</script>";
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>