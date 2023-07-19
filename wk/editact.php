<?php
header('Content-Type: text/html; charset=utf-8');
include("mysql.inc.php");
//如果以 POST 方式傳遞過來的 inputCid, inputDes 參數都不是空字串
if ( !empty($_POST['cid']) && !empty($_POST['des']) ){
	//更新所指定編號的記錄
	$sql='UPDATE menu
		SET cid = "'.$_POST["cid"].'",
		des = "'.$_POST["des"].'"
		WHERE did = "'.$_POST["did"].'";';
	//echo $sql;
	mysqli_query($conn, $sql);
}
//取得被更新的記錄筆數
$rowUpdated=mysqli_affected_rows($conn);
//如果更新的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
if ($rowUpdated >0){
echo "資料更新成功";
}
else {
echo "更新失敗, 或者您輸入的資料與原本相同";
}
?>
<p><a href="add.php">回MENU</a></p>