@extends('layout')

@section('title_description', $page->title_description)

@section('meta_description', $page->meta_description)

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="/catalog">Наши товары</a></li>
      <li><a href="/catalog/{{ $product->category->slug }}">{{ $product->category->title }}</a></li>
      <li><a href="#">{{ $product->title }}</a></li>
    </ul>
  </div>
  <div class="container"><!-- Товары -->
    <h1>{{ $product->title }}</h1>
    <div class="col-md-3 goods-left">
      @include('layouts.goods-left')
    </div>
    <div class="col-md-9">
      <div class="slider-good">
        <div class="slider-for">
          <?php $images = unserialize($product->images); ?>
          @foreach ($images as $key => $image)
            <div><a href="/img/products/{{ $product->path.'/'.$image['image'] }}" class="fancy" rel="gallery"><img src="/img/products/{{ $product->path.'/'.$image['present_image'] }}" alt=""></a></div>
          @endforeach
        </div>
        <div class="slider-nav">
          @foreach ($images as $key => $image)
            <div><img src="/img/products/{{ $product->path.'/'.$image['mini_image'] }}" alt=""></div>
          @endforeach
        </div>
      </div>
      <div class="goods-right">
        <div class="goods-right-name">
          <p>Производитель:  Moony (Япония)</p>
          <p>Штрих-код:  4903111210756</p>
          <p>Модель:  4-8кг 81шт</p>
          <p>Цена:  {{ $product->price }} тг.</p>
        </div>
        <?php $items = session('items'); ?>
        @if(is_array($items) AND in_array($product->id, $items['products_id']))
          <a href="/basket" class="btn btn-cart" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><img src="/img/shopping-cart.png"></a>
        @else
          <button class="btn btn-buy" id="add-to-cart" data-id="{{ $product->id }}" type="button">Купить</button>
        @endif
        <h4>Описание</h4>

        {!! $product->description !!}
      </div>
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
