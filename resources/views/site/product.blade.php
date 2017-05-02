@extends('layout')

@section('title_description', $page->title_description)

@section('meta_description', $page->meta_description)

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="index.html">Главная</a></li>
      <li><a href="catalog.html">Наши товары</a></li>
      <li><a href="catalog-1.html">Подгузники</a></li>
      <li><a href="#">ПОДГУЗНИКИ MOONY S 81 (4-8 КГ)</a></li>
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
        </div>
        <h4>Описание</h4>

        {!! $product->description !!}
      </div>
    </div>
  </div><!-- Товары -->

@endsection