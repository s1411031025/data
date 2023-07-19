<?php
include("mysql.inc.php");
//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if (!empty($_GET['edit'])){
	//查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
	$sql='SELECT * FROM guestbook WHERE id = "'.$_GET["edit"].'" ';
	//echo $sql;
	$result=mysqli_query($conn, $sql);
	//將查詢到的資料(只有一筆)放在 $row 陣列
	$row=mysqli_fetch_array($result);
	}
	else {
	//如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
	header("Location:msgBoard.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<!--bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/bootstrap.min.css" rel="stylesheet" />
<meta charset="UTF-8">
<title></title>
</head>
<body>
	<div class="container fluid">
			<!--定義一個編輯資料的表單, 並且將編輯好的資料傳遞給 editact.php 進行處理 -->
			<form method="post" action="editact1.php">
			編號: <?php echo $row['id'];?> <br /><br />
			<input name="id" type="hidden" value="<?php echo $row['id'];?>">

	
			回覆內容: <input name="re" value="<?php echo $row['re'];?>"><br />
			<input name="submit" type="submit" value="送出">
			</form>
		<p><a href="msgBoard.php">回留言板</a></p>
		<!--bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</div>
</body>
</html>