資料庫名稱：x03177_users

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer(11)      | id  |
| username  | varchar(12) | 使用者名稱 |
| password  | varchar(15) | 使用者密碼 |
| nickname  | varchar(12) | 使用者暱稱 |


資料庫名稱：x03177_comment

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer(11)      | id  |
| username  | varchar(12) | 使用者名稱 |
| content  | text | 使用者留言內容 |
| created_at  | datetime | 使用者留言時間 |
| state | integer(5) | 紀錄此留言為回應主留言的識別 |

本來留言要分二個 table，後來有建議放一起。