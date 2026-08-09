<?php
session_start();

try {
    //PDOでデータベースに接続
    require_once $_SERVER['DOCUMENT_ROOT'] . "/AppUtil.php";
    $pdo = AppUtil::getPDO();

    //フォームデータの取得
    $username = $_POST['username'] ?? $_SERVER['REMOTE_ADDR'] ?? "てすと君!";
    $answers = $_POST['answers'];
    $comment = $_POST['comment'] ?? "デバッグコメント";

    $pdo->beginTransaction();

    // 1. ヘッダー（1送信 = 1行）を作成
    $stmtHeader = $pdo->prepare(
        "insert into survey_responses(username, comment) values(:username, :comment)"
    );
    $stmtHeader->bindParam(':username', $username);
    $stmtHeader->bindParam(':comment', $comment);
    $stmtHeader->execute();
    $responseId = $pdo->lastInsertId();

    // 2. 設問ごとの回答（明細）を作成
    $stmtDetail = $pdo->prepare(
        "insert into survey_answers(response_id, question_id, answer_value) "
        . "values(:responseId, :questionId, :answerValue)"
    );
    foreach ($answers as $questionId => $answerValue) {
        $stmtDetail->bindParam(':responseId', $responseId);
        $stmtDetail->bindParam(':questionId', $questionId);
        $stmtDetail->bindParam(':answerValue', $answerValue);
        $stmtDetail->execute();
    }

    $pdo->commit();
    echo "登録が完了しました";
} catch (PDOException $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    die("<h1>エラー：" . $e->getMessage() . "</h1>");
}
?>
<script>
function redirect(){
    location.href="./result.php"
}
</script>
<body onload="redirect();">

</body>
