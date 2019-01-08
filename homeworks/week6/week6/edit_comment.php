<?php
    include_once('check_user.php');
    require_once('conn.php');
    include_once('utils.php');
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
            <h1>編輯留言</h1>
        </div>
        
        <!-- 編輯留言 -->
        <form class="mainCom" action="./check_edit_comment.php" method="POST">
            <input type="hidden" value="<?php echo $_GET['id']?>" name="id"/>
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
            <textarea class="mainText" name="add_content" rows="5" placeholder="編輯內容"></textarea>
            <input type="submit" value="編輯提交">
            <?php    
            }
            ?>
        </form>

    </div>

</body>
</html>