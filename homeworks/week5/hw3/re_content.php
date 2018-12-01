<?php
    require_once('conn.php');
    // htmlentities php 轉換字符為可被識讀
    function printMsg($msg, $redirect){
        echo '<script>';
        echo "alert('".htmlentities($msg, ENT_QUOTES)."');";
        echo "window.location = '" . $redirect. "'";
        echo '</script>';
    }

    if(isset($_POST['re_content']) && !empty($_POST['re_content'])){
        $parent_id = $_POST['parent_id']; 
        $content = $_POST['re_content'];
        $username = $_COOKIE['user'];
        
        // 塞資料
        $sql = "INSERT INTO x03177_comment(username, content, state) VALUES ('$username', '$content', '$parent_id')";
        
        // 塞資料是否成功的回應
        if ($conn->query($sql)) {
            printMsg('留言成功！', './index.php');
        } else {
            printMsg($conn->error, './index.php');
        }
    }else{
        printMsg('請輸入內容！', './index.php');
    }
?>