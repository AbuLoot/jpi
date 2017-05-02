@extends('layout')

@section('title_description', $newsData->title)

@section('meta_description', $newsData->meta_description)

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="/{{ $page->slug }}">{{ $page->title }}</a></li>
      <li><a href="#">{{ $newsData->title }}</a></li>
    </ul>
  </div>

  <div class="container">
  	<h1>{{ $newsData->title }}</h1>
  	{!! $newsData->content !!}
  </div>

@endsection
