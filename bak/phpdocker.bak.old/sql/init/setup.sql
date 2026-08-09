-- このファイルは docker-compose.yml から /docker-entrypoint-initdb.d/ にマウントされ、
-- MySQLコンテナの「初回起動時」に自動的に一度だけ実行されます。
-- （データボリュームが既に存在する2回目以降の起動では実行されません）

-- MYSQL_DATABASE(survey_app) と MYSQL_USER/MYSQL_PASSWORD は
-- docker-compose.yml の environment で自動的に作成済みのため、
-- CREATE DATABASE や CREATE USER はここでは不要です。

USE survey_app;

-- 1送信 = 1行（ヘッダー：ユーザー名・自由記述コメント）
CREATE TABLE survey_responses (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255),
  comment TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

-- 1設問への回答 = 1行（明細）
CREATE TABLE survey_answers (
  id INT NOT NULL AUTO_INCREMENT,
  response_id INT NOT NULL,
  question_id TINYINT NOT NULL,      -- 1〜18
  answer_value TINYINT NOT NULL,     -- 選択肢の値（最大4）
  PRIMARY KEY (id),
  UNIQUE KEY uq_response_question (response_id, question_id),
  FOREIGN KEY (response_id) REFERENCES survey_responses(id) ON DELETE CASCADE
);