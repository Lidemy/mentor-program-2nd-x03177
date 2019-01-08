<?php
function setToken($conn, $username){
    // 練習用，實際會不一樣
    $token = uniqid();
    $sql = "DELETE FROM x03177_certificate WHERE username='$username'";
    $conn->query($sql);
    $sql = "INSERT INTO x03177_certificate(username, token) VALUES('$username', '$token')";
    $conn->query($sql);
    setcookie("token", $token, time()+3600*24);
}
function getUserByToken($conn, $token){
    if(isset($token) && !empty($token)){
        $sql = "SELECT * FROM x03177_certificate WHERE token='$token' ";
        $result = $conn->query($sql);
        if(!$result || $result->num_rows <=0){
            return null;
        }
        $row = $result->fetch_assoc();
        return $row['username'];
    }else{
        return null;
    }
}
function renderDeleteBtn($id){
    return'
    <div class="del_content">
        <form method="POST" action="./delete_comment.php">
            <input type="hidden" name="id" value="$id" />
            <input type="submit" value="X"/>
        </form>
    </div>
    ';
}
function renderEditBtn($id){
    // id 注意字串
    return '
    <div class="edit_content">
        <form method="GET" action="./edit_comment.php">
            <input type="hidden" name="id" value="' . $id . '" />
            <input type="submit" value="編輯"/>
        </form>
    </div>
    ';
}
?>