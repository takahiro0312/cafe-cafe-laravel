<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lesson Sample Site</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
</head>

<body>
  <div class="alert">
    <a href="#">新型コロナウイルスに対する取り組みの最新情報をご案内</a>
  </div>
  <header>
    <h1 class="concept">あなたの<br>好きな空間を作る。</h1>
    @include('header')
  </header>
  <section>
    <div class="introduction" id="to_intro" data-id="to_intro">
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe1.jpg') }}" alt="東京">
          </div>
          <div class="access">
            <p class="area">東京</p>
            <p class="distance">車で15分</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe2.jpg') }}" alt="神奈川">
          </div>
          <div class="access">
            <p class="area">神奈川</p>
            <p class="distance">車で30分</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe3.jpg') }}" alt="愛知">
          </div>
          <div class="access">
            <p class="area">愛知</p>
            <p class="distance">車で1時間</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe4.jpg') }}" alt="京都">
          </div>
          <div class="access">
            <p class="area">京都</p>
            <p class="distance">車で40分</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe5.jpg') }}" alt="岡山">
          </div>
          <div class="access">
            <p class="area">岡山</p>
            <p class="distance">車で1.5時間</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe6.jpg') }}" alt="鹿児島">
          </div>
          <div class="access">
            <p class="area">鹿児島</p>
            <p class="distance">車で50分</p>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="info">
          <div class="photo">
            <img src="{{ asset('cafe/img/cafe8.jpg') }}" alt="沖縄">
          </div>
          <div class="access">
            <p class="area">沖縄</p>
            <p class="distance">車で2時間</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <main>
    <section class="bg_white">
      <h2>好きなロケーションを選ぼう</h2>
      <div class="cafe_local">
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/intro1.jpg') }}" alt="クラシック">
            </div>
            <div class="text">クラシック</div>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/intro2.jpg') }}" alt="バー">
            </div>
            <div class="text">バー</div>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/intro3.jpg') }}" alt="キャンプ">
            </div>
            <div class="text">キャンプ</div>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/intro4.jpg') }}" alt="リゾート">
            </div>
            <div class="text">リゾート</div>
          </div>
        </div>
      </div>
      <div class="goto">
        <div class="goto_text">
          <h3>Go To Eats</h3>
          <p>キャンペーンを利用して、全国で食事しよう。<br>いつもと違う景色に囲まれてカラダもココロもリフレッシュ。</p>
        </div>
        <img src="{{ asset('cafe/img/goto.jpg') }}">
      </div>
    </section>
    <section class="bg_black" id="to_black">
      <h2>カフェ作りを体験しよう</h2>
      <p>お店のエキスパートが案内するユニークな体験（直接対面型またはオンライン）。</p>
      <div class="cafe_exp">
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/exp1.jpg') }}" alt="ジョブ">
            </div>
            <div class="text">ジョブ体験</div>
            <p>カフェカウンターを体験しよう。</p>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/exp2.jpg') }}" alt="レシピ">
            </div>
            <div class="text">レシピ体験</div>
            <p>美味しいレシピを考えてみよう。</p>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/exp3.jpg') }}" alt="プロモーション">
            </div>
            <div class="text">プロモーション体験</div>
            <p>お店の宣伝を手伝ってみよう。</p>
          </div>
        </div>
    </section>
    <section class="bg_white">
      <h2>全国のホストに仲間入りしよう</h2>
      <div class="cafe_host">
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/host1.jpg') }}" alt="ビジネス">
            </div>
            <div class="text">ビジネス</div>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/host1.jpg') }}" alt="コミュニティ">
            </div>
            <div class="text">コミュニティ</div>
          </div>
        </div>
        <div class="box">
          <div class="info">
            <div class="photo">
              <img src="{{ asset('cafe/img/host1.jpg') }}" alt="食べ歩き">
            </div>
            <div class="text">食べ歩き</div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @include('footer')
  <div class="jump" id="jumpToTop">Jump To Top</div>
  <script type="text/javascript" src="{{ asset('js/script.js') }}" defer></script>
</body>

</html>