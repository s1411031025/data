<?php
//資料庫設定
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "data";
//連線資料庫伺服器
$conn = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
if (!$conn)
	die("無法連線資料庫伺服器");
else echo "成功連接";
//設定連線的字元集為 UTF8 編碼
mysqli_set_charset($conn, "utf8");
?>