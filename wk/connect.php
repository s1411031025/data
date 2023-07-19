<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php
		$conn = @mysqli_connect("localhost","root", "1234", "bookstore");
		if (mysqli_connect_errno())
			die("無法連線資料庫伺服器, 請聯絡系統管理員");
		else echo "成功連結資料庫伺服器";
	?>
</body>
</html>