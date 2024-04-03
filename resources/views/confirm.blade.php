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
    @include('header')
    <section>
      <div class="contact_box">
        <h2>お問い合わせ内容の確認</h2>
        <form id="confirmation-form" action="{{ route('contact.complete') }}" method="POST">
          @csrf
          <dl class="confirm">
            <dt>氏名</dt>
            <dd>{{ session('name') }}</dd>
            <dt>フリガナ</dt>
            <dd>{{ session('kana') }}</dd>
            <dt>電話番号</dt>
            <dd>{{ session('tel') }}</dd>
            <dt>メールアドレス</dt>
            <dd>{{ session('email') }}</dd>
            <dt>お問い合わせ内容</dt>
            <dd>{{ session('body') }}</dd>
            <dd class="confirm_btn">
              <button type="submit" id="confirm-button">送　信</button>
              <a href="javascript:history.back();">戻　る</a>
            </dd>
          </dl>
        </form>
      </div>
    </section>
    @include('footer')
    <script type="text/javascript" src="{{ asset('js/contact.js') }}" defer></script>
    <script>
      document.getElementById('confirm-button').addEventListener('click', function() {

        document.getElementById('confirmation-form').submit();
      });
    </script>
  </header>
</body>

</html>