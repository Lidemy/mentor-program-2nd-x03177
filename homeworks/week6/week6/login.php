<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
    <style type="text/css">
        html, body{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            border: 1px solid #dedede;
            box-sizing: border-box;
            padding: 15px 60px;
        }
        h1, .submit, .link{
            text-align: center;
        }
        label{
            box-sizing: border-box;
            padding-left: 10px;
            margin-bottom: 5px;
        }
        .logContent{
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">登入留言板</h1>
        <form class="content" action="./check_login.php" method="POST" >
            <div class="username">
                <label >帳號：</label>
                <input type="text" class="logContent" name="username" placeholder="帳號">
                <p class="alert"></p>
            </div>
            <div class="password">
                <label >密碼：</label>
                <input type="text" class="logContent" name="password" placeholder="密碼">
                <p class="alert"></p>
            </div>
            <input type="submit" class="submit" value="登入留言板"">
            <div class="link"><a href="register.php">還沒有會員帳號</a></div>
        </form>
    </div>
</body>
</html>