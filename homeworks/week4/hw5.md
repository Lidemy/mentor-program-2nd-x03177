## 1. 什麼是 DOM？
文件物件模型（Document Object Model, DOM）  
DOM 是一種介面，被瀏覽器使用於解讀 HTML 和 XML 文件。它讓文件可以呈現樹狀的結構化表示法，並定義可以存取以及改變架構、內容。其中 DOM Core 是最基本的底層架構，主要是將 Document 呈現樹狀 (Tree) ，Tree 組成的就是節點 (Node)。每個標籤元素在 DOM 裡面就是一個節點。  
## 2. 什麼是 Ajax
非同步的 JavaScript 與 XML 技術（Asynchronous JavaScript and XML, AJAX）  
是一種不須要重新加載整個頁面就能夠更新部分頁面內容的方法。透過與伺服器進行少量數據交換，便能快速、即時更新內容，不用重新讀取整個網頁，讓網頁更快回應使用者的操作。是眾多技術結合個一個方法，這些技術包括 HTML 或 XHTML、層疊樣式表、JavaScript、文件物件模型、XML、XSLT 以及最重要的 XMLHttpRequest 物件。  
## 3. HTTP method 有哪幾個？有什麼不一樣？
- GET：取得資料
- HEAD：request 與 get 相同，但 response 回應主體（response body）
- POST：提交資料，通常會改變伺服器的狀態
- PUT：取代資料
- DELETE：刪除資料
- CONNECT：和指定伺服器之間，建立隧道（tunnel）
- OPTIONS：指定資源的溝通方法（communication option）
- PATCH：修改部分指定的資料  

參考資料：[HTTP 請求方法](https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Methods)

## 4. GET 跟 POST 有哪些區別，可以試著舉幾個例子嗎？
GET，將要傳送的資料以 Query String（一種Key/Vaule的編碼方式）加在要傳送的 URL 後面。但是是資料會被看光光以及網址長度也會有所限制

POST，將檔案與其他資料放在 message-body 中進行傳送，比起 GET 直接放在 URL 後面要安全一點。


## 5. 什麼是 RESTful API？
是一種網路架構風格，他並不是一種標準。  
RESTful API 充分地使用了 HTTP protocol (GET/POST/PUT/DELETE)，達到：
- 以直觀簡潔的資源 URI  
- 並且善用 HTTP Verb
- 達到對資源的操作
- 並使用 Web 所接受的資料類型： JSON, XML, YAML 等，最常見的是 JSON

參考資料：[API (1) - 定義 1 - 什麼是 REST/RESTful ?](https://ithelp.ithome.com.tw/articles/10157431)

## 6. JSON 是什麼？
JavaScript Object Notation  
格式的一種，依照 JavaScript 物件語法的資料格式
## 7. JSONP 是什麼？
JSON with Padding  
利用`<script>`裡面放資料，並透過 function 將資料帶回去
## 8. 要如何存取跨網域的 API？
JSONP
CORS(Cross-Origin Resource Sharing)  
Server 必須在 Response 的 Header 裡面加上 Access-Control-Allow-Origin

參考資料：[輕鬆理解 Ajax 與跨來源請求](https://blog.techbridge.cc/2017/05/20/api-ajax-cors-and-jsonp/)
