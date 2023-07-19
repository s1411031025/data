<?php
include("mysql.inc.php");
//如果網頁表單的 cid 與 des 欄位都不是空字串
if (!empty( $_POST['cid'] )&& !empty( $_POST['des'] )){
	//將輸入框的資料新增至 【category】 資料表
	$sql="INSERT INTO menu (cid, did, des) VALUES ('" . $_POST['cid']."', '".

		$_POST['did']."', '". $_POST['des']."');";

	//把 SQL 印出來檢查, 之後要刪除
	//echo $sql;
	//進行資料庫新增
	mysqli_query($conn, $sql);
}
?>
				<!-- <?php

				$perpage=5; // 每頁顯示 7 筆
				//查詢【books】資料表的記錄
				$sql = "SELECT * FROM menu";
				$result=mysqli_query($conn, $sql);
				//取得查詢結果的筆數
				$totalrow=mysqli_num_rows($result);
				$totalpage=ceil($totalrow/$perpage); // 計算總頁數,,ceil()函數回傳無條件進入整數
				// 將全部資料都存到 $data 陣列中(陣列結構比較方便隨時讀取其中的資料)
				While ($arr=mysqli_fetch_array($result))
					$data[] = $arr;
				// 根據 $_GET['page'] 參數值決定從第幾頁開始顯示
				// 以下 if 判斷四種狀況,成立時頁次的變數 $page 由 1 起算
				if( empty($_GET['page']) || !is_numeric($_GET['page'])
										|| $_GET['page']<1
										|| $_GET['page']>$totalpage )

					$page=1;
				else
					$page=$_GET['page'];

				?> -->



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MENU</title>
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
  		<!-- <?php
		include("mysql.inc.php");
		//預設網頁開啟時的查詢
		$sql="SELECT * FROM menu ORDER BY des ASC";
		//若是按下 "搜尋"
		if( isset($_POST["actSrh"]) ) {
			$strSrh = ""; //暫存 SQL 語法中的 WHERE 子句
			$nowBook=""; //暫存目前要查詢的書名
			$nowQt=""; //暫存目前要查詢的數量
			//判斷使用者的查詢條件,並產生對應的 SQL 語法
		if (!empty($_POST['nameSrh']) && !empty($_POST['qtySrh'])){
			$nowBook=$_POST['nameSrh'];
			$nowQt=$_POST['qtySrh'];
			$strSrh = "WHERE des Like '%".$nowBook."%' ";
		}
		
		else{;}
		//組合 SQL 語法
		$sql="SELECT * FROM menu ".$strSrh." ORDER BY did ASC";
		//這是是測試用, 把 SQL 語法顯示在畫面上
		// echo "</br>".$sql;
		}

		

		//查詢: 如果是第一次載入, 則會執行預設的$sql, 若是按下 [搜尋]鈕, 則執行組合後的$sql
		$result=mysqli_query($conn, $sql);
		?> -->
		
		<!—自資料庫取得下拉式選單的值 -->
		<?php
			//自資料庫取得 “數量” Distinct 的值
			$sql_Qt = "SELECT DISTINCT cid FROM menu ";
			$list_Qt =mysqli_query($conn, $sql_Qt);
			//這是是測試用, 顯示數量的筆數
			$list_no = mysqli_num_rows($list_Qt);
			// echo "<br>筆數: ".$list_no."</br>";
			echo "<hr />";
		?>
		<!-- 表單 -->
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
			<table border="0">
				<tr>
					<td>名稱:<input name="nameSrh"></td>
					<td>類別:<select name="qtySrh">
						<?php
							echo "<option value='' selected>請選擇</option>\n";

							//使用迴圈將查詢結果加入清單中
							//當$Qt_result 不是空值時, 迴圈繼續
							while($Qt_result = mysqli_fetch_assoc($list_Qt)){
							$strQt = (string) $Qt_result['cid'];
							echo "<option value=".$strQt." >$strQt</option>\n";
							}
						?>
					</td>
					<td>
						<input name="actSrh" type="submit" value="搜尋">
					</td>
				</tr>
			</table>
		</form>

		<!-- <?php

		//如果 $result 查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
		if (mysqli_num_rows($result) >0){
			echo "<hr /><table border='1'> <tr><td>餐點種類</td><td>編號</td><td>餐點名稱</td></tr>";
			while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
			<td>{$row['cid']}</td>
			<td>{$row['did']}</td>
			<td>{$row['des']}</td>
			</tr>";

			}
		echo '</table>';
		}
		?> -->



		<!--建立一個新增類別的表單 -->
		
			<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
			  <div class="row">
			  	   	<div class="col-3">
						餐點種類: <select  name="cid" class="form-select" aria-label="Default select example" >
										<option>請選擇種類</option>
									    <option value="低糖無澱粉餐">低糖無澱粉餐</option>
									    <option value="高蛋白餐">高蛋白餐</option>
									    <option value="地中海飲食" >地中海飲食</option>
									    <option value="DASH心血管保養餐">DASH心血管保養餐</option>
									    <option value="211健康餐">211健康餐</option>
									    <option value="早餐">早餐</option>
									</select>
					</div>
					<div class="col-4">
						編號: <input name="did"  id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" >
					</div>		
					<div class="col-4">
						類別名稱: <input name="des"  id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
					</div>
					<div class="col-1">
						<br><input class="btn btn-primary" name="submit" type="submit" value="新增">
					</div>
			   </div>
			</form>
			
		<?php
		$perpage=5; // 每頁顯示 7 筆
		//使用【所屬類別】排序, 查詢 【category】 資料表的所有資料
		$sql= "SELECT * FROM menu ORDER BY did,cid";
		$result=mysqli_query($conn, $sql);
		//如果查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
		$totalrow=mysqli_num_rows($result);
		$totalpage=ceil($totalrow/$perpage); // 計算總頁數,,ceil()函數回傳無條件進入整數
		// 根據 $_GET['page'] 參數值決定從第幾頁開始顯示
		// 以下 if 判斷四種狀況,成立時頁次的變數 $page 由 1 起算
		if( empty($_GET['page']) || !is_numeric($_GET['page'])
						|| $_GET['page']<1
						|| $_GET['page']>$totalpage )

			$page=1;
		else
			$page=$_GET['page'];



		//預設網頁開啟時的查詢
		$sql="SELECT * FROM menu ORDER BY did ASC";
		//若是按下 "搜尋"
		if( isset($_POST["actSrh"]) ) {
			$strSrh = ""; //暫存 SQL 語法中的 WHERE 子句
			$nowBook=""; //暫存目前要查詢的書名
			$nowQt=""; //暫存目前要查詢的數量
			//判斷使用者的查詢條件,並產生對應的 SQL 語法
		if (!empty($_POST['nameSrh']) && !empty($_POST['qtySrh'])){
			$nowBook=$_POST['nameSrh'];
			$nowQt=$_POST['qtySrh'];
			$strSrh = "WHERE des Like '%".$nowBook."%' ";
		}
		
		else{;}
		//組合 SQL 語法
		$sql="SELECT * FROM menu ".$strSrh." ORDER BY did ASC";
		//這是是測試用, 把 SQL 語法顯示在畫面上
		// echo "</br>".$sql;
		}

		

		//查詢: 如果是第一次載入, 則會執行預設的$sql, 若是按下 [搜尋]鈕, 則執行組合後的$sql
		$result=mysqli_query($conn, $sql);
		if ( mysqli_num_rows($result) >0 ){
			//echo "<hr /><table border='1'> <tr><td>餐點種類</td><td>編號</td><td>餐點名稱</td></tr>";
			echo '<table class="table table-hover">';
			echo '<thead >';
			echo    '<tr >
			      <th scope="col">餐點種類</th>
			      <th scope="col">編號</th>
			      <th scope="col">餐點名稱</th>
			      <th scope="col" colspan = 2 >操作</th>
			    </tr>
			  </thead>';
			// for( $i=0; $i<$perpage; $i++) {   //perpage=5
			// // 根據頁碼計算要顯示第幾筆資料
			// 	$index = ($page-1) * $perpage + $i; //初始$page=1 => $index= 0 +$i; $i =0~6
			// 	if($index>=5)
			// 		break; //索引超出範圍即跳出迴圈(最後一頁)
			while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
			<td>{$row['cid']}</td>
			<td>{$row['did']}</td>
			<td>{$row['des']}</td>
			<td><a href=del.php?del={$row['did']}>刪除</a></td>
		 	<td><a href=edit.php?edit={$row['did']}>編輯</a></td
			</tr>";

			// }

			}

			// echo '<table class="table table-hover">';
			// echo '<thead >';
			// echo    '<tr >
			//       <th scope="col">餐點種類</th>
			//       <th scope="col">編號</th>
			//       <th scope="col">餐點名稱</th>
			//       <th scope="col" colspan = 2 >操作</th>
			//     </tr>
			//   </thead>';
			// echo  '<tbody class="table-group-divider">';
		// 	while ( $row = mysqli_fetch_array($result) ) {
		// 		for( $i=0; $i<$perpage; $i++) {
		// 		// 根據頁碼計算要顯示第幾筆資料
		// 			$index = ($page-1) * $perpage + $i; //初始$page=1 => $index= 0 +$i; $i =0~6
		// 			if($index>=count($row))
		// 				break; //索引超出範圍即跳出迴圈(最後一頁)
		// 		echo '<tr><td>'.$row["cid"].'</td>
		// 					<td>'.$row["did"].'</td>
		// 					<td>'.$row["des"].'</td>
		// 					<td><a href=del.php?del='.$row['did'].'>刪除</a></td>
		// 					<td><a href=edit.php?edit='.$row['did'].'>編輯</a></td>
		// 			   	</tr>';
		// 	}		
			echo '</tbody></table>';
			echo '<p>目前資料筆數:'.$totalrow.'</p>';
			
		// }
			// 用迴圈輸出目前頁次的資料 (perpage = 7)
			// for( $i=0; $i<$perpage; $i++) {
			// // 根據頁碼計算要顯示第幾筆資料
			// 	$index = ($page-1) * $perpage + $i; //初始$page=1 => $index= 0 +$i; $i =0~6
			// 	if($index>=count($data))
			// 		break; //索引超出範圍即跳出迴圈(最後一頁)

				
			// 	echo '<tr>';
			// 	echo "<td>{$data[$index]['cid']}</td>"; //事先將查詢資料存入陣例的優點
			// 	echo "<td>{$data[$index]['did']}</td>"; //可以使用索引直接取得某筆資料的某個值
			// 	echo "<td>{$data[$index]['des']}</td>";
			// 	echo '<td><a href=del.php?del='.$data[$index]['did'].'>刪除</a></td>
		 // 		<td><a href=edit.php?edit='.$data[$index]['did'].'>編輯</a></td>';
			// 	echo '</tr>';
			// }
			// echo '</table>';

			// 輸出直接跳頁的連線
		// 	echo '<p>';
		// 	for( $i=1; $i<=$totalpage; $i++){
		// 		if($i!=1) echo "&nbsp;"; //第一頁前面不要空格,其他先印空格再顯示頁碼
		// 		if($i==$page) echo $i; //當頁不加超連結
		// 		else //其他頁加超連結
		// 			echo sprintf("<a href='%s?page=%d'>%d</a>", $_SERVER['PHP_SELF'], $i , $i);
		// 		// sprintf:使用格式輸出字串
		// 		// $_SERVER['PHP_SELF']取得當前正在執行的網頁檔案名稱
		// 		//提供前面$_GET['page']的值
		// 	}
		// 	echo '</p>';
		}
		
		?>
		

		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>





</body>
</html>