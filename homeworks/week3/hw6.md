## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
`<form>` 表單的標籤，可以讓使用者輸入資訊並傳送各類訊息。  
`<iframe>` 包含另一個文本的標籤，例如 Google Map 的分享地圖可以透過這個標籤，嵌在網頁當中。  
`<canvas>` 定義圖形的標籤及圖形容器的標籤，可以利用他繪製向量圖形。

## 請問什麼是盒模型（box modal）
是一個方形的基本容器，有開始標籤和結束標籤為容器範圍。
容器裡面含有 margin、border、padding 和容器本身。
## 請問 display: inline, block 跟 inline-block 的差別是什麼？
display: inline 是指行內元素，可與其他元素緊連並列，設定上下的 margin、padding 會沒有作用，寬度即是容器寬無法更動。  
display: block 是指塊狀元素，佔有一整行寬或父層容器寬度，可設定 上下左右的 margin、padding，寬度固定即是一整行或父容器寬。  
display: inline-block 是指具備行內元素即塊狀元素，具備可設定 上下左右的 margin、padding，寬度也可控制大小。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
position: static 是預設值，區塊容器會依照自然流排列，不會影響其他區塊的位置。  
position: relative 是相對位置，區塊容器佔有容器原本的位置，並可設定上下左右改變位置。  
position: absolute 是絕對位置，區塊容器不會佔有容器原本的位置，可設定上下左右，不論容器大小皆不影響原本區塊。如果父層容器沒有設置，子容器的絕對位置就會依照 `<body>` 標籤做移動；父層有設置的話就會依照父層容器相對移動。  
position: fixed 是固定位置，區塊容器依照瀏覽器畫面固定位置，可設置上下左右，不受畫面捲動影響。