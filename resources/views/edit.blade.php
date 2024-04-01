<?php
session_start();

require 'config.blade.php';

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    try {
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $PDO->beginTransaction();

        $sql = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$contact) {
            exit('指定されたIDが見つかりません');
        }

    } catch (PDOException $e) {

        $PDO->rollBack();
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
} else {
    exit('編集対象のIDが指定されていません');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    try {
        $sql = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id";
        $stmt = $PDO->prepare($sql);

        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(':kana', $_POST['kana'], PDO::PARAM_STR);
        $stmt->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindParam(':body', $_POST['body'], PDO::PARAM_STR);

        $stmt->execute();

        
        $PDO->commit();

        session_destroy();

        header("Location: complete.blade.php");
        exit;
    } catch (PDOException $e) {
        $PDO->rollBack();
        exit('データベースエラー：' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>編集</title>
</head>
<body>
    <h1 class="edit_title">編集</h1>
    <form class="edit_form" method="POST" action="">

        <div class="edit_row">
            <label class="edit_label" for="name">名前:</label>
            <input class="edit_input" type="text" id="name" name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
        </div>

        <div class="edit_row">
            <label class="edit_label" for="kana">フリガナ:</label>
            <input class="edit_input" type="text" id="kana" name="kana" value="<?= htmlspecialchars($contact['kana']) ?>" required>
        </div>

        <div class="edit_row">
            <label class="edit_label" for="tel">電話番号:</label>
            <input class="edit_input" type="text" id="tel" name="tel" value="<?= htmlspecialchars($contact['tel']) ?>" required>
        </div>

        <div class="edit_row">
            <label class="edit_label" for="email">メールアドレス:</label>
            <input class="edit_input" type="email" id="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>
        </div>

        <div class="edit_row">
            <label class="edit_label" for="body">お問い合わせ内容:</label>
            <textarea class="edit_textarea" id="body" name="body" required><?= htmlspecialchars($contact['body']) ?></textarea>
        </div>

        <input class="edit_button" type="submit" name="submit" value="更新">
    </form>
</body>
</html>
