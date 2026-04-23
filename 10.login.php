<?php
   // 建立資料庫連線（主機、帳號、密碼、資料庫名稱）
   $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

   // 查詢 user 資料表所有帳密資料
   $result = mysqli_query($conn, "select * from user");

   // 預設登入狀態為失敗
   $login = FALSE;

   // 逐筆比對資料庫帳號與使用者輸入資料
   while ($row = mysqli_fetch_array($result)) {
      if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
         $login = TRUE;   // 若符合則登入成功
      }
   }

   // 登入成功處理
   if ($login == TRUE) {
      session_start();   // 啟用 session
      $_SESSION["id"] = $_POST["id"];   // 儲存登入帳號

      echo "登入成功";
      echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; 
      // 3 秒後跳轉公告頁
   }

   // 登入失敗處理
   else {
      echo "帳號/密碼 錯誤";
      echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
      // 3 秒後返回登入頁
   }
?>
