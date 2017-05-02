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

  <div class="container">
    <h1>{{ $page->title }}</h1>
    {!! $page->content !!}

    @foreach($news as $new)
      <div>
        {{ $new->rusDate }}
        <div class="name"><a href="/news/{{ $new->slug }}">{{ $new->title }}</a></div>
      </div><br>
    @endforeach
  </div>

@endsection
