<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>活動</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#D2E9FF;">
	<!-- 選單 -->
    
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
              <?php if (!empty($_SESSION['userid'])) {
                 echo '<li class="nav-item">
                <a class="nav-link" href="index.php">會員登入</a>
              </li>';}
              else{
                echo '<li class="nav-item">
                <a class="nav-link" href="logout.php">登出</a>
              </li>';
              }
                
              ?>
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
                <button type="button" class="text-bg-light   position-relative"　onclick="location.href='act.php'">活動
                  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                  </span>
                </button>
              </li>

              <br>

              <li>
                <button type="button" class="text-bg-light position-relative" onclick="location.href='pic.php'">優惠券
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
            <br>
            <?php
              session_start();
              $userid = $_SESSION['userid'];
              //連線mysql
              $con = mysqli_connect('localhost','root','', 'data');
              //驗證mysql連線是否成功
              if(mysqli_errno($con)){
               
                   
                echo "連線mysql失敗：".mysqli_error($con);
                exit;
              }
              //sql查詢語句
              $sql = "SELECT * FROM user WHERE id='{$userid}'";
              //執行
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_assoc($result);
              $name = $row['username'];
              $pass = $row['password'];
              $admin= $row['admin'];
              mysqli_close($con);
              echo '使用者名稱：';
              echo $name.'<br>';
              echo '密碼：';
              echo $pass.'<br>';
              echo '權限：';
              echo $admin;
            ?>
          </div>
        </div>
      </div>
    </nav>
    <br><br><br><br>
  
    <div class="container">
	    

      <form action="act.php" method="post" enctype="multipart/form-data">
	選擇檔案:<input type="file" name="myfile" id="myfile" /><br/>
	<input type="submit" name="submit" value="上傳檔案" />	
    	<?php
			if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
			    $file='upload/'.basename($_FILES['myfile']['name']);
			    if(move_uploaded_file($_FILES['myfile']['tmp_name'], $file)){
			        if($_FILES['myfile']['type']=='image/png' || $_FILES['myfile']['type']=='image/jpeg'){//判斷檔名是否為圖檔
			            echo '<br>';
			            // echo $_FILES['myfile']['name'];//檔案名稱
			            // echo '<br>';
			            // echo $_FILES['myfile']['size'], ' byte';//檔案大小
			            // echo '<br>';
			            // echo $file, '上傳成功。';
			            echo '<p><img src="',$file,'"></p>';
			        }else{//如果不為圖檔的話
			            echo '此副檔名需為jpg.jpge.png';
			        }
			    }else{
			        echo '上傳失敗。';
			    }
			}else{
			    echo '請選擇檔案。';
			}

			?>
		
		

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


		<div data-date="<?php echo '2023-07-18 11:00:00' ; ?>" id="cd_timer"></div>
			<script>
			 $(function () {
			 $("#cd_timer").TimeCircles();
			 });
			</script>
		</div>
		
	</div>
	
	<!-- <?php

	if (isset($_POST['target_date'])) {
	    $target_date = strtotime($_POST['target_date']);
	} else {
	    $target_date = time();
	}
	?>

	<form method="post">
	  <label>輸入日期</label>
	  <input type="date" name="target_date" value="<?php echo date('Y-m-d', $target_date); ?>"/>
	  <button type="submit">計算</button>
	</form>

	<p id="countdown"></p>

	<script language="javascript">
	var targetDate = <?php echo $target_date; ?> * 1000; 


	function updateCountdown() {
	  var now = new Date().getTime();         
	  var remainingTime = targetDate - now;   
	  var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

	  var countdownElement = document.getElementById("countdown");   
	  countdownElement.innerHTML = "距離目標日期還有" + days + " 天 " + hours + " 小時 " + minutes + " 分 " + seconds + " 秒 ";
	}

	setInterval(updateCountdown, 1000);   
	</script> -->




</body>
</html>