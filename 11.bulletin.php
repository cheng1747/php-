<?php
    // 關閉錯誤訊息顯示（避免未登入時出現警告訊息）
    error_reporting(0);

    // 啟用 session 功能，用來取得登入資訊
    session_start();

    // 判斷是否已登入（session 是否存在）
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        // 若未登入，3 秒後跳回登入頁
    }
    else{

        // 顯示登入者帳號與功能選單（登出 / 使用者管理 / 新增佈告）
        echo "歡迎, ".$_SESSION["id"].
        "[<a href=12.logout.php>登出</a>] 
        [<a href=18.user.php>管理使用者</a>] 
        [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

        // 建立資料庫連線
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

        // 讀取 bulletin 資料表所有佈告資料
        $result=mysqli_query($conn, "select * from bulletin");

        // 建立表格標題列
        echo "<table border=2>
              <tr>
              <td></td>
              <td>佈告編號</td>
              <td>佈告類別</td>
              <td>標題</td>
              <td>佈告內容</td>
              <td>發佈時間</td>
              </tr>";

        // 逐筆顯示佈告資料
        while ($row=mysqli_fetch_array($result)){

            // 顯示修改與刪除功能（依佈告編號傳送參數）
            echo "<tr>
                  <td>
                  <a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
                  <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a>
                  </td><td>";

            // 顯示佈告各欄位資料
            echo $row["bid"];
            echo "</td><td>";

            echo $row["type"];
            echo "</td><td>"; 

            echo $row["title"];
            echo "</td><td>";

            echo $row["content"]; 
            echo "</td><td>";

            echo $row["time"];
            echo "</td></tr>";
        }

        // 結束
        echo "</table>";
    
    }
?>
