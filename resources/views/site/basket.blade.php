@extends('layout')

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="#">Корзина</a></li>
    </ul>
  </div>

  <div class="container">
    <h1>Корзина</h1>

    <div class="table-responsive">
      <table class="table table-striped table-condensed">
        <thead>
          <tr class="active">
            <td>Название</td>
            <td>Картинка</td>
            <td>Цена</td>
            <td>Количество</td>
            <td class="text-right">Сумма</td>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr>
              <td>{{ $product->title }}</td>
              <td><img src="/img/products/{{ $product->path.'/'.$product->image }}" class="img-responsive" style="width:80px;height:80px;"></td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->count }}</td>
              <td>{{ $product->sum }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5">Нет записи</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection