<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<title>優惠券</title>
</head>
<body style="background-color:#D2E9FF;">
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
                <button type="button" class="text-bg-light   position-relative" onclick="location.href='act.php'">活動
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
            <form action="pic.php" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">
          <p><strong>上傳圖片一：</strong><br />
              <input name="file0" type="file" id="file0" />
          </p>
        <p><strong>上傳圖片二：</strong><br />
              <input name="file1" type="file" id="file1" />
          </p>
          <p><strong>上傳圖片三：</strong><br />
              <input name="file2" type="file" id="file2" />
          </p>
          <p>
            <input name="Submit" type="submit" value="開始上傳"/>
            <input type="reset" name="button" id="button" value="清除" />
          </p>
        </form>
        <?php
        // 上傳檔將存入此路徑裡的 uploads 資料夾
        $upload_dir = "upload/";
        // 上傳檔總數
        $total_uploads = 3;
        // 上傳檔大小限制，此處限制為400KB
        $size_bytes =400 * 1024;
        // 副檔名限制
        $limitedext = array(".gif",".jpg",".jpeg",".png");
        echo "<h3>優惠卷內容</h3>";
        // 用迴圈讀取上傳欄位資料
        for ($i = 0; $i < $total_uploads; $i++) {
           $new_file = $_FILES['file'.$i];
           // 讀取上傳檔名
           $file_name = $new_file['name'];
            // 把檔名中的空格替換成 "_"
           $file_name = str_replace(' ', '_', $file_name);
           // 存入暫存區的檔名
           $file_tmp = $new_file['tmp_name'];
           // 檔案大小
           $file_size = $new_file['size'];
           // 判斷欄位是否指定上傳檔案…
           if (!is_uploaded_file($file_tmp)) {
                // 沒有上傳檔，顯示訊息。
              echo "欄位 $i: 沒有選取上傳檔案。<br />";
           }else{
            // 若有上傳檔，則取出該檔案的副檔名
             $ext = strrchr($file_name,'.');
             // 判斷副檔名是否符合預期
             if (!in_array(strtolower($ext),$limitedext)) {
                // 不符合預期，顯示錯誤訊息。
                echo "欄位 $i: ($file_name) 的檔案副檔名有誤（只允許GIF和JPEG檔） <br />";
             }else{
                // 檢查檔案是否太大
               if ($file_size > $size_bytes){
                   echo "欄位 $i: ($file_name) 無法上傳，請檢查檔案是否小於 ". $size_bytes / 1024 ." KB。<br />";
               }else{
                   if (move_uploaded_file($file_tmp,$upload_dir.$file_name)) {
                       // echo "欄位 $i: ($file_name) 上傳成功！<br />";
                       echo '<p><img src="upload/',$file_name,'"></p>';
                   }else{
                        echo "欄位 $i: 無法上傳。<br />";
                   }
               }
             }
           }
        }
        ?>
    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>