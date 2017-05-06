<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title_description', 'Jpi.kz')</title>
  <meta name="description" content="@yield('meta_description', 'Jpi.kz')">

  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  @yield('head')

  <link rel="stylesheet" href="/css/jquery.fancybox.css">
  <link rel="stylesheet" href="/css/slick.css">
  <link rel="stylesheet" href="/css/slick-theme.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">

  <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <meta name="yandex-verification" content="5225e80855046047" />
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-84155617-41', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body>
  <header id="header"><!-- Шапка -->
    <div class="header-1">
      <div class="container">
        <p class="head-address">г. Алматы, пр. Райымбека, 165 а, офис 7</p>
        <span class="phones">
          <a href="tel:+77272797271">+7 727 279 72 71</a>
          <a href="tel:+77272797268">+7 727 279 72 68</a>
          <a href="tel:+77011118045">+7 701 111 80 45</a>
          <a href="tel:+77051118045">+7 705 111 80 45</a>
        </span>
        <p class="time">08:00 - 17:00</p>
      </div>
    </div>
    <div class="header-2"><!-- Навигация -->
      <div class="container">
        <div class="col-md-2 col-sm-2 logo-block">
          <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
        </div>
        <div class="col-md-10 col-sm-10 header-2-1">
          <form action="/search" method="GET" class="head-search">
            <input type="search" name="text" placeholder="Поиск по сайту" required="required">
            <input class="head-search-btn" type="submit" value="Искать">
          </form>
          <?php $items = session('items'); ?>
          <div class="cart">
            <a href="/basket" class="btn btn-default btn-block">
              <span class="hidden-xs">Корзина</span>
              <img src="/img/shopping-cart.png">
              <span class="badge" id="count-items"><?php echo (is_array($items)) ? count($items['products_id']) : 0; ?></span>
            </a>
          </div>
          <div class="lang">
            <a class="active" href="#">РУ</a>
            <a href="#">EN</a>
          </div>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle cd-nav-trigger" data-toggle="collapse" data-target="#bs-example-navbar-collapse">
              <span class="cd-icon"></span>
              <span class="cd-icon"></span>
              <span class="cd-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
            <ul class="nav navbar-nav">
              @foreach ($pages as $page)
                @if (Request::is($page->slug, $page->slug.'/*'))
                  <li class="active"><a href="/{{ $page->slug }}">{{ $page->title }}</a></li>
                @else
                  <li><a href="/{{ $page->slug }}">{{ $page->title }}</a></li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

    @yield('header')

  </header>

  @include('layouts.alerts')

  <!-- Контент -->
  @yield('content')

  <!-- Подвал -->
  <footer>
    <div class="container">
      <div class="footer-block-1">
        <h6>Контакты</h6>
        <ul>
          <li>
            <p class="footer-add">Адрес:</p>
            <p class="footer-add-1">г. Алматы, пр. Райымбека, 165 а, офис 7</p>
          </li>
          <li>
            <p class="footer-phone">Телефон:</p>
            <span class="footer-phone-1">
              <a href="tel:+77272797271">+7 727 279 72 71</a>
              <a href="tel:+77272797268">+7 727 279 72 68</a>
              <a href="tel:+77011118045">+7 701 111 80 45</a>
              <a href="tel:+77051118045">+7 705 111 80 45</a>
            </span>
          </li>
          <li>
            <p class="footer-email">email:</p>
            <a href="mailto:toojapantrade@bk.ru">toojapantrade@bk.ru</a>
          </li>
          <li>
            <p class="schedule">График:</p>
            <p>08:00 - 17:00</p>
          </li>
        </ul>
      </div>
      <div class="footer-block-2">
        <div class="col-md-6">
          <h6>Наши продукты</h6>
          <ul>
            @foreach ($categories as $category)
              @if (Request::is('catalog/'.$category->slug, 'catalog/'.$category->slug.'/*'))
                <li class="active"><a href="/catalog/{{ $category->slug }}">{{ $category->title }}</a></li>
              @else
                <li><a href="/catalog/{{ $category->slug }}">{{ $category->title }}</a></li>
              @endif
            @endforeach
          </ul>
        </div>
        <div class="col-md-6">
          <h6>Навигация</h6>
          <ul>
            @foreach ($pages as $page)
              @if (Request::is($page->slug, $page->slug.'/*'))
                <li class="active"><a href="/{{ $page->slug }}">{{ $page->title }}</a></li>
              @else
                <li><a href="/{{ $page->slug }}">{{ $page->title }}</a></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="footer-block-3">
        <h6>Подписаться</h6>
        <form class="subscription">
          <input type="email" placeholder="введите Ваш email" required="required">
          <input class="subscription-btn" type="submit" value="">
        </form>
        <a href="#" class="vk"></a>
        <a href="#" class="google"></a>
        <a href="#" class="inst"></a>
      </div>
    </div>
    <div class="container-fluid foooter-down">
      <div class="container">
        <p>Copyright © 2017 Japan Import</p>
        <p class="creator">Cоздание сайта - <a href="artmedia.kz"><img src="/img/artmedia.png" alt=""></a></p>
        <a href="#header" class="btn-up"></a>
      </div>
    </div>
  </footer><!-- Подвал -->
  <!-- <script src="/js/jquery-1.12.3.min.js"></script> -->
  <script src="/js/jquery.min.js"></script>
  @yield('scripts')
  <script src="/js/jquery.fancybox.js"></script>
  <script src="/js/jquery.mousewheel.pack.js"></script>
  <script src="/js/slick.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/common.js"></script>
</body>
</html>
