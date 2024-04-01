<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

  
}


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
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
</head>

<body>
  <header class="contact-header">
  @include('header')

    <section>
      <div class="contact_box">
        <h2>お問い合わせ</h2>
        <div class="complete_msg">
          <p>お問い合わせ頂きありがとうございます。</p>
          <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
          <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
          <a href="{{ url('/') }}">トップへ戻る</a>
        </div>
      </div>
    </section>
    @include('footer')
    <script type="text/javascript" src="{{ asset('js/contact.js') }}" defer></script>
</body>

</html>
