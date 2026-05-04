# PicTweet_on_php                                                      
                                                                                                   
                                          
  ## テーブル設計
                                                                         
  ### usersテーブル
  | カラム名   | 型       | NULL | Key | 備考      |
  | ---------- | -------- | ---- | --- | --------- |
  | id         | bigint   | NO   | PK  |           |
  | nickname   | string   | YES  |     | 最大6文字 |
  | email      | string   | NO   |     | unique    |
  | password   | string   | NO   |     |           |
  | created_at | datetime | NO   |     |           |
  | updated_at | datetime | NO   |     |           |

  ### アソシエーション
  hasMany: tweets
  hasMany: comments


  ### tweetsテーブル
  | カラム名   | 型       | NULL | Key | 備考     |
  | ---------- | -------- | ---- | --- | -------- |
  | id         | bigint   | NO   | PK  |          |
  | text       | string   | YES  |     |          |
  | image      | text     | YES  |     |          |
  | user_id    | integer  | NO   | FK  | users.id |
  | created_at | datetime | NO   |     |          |
  | updated_at | datetime | NO   |     |          |

  ###　アソシエーション
  belongsTo: user
  hasMany: comments


  ### commentsテーブル
  | カラム名   | 型       | NULL | Key | 備考      |
  | ---------- | -------- | ---- | --- | --------- |
  | id         | bigint   | NO   | PK  |           |
  | text       | text     | NO   |     |           |
  | user_id    | bigint   | NO   | FK  | users.id  |
  | tweet_id   | bigint   | NO   | FK  | tweets.id |
  | created_at | datetime | NO   |     |           |
  | updated_at | datetime | NO   |     |           |

  ### アソシエーション
  belongsTo: user
  belongsTo: tweet