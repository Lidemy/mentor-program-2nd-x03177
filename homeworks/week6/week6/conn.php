<?php
    // 伺服器透過這些資料要求資料庫給資料
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    
    // 編碼問題
    // 新增 table 的時候確保編碼是 utf8_general_ci

    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 來設定編碼
    $conn->query("SET NAMES 'UTF8'");
    // 設定時區
    $conn->query("SET time_zone = '+08:00'");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>