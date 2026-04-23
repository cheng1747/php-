<html>
    <head><title>使用者管理</title></head>
    <body>

    <?php
        // 關閉錯誤訊息顯示（避免出現警告或錯誤畫面）
        error_reporting(0);

        // 啟動 session（用來判斷是否已登入）
        session_start();

        // 檢查是否有登入資訊
        if (!$_SESSION["id"]) {

            // 若未登入，顯示提示訊息
            echo "請登入帳號";

            // 3 秒後自動跳回登入頁
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   

            // 顯示頁面標題與功能選單
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] 
                [<a href=11.bulletin.php>回佈告欄列表</a>]<br>

                <!-- 建立使用者資料表 -->
                <table border=1>
                    <tr>
                        <td></td>
                        <td>帳號</td>
                        <td>密碼</td>
                    </tr>";
            
            // 連接資料庫（主機、帳號、密碼、資料庫名稱）
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

            // 查詢 user 資料表所有資料
            $result=mysqli_query($conn, "select * from user");

            // 逐筆讀取資料並輸出
            while ($row=mysqli_fetch_array($result)){

                // 顯示每一筆使用者資料列
                echo "<tr>
                        <td>
                            <!-- 修改使用者資料（傳送 id） -->
                            <a href=19.user_edit_form.php?id={$row['id']}>修改</a>||

                            <!-- 刪除使用者資料（傳送 id） -->
                            <a href=17.user_delete.php?id={$row['id']}>刪除</a>
                        </td>

                        <!-- 顯示帳號 -->
                        <td>{$row['id']}</td>

                        <!-- 顯示密碼（明碼顯示，不安全） -->
                        <td>{$row['pwd']}</td>
                      </tr>";
            }

            // 結束表格
            echo "</table>";
        }
    ?> 

    </body>
</html>
