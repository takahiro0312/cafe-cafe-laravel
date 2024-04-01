<?php
session_start();

// データベースへの登録処理
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  try {

    require 'config.blade.php';
    
    $sql = "INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)";
    $stmt = $PDO->prepare($sql);

    $stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
    $stmt->bindValue(':kana', $_SESSION['kana'], PDO::PARAM_STR);
    $stmt->bindValue(':tel', $_SESSION['tel'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
    $stmt->bindValue(':body', $_SESSION['body'], PDO::PARAM_STR);

    $stmt->execute();

    
    session_destroy();

    header("Location: complete.blade.php");
    exit;
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ内容の確認</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
</head>

<body>
  <header class="contact-header">
    <?php include 'header.blade.php'; ?>
    <section>
      <div class="contact_box">
        <h2>お問い合わせ内容の確認</h2>
        <form action="complete.blade.php" method="post">
          <dl class="confirm">
            <dt>氏名</dt>
            <dd><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8') : ''; ?></dd>
            <dt>フリガナ</dt>
            <dd><?php echo isset($_SESSION['kana']) ? htmlspecialchars($_SESSION['kana'], ENT_QUOTES, 'UTF-8') : ''; ?></dd>
            <dt>電話番号</dt>
            <dd><?php echo isset($_SESSION['tel']) ? htmlspecialchars($_SESSION['tel'], ENT_QUOTES, 'UTF-8') : ''; ?></dd>
            <dt>メールアドレス</dt>
            <dd><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') : ''; ?></dd>
            <dt>お問い合わせ内容</dt>
            <dd><?php echo isset($_SESSION['body']) ? htmlspecialchars($_SESSION['body'], ENT_QUOTES, 'UTF-8') : ''; ?></dd>

            <dd class="confirm_btn">
              <button type="submit" name="submit">送　信</button>
              <a href="javascript:history.back();">戻　る</a>
            </dd>
          </dl>
        </form>
      </div>
    </section>
    <?php include 'footer.blade.php'; ?>
    <script type="text/javascript" src="{{ asset('js/contact.js') }}" defer></script>
  </header>
</body>

</html>
