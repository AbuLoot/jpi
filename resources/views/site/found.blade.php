@extends('layout')

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="#">Поиск по сайту</a></li>
    </ul>
  </div>
  <div class="container">
    <h1>Поиск по сайту</h1>

    <ol>
      @foreach($news as $new)
        <li>
          <a href="/news/{{ $new->slug }}">{{ $new->title }}</a>
          <div class="anons"></div><br>
        </li>
      @endforeach

      @foreach($products as $product)
        <li>
          <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">{{ $product->title }}</a>
          <div class="anons">{{ str_limit($product->meta_description, 190) }}</div><br>
        </li>
      @endforeach
    </ol>
  </div>

@endsection
