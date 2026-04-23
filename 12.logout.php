<?php
    // 啟用 session，用來操作登入狀態
    session_start();

    // 清除 session 中的 id（代表登出）
    unset($_SESSION["id"]);

    // 顯示登出成功訊息
    echo "登出成功....";

    // 3 秒後自動導回登入頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
