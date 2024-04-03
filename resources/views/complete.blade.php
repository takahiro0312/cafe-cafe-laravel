

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
