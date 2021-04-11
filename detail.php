<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=' . $id . ';');
$status = $stmt->execute();

$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入りの書籍</legend>
                <label>書籍名：<input type="text" name="book_name" value="<?= $result['book_name'] ?>"></label><br>
                <label>書籍URL：<input type="text" name="url" value="<?= $result['url'] ?>"></label><br>
                <label>レビュー：<textarea name="review" rows="4" cols="40"><?= $result['review'] ?></textarea></label><br>

                <input type="hidden" name="id" value="<?= $result['id'] ?>">

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
