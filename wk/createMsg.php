<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>簡易留言板</title>
<link href="msgBrd.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
<div id="title">
<h1>簡易留言板</h1>
</div>
<div id="maintext">
<form method="post" action="addMsg.php" name="addmessage">
您的姓名: <input name="name" required>
<br><br>
請輸入留言:<br>
<textarea cols="35" rows="7" name="message" required></textarea>
<br><br>
<input name="submit" type="submit" value="送出"> &nbsp;
&nbsp; <input name="reset." type="reset" value="清除">
</form>
</div>
</div>
</body>
</html></body>
</html>