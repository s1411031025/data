<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/a1.css" rel="stylesheet">
  </head>
  <body style="background-color:#D2E9FF;">
  	<?php
		include("mysql.inc.php");
	?>
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


    
    

<!-- 小頭像 -->
</div>

  <header class="container1">
    <style type="text/css">
      .photo{
        width: 200px;
        height: 150px;
        border-radius: 50%;
        display: flex;
      }
      .container1{
        margin:0 auto;
        width: 600px;
      }

    </style>
    <div style="width:40%;float:left">

    <div style="width:30%;float:right"> 
    <img src="img/7.jfif" class="photo" />
    <br>
    <h4><span class="badge bg-secondary">您好，歡迎選購健康餐盒</span></h4>

  </header>

<br><br><br><br><br><br><br><br>
<br><br>


<!-- 輪播圖 -->
  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

  <?php
      include("mysql.inc.php");

      $result=mysqli_query($conn, "SELECT img FROM imginfo WHERE flag = 1");
  $i = 0;
  while ($row=mysqli_fetch_array($result)) {
    if ($i == 0) {
      echo '<div class="carousel-item active">';
      echo '<img src="img/'.$row[0].'" class="d-block w-100" >';
      echo '</div>';
      $i = 2;
    }
    else{
      echo '<div class="carousel-item">';
    echo '<img src="img/'.$row[0].'" class="d-block w-100">';
    echo '</div>';
    }
  }
  ?>
 <!-- 原來的 -->
 <!--    <div class="carousel-item active">
      <img src="img/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/3.jpg" class="d-block w-100" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>

<br><br>

<!-- 3張圖 -->
  <div class="container text-center">
    <div class="row">
      <?php
      $result=mysqli_query($conn, "SELECT img FROM imginfo WHERE flag = 2");
      while ($row=mysqli_fetch_array($result)) {
        echo '<div class="col">';
        echo '<img src="img/'.$row[0].'">';
        echo '</div>';
      }
      ?>
    <!-- <div class="col">
      <img src="img/4.jpg">
    </div>
    <div class="col">
      <img src="img/5.jpg">
    </div>
    <div class="col">
      <img src="img/6.jpg">
    </div>
 -->  </div>
  </div>

<br>
<br>
<!-- 5張圖 -->
  <div class="container text-center">
    <div class="row">
      <?php
        

        $result=mysqli_query($conn, "SELECT img  FROM imginfo WHERE flag = 3");
        mysqli_data_seek($result,0);
        while ($row=mysqli_fetch_array($result)){
        
        echo '<div class="card col-4">';
        echo '<img src="img/'.$row[0].'" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<div class="spinner-grow text-danger" role="status">';
        echo '<span class="visually-hidden">Loading...</span>';
        echo '</div>熱銷<br>';
        echo '<a href="add.php" class="btn btn-primary">菜單內容</a>';
        echo '</div>';
        echo '</div>';
        }
      ?>
<!--       <div class="card col-6">
        <img src="img/8.jpg" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          
          <a href="#" class="btn btn-primary">菜單內容</a>
        </div>
      </div>
      <div class="card col-6">
        <img src="img/9.jpg" class="card-img-top" alt="...">

        <div class="card-body">
          
          <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>熱銷<br>
          <a href="#" class="btn btn-primary">菜單內容</a>
        </div>
      </div> -->
    </div>

    <!-- <div class="row">
      <div class="card col-4">
        <img src="img/10.jpg" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">菜單內容</a>
        </div>
      </div>
      <div class="card col-4">
        <img src="img/11.jpg" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">菜單內容</a>
        </div>
      </div>
      <div class="card col-4">
        <img src="img/12.jpg" class="card-img-top" alt="...">

        <div class="card-body">
          
          
           <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>熱銷<br>
          <a href="#" class="btn btn-primary">菜單內容</a>
        </div>
      </div>
    </div> -->
  </div>

<br>
<br>
<br>
<!-- 常見問題 -->
  <div class="container text-center">
    
   
    <h4>常見問題</h4>
     <p>

      <?php 
        $result=mysqli_query($conn, "SELECT id,title  FROM imginfo WHERE flag = 4");
        while ($row=mysqli_fetch_array($result)){
          echo '<button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample'.$row[0].'" aria-expanded="false" aria-controls="multiCollapseExample2">'.$row[1].'</button>';
        }

      ?>
    <!--   <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample2">設計菜色理念？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">我們是如何運作？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">如何聯絡我們？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">餐點保存期限？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">詳細營養資訊在哪？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample6" aria-expanded="false" aria-controls="multiCollapseExample6">餐點中有家精緻糖嗎？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample7" aria-expanded="false" aria-controls="multiCollapseExample7">如果吃完還很餓怎麼辦？</button>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample8" aria-expanded="false" aria-controls="multiCollapseExample8">我該如何加熱？</button>
      -->
    </p>
    <div class="row">
      <?php 
        $result=mysqli_query($conn, "SELECT id,info  FROM imginfo WHERE flag = 4");
        while ($row=mysqli_fetch_array($result)){
          echo '<div class="col-6">'; 
          echo  '<div class="collapse multi-collapse" id="multiCollapseExample'.$row[0].'">'; 
          echo    '<div class="card card-body">'.$row[1].'';
          echo    '</div>';
          echo   '</div>';
          echo  '</div>';
        }
      ?>
    </div>
    <!-- <div class="row">
      <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample13">
          <div class="card card-body">
            在好準食，我們的理念是讓每個人都能享受健康飲食。我們堅信攝取大量新鮮的全食物使身體充滿能量和營養，非常適合維持健康與平衡的生活方式。
          </div>
        </div>
      </div>
      <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample2">
          <div class="card card-body">
           我們提供健康的冷凍餐盒宅配服務。只需選擇適合您的飲食計劃。我們採購新鮮的食材，將它們製成健康、美味的餐點，送到您的家中或工作場所。當您需要時只需重新加熱即可享用！
          </div>
        </div>
      </div>
    </div>
    <div class="row">
       <div class="col-6">
          <div class="collapse multi-collapse" id="multiCollapseExample3">
            <div class="card card-body">
              通過line聯繫我們的團隊這裡或發給我們電子郵件info@my.healthydiet.com.tw
            </div>
          </div>
        </div>
        <div class="col-6">
            <div class="collapse multi-collapse" id="multiCollapseExample4">
              <div class="card card-body">
                冷凍庫（攝氏-18度以下），可保存180天。冷藏（攝氏7度以下），可保存5天。
              </div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-6">
          <div class="collapse multi-collapse" id="multiCollapseExample5">
            <div class="card card-body">
              我們的營養成分可以在菜單頁，點擊感興趣的餐點。在餐點的彈窗中，可以看到詳細的營養成分。我們在餐盒標籤上也有詳細的營養資訊。
            </div>
          </div>
        </div>
        <div class="col-6">
            <div class="collapse multi-collapse" id="multiCollapseExample6">
              <div class="card card-body">
                我們避免在餐點中使用精緻糖，但在少數餐點中添加蜂蜜。
              </div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-6">
          <div class="collapse multi-collapse" id="multiCollapseExample7">
            <div class="card card-body">
              如果您在吃了我們的餐點後仍然很餓，我們建議您吃一份沙拉或水果。
            </div>
          </div>
        </div>
        <div class="col-6">
            <div class="collapse multi-collapse" id="multiCollapseExample8">
              <div class="card card-body">
                  好準食餐盒製作時已經完全煮熟，當您需要時加熱後即可使用，有以下幾種加熱方式。
                  微波：撕開保護膜的一角，放入微波爐加熱2-3分鐘（退冰）、加熱6-8分鐘（未退冰），加熱時間可能因微波爐不同而異。
                  電鍋：將包裝拆除移到盤中，放入1/2杯水（150ml），待電鍋跳起。
                  烤箱：將包裝拆除移到盤中，170度加熱7分鐘或到達食用溫度。
                  平底鍋：將包裝拆除放到鍋中，加熱至所需溫度。
              </div>
            </div>
        </div>
    </div> -->
  </div>  



<br>
<br>
<!-- 表單 -->
<div class="container text-center">
  <div class="row">
    <div class="col">
          <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">電子信箱</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">建議</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">最喜歡我們哪一類？</label>
      <select class="form-select" aria-label="Default select example">
      
      <option value="1">高蛋白餐</option>
      <option value="2">地中海飲食</option>
      <option value="3">211健康餐</option>
      </select>
       <label for="exampleFormControlInput1" class="form-label">透過什麼管道知道我們？</label>
      <select class="form-select" aria-label="Default select example">
     
      <option value="1">廣告</option>
      <option value="2">朋友介紹</option>
      <option value="3">自己搜尋到的</option>
      </select>
       <label for="exampleFormControlInput1" class="form-label">一個禮拜吃健康餐的頻率？</label>
      <select class="form-select" aria-label="Default select example">
    
      <option value="1">1-3次</option>
      <option value="2">4-5次</option>
      <option value="3">6-7次</option>
      </select>
      <br>
      <button type="button" class="btn btn-warning">確認送出</button>
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">哪些因素吸引你回訪購買？</label>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          平價
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
          食物美味
        </label>
      </div>
       <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
          服務好
        </label>
      </div>
      <label for="exampleFormControlInput1" class="form-label">服務滿意度？</label>
      <label for="customRange1" class="form-label"></label>
      <input type="range" class="form-range" id="customRange1">
      <label for="exampleFormControlInput1" class="form-label">回購意願度？</label>
      <label for="customRange1" class="form-label"></label>
      <input type="range" class="form-range" id="customRange1">
      </div>
  </div>
  </div>



<br>
<br>
<!-- 頁數 -->
  <div class="container sticky-bottom">
    <div class="row">
      <div class="col-5"></div>
        <div class="col-4">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      <div class="col-4"></div>
  </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>