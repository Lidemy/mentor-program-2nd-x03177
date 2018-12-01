<?php
    if(isset($_COOKIE['user']) && !empty($_COOKIE['user'])){
        $user = $_COOKIE['user'];
    }else{
        // 未登入頁面時沒有設置COOKIE
        $user = null;
    }
?>