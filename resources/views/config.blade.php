<?php

// データベース接続情報
$dsn = 'mysql:dbname=cafe;host=mysql;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {
    $PDO = new PDO($dsn, $user, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
