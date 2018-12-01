<?php
    require_once('conn.php');
    // htmlentities php 轉換字符為可被識讀
    function printMsg($msg, $redirect){
        echo '<script>';
        echo "alert('".htmlentities($msg, ENT_QUOTES)."');";
        echo "window.location = '" . $redirect. "'";
        echo '</script>';
    }

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nickname'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];
        
        // 塞資料
        $sql = "INSERT INTO x03177_users(username, password, nickname) VALUES ('$username', '$password', '$nickname')";
        
        // 塞資料是否成功的回應
        if ($conn->query($sql)) {
            setcookie("user",$username , time()+3600*24);
            printMsg('恭喜，註冊成功！', './index.php');
        } else {
            printMsg($conn->error, './register.php');
        }
    }else{
        printMsg('註冊失敗！請重新註冊！', './register.php');
    }
?>