<?php
    require_once('conn.php');
    require_once('utils.php');
    
    // htmlentities php 轉換字符為可被識讀
    function printMsg($msg, $redirect){
        echo '<script>';
        echo "alert('".htmlentities($msg, ENT_QUOTES)."');";
        echo "window.location = '" . $redirect. "'";
        echo '</script>';
    }
    
    if(isset($_POST['username']) && isset($_POST['password']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //資料如果確定就回傳資料並給暱稱資料
        // 核對資料
        $sql = "SELECT * FROM x03177_users WHERE username='$username' ";
            
        // 核對資料是否成功的回應
        $result = $conn->query($sql);
        // 沒有 result，例如帳密錯誤
        if(!$result){
            printMsg($conn->error, './login.php');
            exit();
        }
        // 還要確認是否有接收到東西
        if($result -> num_rows <=0){
            printMsg('帳號或密碼錯誤！', './login.php');
            exit();
        }
        $row = $result->fetch_assoc();
        $hash_password = $row['password'];
        if(password_verify($password, $hash_password)) {
            setToken($conn, $username);
            printMsg('登入成功！', './index.php');
        } else {
            printMsg('帳號或密碼錯誤！', './login.php');
            exit();
        }
    }else{
        printMsg('登入失敗！請重新登入！', './login.php');
    }
?>