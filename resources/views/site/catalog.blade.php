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
    <h1>{{ $page->title }}</h1>
    <div class="col-md-3 goods-left">
      @include('layouts.goods-left')
    </div>
    <div class="col-md-9">
      @foreach ($categories as $category)
        <div class="col-md-4 col-sm-6 goods">
          <a href="/catalog/{{ $category->slug }}">
            <p class="name-good">{{ $category->title }}</p>
            <div class="good-img"><img src="/img/categories/{{ $category->image }}" alt="{{ $category->title }}"></div>
            <span class="good-more">Подробнее</span>
          </a>
        </div>
      @endforeach
    </div>
  </div><!-- Товары -->

@endsection