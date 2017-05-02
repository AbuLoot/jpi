@extends('layout')

@section('header')
  <!-- Навигация -->
  <div class="slogan">
    <p>Оптовые продажи!</p>
  </div>
@endsection

@section('content')

  <!-- Модальное окно -->
  <div class="slider"><!-- Слайдер -->
    <div><img src="img/slider.jpg" alt=""></div>
    <div><img src="img/slider2.jpg" alt=""></div>
  </div>

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container page"><!-- Товары -->
    <h1>Продукция</h1>
    <?php $items = session('items'); ?>
    @foreach ($products->chunk(4) as $chunk)
      <div class="row">
        @foreach ($chunk as $product)
          @if(is_array($items) AND in_array($product->id, $items['product_ids']))
            <div class="col-md-3 col-sm-6 goods">
              <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">
                <p class="name-good">{{ $product->category->title.' '.$product->title }}</p>
                <div class="good-img"><img src="/img/products/{{ $product->path.'/'.$product->image }}" alt="{{ $product->title }}"></div>
              </a>
              <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}" class="btn good-more">Подробнее</a>
              <a href="/basket" class="btn btn-cart" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><img src="/img/shopping-cart.png"></a>
            </div>
          @else
            <div class="col-md-3 col-sm-6 goods">
              <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">
                <p class="name-good">{{ $product->category->title.' '.$product->title }}</p>
                <div class="good-img"><img src="/img/products/{{ $product->path.'/'.$product->image }}" alt="{{ $product->title }}"></div>
              </a>
              <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}" class="btn good-more">Подробнее</a>
              <button class="btn btn-buy" id="add-to-cart" data-id="{{ $product->id }}" type="button">Купить</button>
            </div>
          @endif
        @endforeach
      </div>
    @endforeach
  </div>


  <div class="container-fluid partners"><!-- Партнеры -->
    <div class="container">
      @foreach ($companies as $company)
        <a href="/catalog/brand/{{ $company->slug }}"><img src="/img/companies/{{ $company->logo }}" alt=""></a>
      @endforeach
    </div>
  </div>

  <div class="container">
    <div class="col-sm-12 company-block"><!-- Блок о компании -->
      <div class="company-img"><img src="img/img-6.jpg" alt=""></div>
      <div class="cont-block">
        <h2><a href="/about">О компании</a></h2>
        <p>Компания «Japan Import» была открыта для импорта и реализации товаров народного потребления из Японии. Начала свою деятельность  с февраля 2014г</p>
      </div>
    </div>
    <div class="col-md-6 news-block"><!-- Блок акции -->
      <div class="news-img"><img src="img/img-7.jpg" alt=""></div>
      <div class="cont-block">
        <h2><a href="#">Акции</a></h2>
      </div>
      <span class="trapeze">Скидка</span>
    </div>
    <div class="col-md-6 news-block"><!-- Блок новости -->
      <div class="news-img"><img src="img/img-7.jpg" alt=""></div>
      <div class="cont-block">
        <h2><a href="/news">Новости</a></h2>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    $('button#add-to-cart').click(function(e){
      e.preventDefault();

      var productId = $(this).data("id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/cart/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            console.log(data);
            $('*[data-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-cart" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><img src="/img/shopping-cart.png"></a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
@endsection
