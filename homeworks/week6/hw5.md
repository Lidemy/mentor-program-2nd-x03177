## 請說明 SQL Injection 的攻擊原理以及防範方法
SQL 注入（英語：SQL injection），也稱 SQL 隱碼或 SQL 注碼。  
- 攻擊原理：輸入文字資料成為程式的一部分，透過輸入 SQL 語法取得資料。  
例如：在輸入帳號時，填入`' or 1=1 --`  
原本的語法為 `SELECT * FROM users WHERE username='$username' AND password='$password'`  
會變成 `SELECT * FROM users WHERE username='' or 1=1 --' AND password=''`  
- 防範方法  
方法一：可轉譯特殊字符`mysqli_real_escape_string()`  
方法二：prepare statement
```javascript
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?;");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    // code...
    }
```

參考資料：[PHP Manual mysqli_real_escape_string](http://php.net/manual/en/mysqli.real-escape-string.php)


## 請說明 XSS 的攻擊原理以及防範方法
跨網站指令碼（英語：Cross-site scripting，通常簡稱為：XSS）。
- 攻擊原理：讓輸入的資料可被解析為程式碼的一部分。  
- 防範方法：escape（跳脫），依輸入讓文字資料呈現而不被解析為 HTML 標籤。  
可使用`echo htmlspecialchars($str, ENT_QUOTES, 'utf-8')`


## 請說明 CSRF 的攻擊原理以及防範方法
跨站請求偽造（英語：Cross-site request forgery），也被稱為 one-click attack 或者 session riding，通常縮寫為 CSRF 或者 XSRF。  
- 攻擊原理：是一種挾制用戶在目前已登入的 Web 應用程式上執行非本意的操作的攻擊方法。 透過非正式途徑取得使用者的名義並發出 request。  
- 防範方法：  
- 方法一：檢查 Referer。檢查 request header 中的 referer，如果是不合法的 domain 過來的就 reject 掉即可。
    - 注意一：有些瀏覽器可能不會帶 referer
    - 注意二：有些使用者可能關閉帶 referer 的功能
    - 注意三：判定是不是合法 domain 的程式碼必須要保證沒有 bug
- 方法二：加上圖形驗證碼、簡訊驗證碼等等。  
- 方法三：加上 CSRF token，在 `form` 中，加一個 `hidden` 的 `csrftoken`，值由 server 隨機產生並存在  server 的 session 中。submit 後比對 csrftoken 與自己 session 裡面存的是不是一樣的。
- 方法四：Double Submit Cookie。由 server 產生一組隨機的 token 並且加在 form 上面。讓 client side 設定一個名叫 csrftoken 的 cookie，值也是同一組 token。

參考資料：[讓我們來談談 CSRF](https://blog.techbridge.cc/2017/02/25/csrf-introduction/)


## 請舉出三種不同的雜湊函數
雜湊函式（英語：Hash function）又稱雜湊演算法。  
- MD5
- SHA-1
- SHA-256

參考資料：[PHP Manual hash](http://php.net/manual/en/function.hash.php)


## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
- cookie：儲存 client 端，暫存於瀏覽器，可限制有效期。
- session：儲存 server 端，瀏覽器無法看到，作為驗證使用，較為安全。

## `include`、`require`、`include_once`、`require_once` 的差別
- include：引入檔案但不檢查，導致重複引入；引不到時出現警告（E_WARNING），程式不會停止。
- require：引入檔案但不檢查，導致重複引入；引不到時出現錯誤（E_COMPILE_ERROR），且程式會停止。
- include_once：先檢查再引入檔案，所以不會重複引入檔案；引不到時出現警告，程式不會停止。
- require_once：先檢查再引入檔案，所以不會重複引入檔案；引不到時出現錯誤，且程式會停止。