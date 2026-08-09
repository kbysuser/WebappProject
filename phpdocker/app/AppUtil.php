<?php

class AppUtil
{
    public static function getPDO()
    {
        $host = 'db';               // compose.yaml の db サービス名（127.0.0.1 ではない点に注意）
        $dbname = 'survey_app';
        $user = 'survey_user';
        $password = 'survey_pass';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        return new PDO($dsn, $user, $password, $options);
    }

    // debugroom/helloappend.php 用のデバッグ機能（DBは使わずテキストログを書くだけ）
    public static function appendText($username, $questionId, $answer, $comment)
    {
        $directory = $_SERVER['DOCUMENT_ROOT'] . '/debugroom/answers';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $file = $directory . '/problem_' . $questionId . '.txt';
        $content = "username:{$username}\nanswer:{$answer}\ncomment:{$comment}\n\n";
        file_put_contents($file, $content, FILE_APPEND);
    }
}
