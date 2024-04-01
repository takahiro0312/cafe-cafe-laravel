<nav id="myNav">
  <div class="logo">
    <a href="{{ url('/') }}">
    <img src="{{ asset('cafe/img/logo.png') }}" alt="cafe">

    </a>
  </div>
  <div class="g_nav">
    <div class="menu _click1" id="introLink">はじめに</div>
    <div class="menu _click2" id="experienceLink">体験</div>
    <div class="menu">
    <a href="{{ url('/contact') }}">お問い合わせ</a>

    </div>
  </div>
  <div class="sign">
    <div class="signin _click" id="signInButton2">サインイン</div>
    <div class="sp _click" id="menuToggle">
    <img src="{{ asset('cafe/img/menu.png') }}" alt="ハンバーガーメニュー">

    </div>
    <div class='sp_nav' id="spNav" style="display: none;">
      <div class='sp_signin _click' id="signInButton">サインイン</div>
      <div class='sp_menu _click3' id="introLink2">はじめに</div>
      <div class='sp_menu _click4' id="experienceLink2">体験</div>
      <div class='sp_menu'><a href="contact.blade.php">お問い合わせ</a></div>
    </div>

  </div>
</nav>
</header>
<div id="overlay">
  <div id="signin_box">
    <h2>ログイン</h2>
    <form action="" method="post">
      <dl>
        <dd><input type="text" name="name" placeholder="メールアドレス"></dd>
        <dd><input type="password" name="pass" placeholder="パスワード"></dd>
        <dd><button type="submit" id="signin-button">送　信</button></dd>
      </dl>
      <dl class="sns">
        <dd><button name="twitter"><img src="{{ asset('cafe/img/twitter.png') }}"></button></dd>
        <dd><button name="facebook"><img src="{{ asset('cafe/img/fb.png') }}"></button></dd>
        <dd><button name="google"><img src="{{ asset('cafe/img/google.png') }}"></button></dd>
        <dd><button name="apple"><img src="{{ asset('cafe/img/apple.png') }}"></button></dd>
      </dl>
    </form>
  </div>
</div>