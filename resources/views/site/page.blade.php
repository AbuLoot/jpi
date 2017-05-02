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
  	{!! $page->content !!}
  </div>

@endsection