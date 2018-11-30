<?php
    include_once('./check_user.php');
    require_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板 week5</title>
    <link rel="stylesheet" type="text/css" href="./css.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>留言板</h1>
            <div class="logInOut">
                <?php
                    // 有 cookie 就看到「Hi, user」和「登出」；沒有就看到「註冊」和「登入」
                    if($user){
                        echo '<h3>Hi, '. $user .'</h3>';
                        echo '<h3><a href="./logout.php">登出</a></h3>';
                    }else{
                        echo '<h3><a href="./register.php">註冊</a></h3>';
                        echo '<h3><a href="./login.php">登入</a></h3>';
                    }
                ?>
            </div>
        </div>
        
        <!-- 主留言寫入 -->
        <form class="mainCom" action="./add_content.php" method="POST">
            <?php 
            if($user){
            ?>
            <div class="commentInfo">
                <div class="nick">
                    <?php
                    $sql = "SELECT * FROM x03177_users WHERE username = '$user' ";
                    $result = $conn->query($sql);
                    if($result){
                        while($row = $result->fetch_assoc()){
                            echo $row['nickname'];
                        }
                    }
                    ?>
                </div>
            </div>
            <textarea class="mainText" name="add_content" rows="5" placeholder="留言內容"></textarea>
            <input type="submit" value="留言">
            <?php    
            }else{
            ?>
            <div class="commentInfo">
                <div class="nick">
                    訪客
                </div>
            </div>
            <div class="reLogin">
                <a href="./login.php">登入留言</a>
            </div>
            <?php
            }
            ?>
        </form>

        <!-- 留言列表 -->
        <div class="reList">
            <?php
            // 查詢主留言
            $pages_sql = " SELECT * FROM x03177_comment WHERE state=0 ";
            $pages_result = $conn->query($pages_sql);
            $pages_row = $pages_result->num_rows;// 總筆數
            $per = 10; //每頁筆數
            $pages = ceil($pages_row / $per); //總頁數

            // 目前所在頁碼
			if(!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = intval($_GET['page']);
            }
            
            $sql = "
                SELECT c.id, c.content, c.created_at, c.state, u.nickname 
                FROM x03177_comment as c 
                LEFT JOIN x03177_users as u ON c.username = u.username 
                WHERE state=0 
                ORDER BY c.id DESC
                LIMIT " . ($page-1)*$per ." , " . $per  ;
            $result = $conn->query($sql);
            if($pages_row>0){
                while($row = $result->fetch_assoc()){
                    ?>
                    <!-- 顯示主留言 -->
                    <div class="reInfo">
                        <div class="mainNick">
                            <?php echo $row['nickname'] ?>
                        </div>
                        <div class="time">
                            <?php echo $row['created_at'] ?>
                        </div>
                    </div>
                    <div class="reListText">
                        <?php echo $row['content'] ?>
                    </div>
                    <!-- 子留言寫入 -->
                    <?php
                    if($user){
                        ?>
                        <form class="reCom" action="./re_content.php" method="POST">
                            <div class="nick">
                                <?php echo $_COOKIE["user"]; ?>
                            </div>
                            <textarea class="reText" name="re_content" rows="5" placeholder="回覆內容"></textarea>
                            <!--對應主留言的 id 識別 -->
                
                            <input type="hidden" name="parent_id" value=<?php echo $row['id']; ?> />
                            <input type="submit" value="回覆">
                        </form>
                        <?php
                    }else{
                        ?>
                        <div class="reLogin">
                            <a href="./login.php">登入回覆</a>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <!-- 顯示子留言 -->
                    <div class="reComList">
                        <?php
                        $re_sql = "
                            SELECT c.id, c.content, c.created_at, c.state, u.nickname ,u.username 
                            FROM x03177_comment as c 
                            LEFT JOIN x03177_users as u ON c.username = u.username
                            WHERE c.state = " . $row['id'] . " 
                            ORDER BY c.created_at DESC
                            ";
                        // query($re_sql) 中的 $re_sql 只會被用到一次
                        $re_result = $conn->query($re_sql);
                        if($re_result->num_rows > 0){
                            // $re_result 最後一個 bug 就是子留言覆蓋主留言的 result（一開始相同命名）
                            while($re_row = $re_result->fetch_assoc()){
                                ?>
                                <div class="reInfo">
                                    <div class="nick">
                                        <?php echo $re_row['nickname'] ?>
                                    </div>
                                    <div class="time">
                                        <?php echo $re_row['created_at'] ?>
                                    </div>
                                </div>
                                <div class="reListText">
                                    <?php echo $re_row['content'] ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                } 
            }
            ?>
        </div>

        <!-- 頁數 -->
        <div class="pages">
            <a href="javascript:void(0)" class="page">&#60;</a>
            <?php
            for($i=1; $i<=$pages; $i++){
            ?>
                <a href=?page=<?php echo $i ?> class="page"><?php echo $i ?></a>
            <?php
            } 
            ?>
                <a href=?page=2 class="page next">&#62;</a>
        </div>
    </div>

</body>
</html>