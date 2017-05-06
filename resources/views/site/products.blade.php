@extends('layout')

@section('title_description', $page->title_description)

@section('meta_description', $page->meta_description)

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')


  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="#">{{ $page->title }}</a></li>
    </ul>
  </div>
  <div class="container"><!-- Товары -->
    <h1>{{ $products_title }}</h1>
    <div class="col-md-3 goods-left">
      @include('layouts.goods-left')
    </div>

    <?php $items = session('items'); ?>
    <div class="col-md-9">
      @foreach ($products->chunk(3) as $chunk)
        <div class="row">
          @foreach ($chunk as $product)
            <div class="col-md-4 col-sm-6 goods-second">
              <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">
                <div class="good-img"><span><img src="/img/products/{{ $product->path.'/'.$product->image }}" alt="{{ $product->title }}"></span></div>
                <div class="info">
                  <p class="price">{{ $product->price }} тг.</p>
                  <p class="good-name">{{ $product->company->title }} <span>/ {{ $product->title }}</span></p>
                </div>
                <div class="hide-name">
                  <div class="hide-name-text">
                    <div class="info">
                      <p class="price">{{ $product->price }} тг.</p>
                      <p class="good-name">{{ $product->company->title }} <span>/ {{ $product->title }}</span></p>
                    </div>
                  </div><br>
                  <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}" class="btn good-more">Подробнее</a>

                  @if(is_array($items) AND in_array($product->id, $items['products_id']))
                    <a href="/basket" class="btn btn-cart" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><img src="/img/shopping-cart.png"></a>
                  @else
                    <button class="btn btn-buy" id="add-to-cart" data-id="{{ $product->id }}" type="button">Купить</button>
                  @endif
                </div>
              </a>
            </div>
          @endforeach
        </div>
      @endforeach

      <div class="clearfix"></div><br><br>
      <div>← <a href="/catalog">Вернуться на уровень выше</a></div>
    </div>
  </div><!-- Товары -->

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
