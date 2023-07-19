<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>會員登入</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	</head>
	
	<body class="container">
    <?php
      include("mysql.inc.php");
      session_start();
      ?>
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
                <button type="button" class="text-bg-light position-relative" onclick="location.href='act.php'">活動
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
            
           
            
            
          </div>
        </div>
      </div>
    </nav>
		<br><br><br><br><br><br>
		<form action="login_code.php" method="POST" >
			
			<div class="form-floating mb-3 ">
	          <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" id="username">
	          <label for="floatingInput">帳號</label>
        	</div>
	        <div class="form-floating">
	          <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password" id="password">
	          <label for="floatingPassword">密碼</label>
	        </div>
	        <br>
	        <input type="submit" class="btn btn-outline-secondary" name="login" value="登入"></button>
	        <button type="button" class="btn btn-outline-secondary" onclick="location.href='user.php'">註冊</button>
		</form>
        
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</body>
</html>