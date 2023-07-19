<?php
include("mysql.inc.php");
$myTable='guestbook'; 
$strQuery="SELECT * FROM $myTable ORDER BY id DESC";
$result=mysqli_query($conn, $strQuery);
$numRows = mysqli_num_rows($result); //取得留言的總筆數
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>客服回應區</title>
	<link href="msgBrd.css" rel="stylesheet" type="text/css"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar bg-body-tertiary fixed-top" >
      <div class="container-fluid"  >
        <a class="navbar-brand" href="#" ><img src="img/mk.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">您的健康，交給我們</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="conDB.php">主頁</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add.php">菜單</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">會員登入</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  關於我們
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">line訂購連結</a></li>
                  <li><a class="dropdown-item" href="#">聯絡電話與地址</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="msgBoard.php">線上客服</a></li>
                </ul>
              </li>
              <li>
                <button type="button" class="text-bg-light   position-relative" onclick="location.href='act.php'">活動
                  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                  </span>
                </button>
              </li>

              <br>

              <li>
                <button type="button" class="text-bg-light position-relative" onclick="location.href='act.php'">優惠券
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </li>
            </ul>

            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
              
          </div>
        </div>
      </div>
    </nav>
 <br><br><br><br>
<div id="wrapper">
<div id="title">
<h1 class ="text-center">客服回應區</h1>
</div>
<div id="maintext">
<?php echo "共有 $numRows 筆留言 "; ?>
<div id="navigation"><a href="createMsg.php">我要留言</a></div>
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows>0) {
echo '<ul>';
$i=1;
while ( $row = mysqli_fetch_array($result) ) {
//將姓名中的特殊字元轉成 HTML 碼
$name=htmlspecialchars($row['name'], ENT_QUOTES);
//將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
$message=htmlspecialchars($row['content'], ENT_QUOTES);
$message=str_replace(' ', '&nbsp;&nbsp;', nl2br($message));




//顯示不同的背景顏色, 方便閱讀
if ($i%2==0) { $liclass='even'; }
else { $liclass='odd'; }
//顯示留言者姓名、留言日期時間、與留言內容
echo "<li class=\"$liclass\"><p><strong>$name</strong>
<em> {$row['date']}</em></p>
<p>留言：$message</p><p>客服回覆：{$row['re']}</p></li><a href=del1.php?del={$row['id']}>刪除</a>&emsp;&emsp;<a href=edit1.php?edit={$row['id']}>回覆</a>";
$i++;
} //end while
echo '</ul>';
} //end if
?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>