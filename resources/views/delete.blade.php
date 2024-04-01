<?php

session_start();

require 'config.blade.php';


if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    try {
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindValue(':id', $contactId, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$contact) {
            exit('指定されたIDが見つかりません');
        }

        
        $deleteSql = "DELETE FROM contacts WHERE id = :id";
        $deleteStmt = $PDO->prepare($deleteSql);
        $deleteStmt->bindValue(':id', $contactId, PDO::PARAM_INT);
        $deleteStmt->execute();

        session_destroy();

        header("Location: complete.blade.php");
        exit;

    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
} else {
    exit('削除対象の連絡先IDが指定されていません');
}
?>
