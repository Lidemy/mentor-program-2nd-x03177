<?php
    include_once('check_user.php');
    require_once('conn.php');
    require_once('utils.php');
    // htmlentities php 轉換字符為可被識讀
    function printMsg($msg, $redirect){
        echo '<script>';
        echo "alert('".htmlentities($msg, ENT_QUOTES)."');";
        echo "window.location = '" . $redirect. "'";
        echo '</script>';
    }

    if(isset($_POST['add_content']) && !empty($_POST['add_content'])){
        $content = $_POST['add_content'];
        $id = $_POST['id'];
        
        $sql = "UPDATE x03177_comment SET content = '$content' WHERE id=$id";
        if ($conn->query($sql)) {
            printMsg('編輯完成！', './index.php');
        } else {
            printMsg($conn->error, $_SERVER['HTTP_REFERER']);
        }
    }else{
        // Network > Headers > RequestHeaders > Referer，從哪裡來就從哪裡回去
        printMsg('請輸入內容！', $_SERVER['HTTP_REFERER']);
    }
?>