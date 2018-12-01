## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

VARCHAR：不限制字元長度，長度區間 0~65535，須定義長度，例如：VARCHAR(20)，資料庫搜尋效率高。  
TEXT：不限制字元長度的非 Unicode 資料，最大長度 2^31-1 ，資料庫搜尋效率低。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？

Cookie，類型為「小型文字檔案」，指網站為了辨別用戶身分而儲存在用戶端（Client Side）上的資料（通常經過加密）。可供 Server 儲存或讀取。  
Cookie 設定方式 setcookie("變數名稱","變數值","存活時間","路徑","網域")，設置在 Header 中，且只有在同 domain 範圍下才能取得。  
變數名稱：自行命名    
變數值：賦予變數值  
存續時間：於 Client 端存續時間，使用者也可以自行刪除  
路徑：選填  
網域：選填  
  
Server 在收到 Client 端第一次的 Request 之後，會建立一個獨一無二的索引編號在資料庫中作為記錄，同時回傳一個加入 Set-cookie: 標頭行的 Response 給 Client。下列是 cookie 運作。  
1. Server 端回應給瀏覽器 一個或多個 "Set-Cookie" HTTP Header。  
2. 瀏覽器 接收到 Set-Cookie 指令時，會將 Cookie 的名稱與值儲存在瀏覽器的 Cookie 存放區，並記錄該 Cookie 隸屬的網域、網址路徑、過期時間、是否為安全連線。  
3. 當瀏覽器再次發出 HTTP Request 指令到 Server 時，就會比對目前在 瀏覽器內的 Cookie 存放區有沒有「該網域」、「該目錄」、「過期時間尚未過期」且「是否為安全連線」的 Cookie，如果有的話就會包含在 HTTP Request 指令的 "Cookie" Header 中。  
  
參考資料  
[解釋 Cookie 的特性](https://blog.miniasp.com/post/2008/02/22/Explain-HTTP-Cookie-in-Detail.aspx)  
[MySQL中char、varchar和text的区别](https://www.jianshu.com/p/cc2d99559532)
## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

- 密碼是明碼
- 資安問題  
- 忘記密碼就無法進入留言板了
- 都不能編輯內容（含刪除）  
