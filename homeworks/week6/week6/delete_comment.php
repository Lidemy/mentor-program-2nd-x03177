<?php
    include_once('check_user.php');
    require_once('conn.php');
    require_once('utils.php');
    
    function printMsg($msg, $redirect){
        echo '<script>';
        echo "alert('".htmlentities($msg, ENT_QUOTES)."');";
        echo "window.location = '" . $redirect. "'";
        echo '</script>';
    }

    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = $_POST['id'];
        
        
        $sql = "DELETE FROM x03177_comment WHERE id=$id or state=$id";
        
        
        if ($conn->query($sql)) {
            printMsg('刪除成功！', './index.php');
        } else {
            printMsg($conn->error, './index.php');
        }
    }else{
        printMsg('錯誤！', './index.php');
    }
?>