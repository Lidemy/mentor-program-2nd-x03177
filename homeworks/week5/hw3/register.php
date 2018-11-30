<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>註冊</title>
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
        .regContent{
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
        }
        .warning{
            color: red;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){
            // click 後確定每個欄位都有值
            document.querySelector('.submit').addEventListener('click', () => {
                // 確定三個欄位都是沒值
                for(let i =0; i<document.querySelectorAll('.regContent').length ; i++){
                    if(document.querySelectorAll('.regContent')[i].value != '') {
                        continue;
                    } else {
                        document.querySelector('.warning').innerText = '每個欄位皆須填寫';
                        return;
                    }
                }
                document.querySelector('form').submit();
                
                // 預設按下註冊鈕要執行註冊
                // for 檢查所有欄位
                // 發現有欄位錯誤要取消註冊
                    // 印出錯誤訊息
                // 結束判斷
                    
                //註冊分成兩個階段
                //有註冊狀態＆註冊執行
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <h1 class="title">註冊</h1>
        <form name="register" class="content" action="./check_register.php" method="POST">
            <div class="username">
                <label >帳號：</label>
                <input type="text" class="regContent" name="username" placeholder="帳號">
                <p class="alert"></p>
            </div>
            <div class="password">
                <label >密碼：</label>
                <input type="text" class="regContent" name="password" placeholder="密碼">
                <p class="alert"></p>
            </div>
            <div class="nickname">
                <label >暱稱：</label>
                <input type="text" class="regContent" name="nickname" placeholder="暱稱">
                <p class="alert"></p>
            </div>
            <input type="submit" class="submit" value="註冊">
            <div class="link"><a href="login.php">已有會員帳號</a></div>
            <div class="warning"></div>
        </form>
    </div>
</body>
</html>