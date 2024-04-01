 <!-- <?php
// session_start();

// $errors = array();

// require './config.blade.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (isset($_POST['name']) && !empty($_POST['name'])) {
//     $name = $_POST["name"];
//     $kana = $_POST["kana"];
//     $tel = $_POST["tel"];
//     $email = $_POST["email"];
//     $body = $_POST["body"];

//     if (empty($name)) {
//       $errors["name"] = "名前は必須項目です。";
//     } elseif (strlen($name) > 10) {
//       $errors["name"] = "名前は10文字以内でご入力ください。";
//     }

//     if (empty($kana)) {
//       $errors["kana"] = "フリガナは必須項目です。";
//     } elseif (strlen($kana) > 20) {
//       $errors["kana"] = "フリガナは10文字以内でご入力ください。";
//     }

//     if (!empty($tel) && !preg_match('/^[0-9]+$/', $tel)) {
//       $errors["tel"] = "電話番号は0-9の数字のみでご入力ください。";
//     }

//     if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//       $errors["email"] = "正しいメールアドレスを入力してください.";
//     }

//     if (empty($body)) {
//       $errors["body"] = "お問い合わせ内容は必須項目です。";
//     }
//   }

//   if (empty($errors)) {

//     $_SESSION['name'] = $name;
//     $_SESSION['kana'] = $kana;
//     $_SESSION['tel'] = $tel;
//     $_SESSION['email'] = $email;
//     $_SESSION['body'] = $body;


//     header("Location: confirm.blade.php");
//     exit;
//   }
// }

// try {

//   $sql = "SELECT * FROM contacts";
//   $stmt = $PDO->query($sql);
//   $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// } catch (PDOException $e) {
//   exit('データベースからデータを取得できませんでした。' . $e->getMessage());
// }

?> -->


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
</head>

<body>
  <header class="contact-header">
    @include('header')
    <section>
      <div class="contact_box">
        <h2>お問い合わせ</h2>
        <form action="{{ route('contact.submit') }}" method="post" id="form_contact">
          @csrf
          <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
          <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
          <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
          <p><span class="required">*</span>は必須項目となります。</p>
          <dl>
            <dt><label for="name">氏名</label><span class="required">*</span></dt>
            <dd>
              <input type="text" name="name" id="name" placeholder="山田太郎" value="{{ old('name') }}">
              @error('name')
              <dd class="error">{{ $message }}</dd>
              @enderror
            </dd>
            <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
            <dd>
              <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="{{ old('kana') }}">
              @error('kana')
              <dd class="error">{{ $message }}</dd>
              @enderror
            </dd>
            <dt><label for="tel">電話番号</label></dt>
            <dd>
              <input type="text" name="tel" id="tel" placeholder="09012345678" value="{{ old('tel') }}">
              @error('tel')
              <dd class="error">{{ $message }}</dd>
              @enderror
            </dd>
            <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
            <dd>
              <input type="text" name="email" id="email" placeholder="test@test.co.jp" value="{{ old('email') }}">
              @error('email')
              <dd class="error">{{ $message }}</dd>
              @enderror
            </dd>
          </dl>
          <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
          <dl class="body">
            <dd><textarea name="body" id="body">{{ old('body') }}</textarea></dd>
            @error('body')
            <dd class="error">{{ $message }}</dd>
            @enderror
            <dd><button type="submit" id="submit-button">送　信</button></dd>
          </dl>
        </form>
      </div>
    </section>
    @include('footer')
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  </header>
</body>

</html>
