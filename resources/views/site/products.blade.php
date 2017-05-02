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

    <div class="col-md-9">
      @foreach ($products as $product)
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
              </div>
              <span class="good-more">Подробнее</span>
            </div>
          </a>
        </div>
      @endforeach

      <div class="clearfix"></div><br><br>
      <div>← <a href="/catalog">Вернуться на уровень выше</a></div>
    </div>
  </div><!-- Товары -->

@endsection