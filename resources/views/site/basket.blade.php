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
            <td>Цена</td>
            <td>Количество</td>
            <td>Сумма</td>
            <td class="text-right">Действие</td>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr>
              <td>
                <img src="/img/products/{{ $product->path.'/'.$product->image }}" style="width:80px;height:80px;">
                <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">{{ $product->title }}</a>
              </td>
              <td>{{ $product->price }}</td>
              <td><input type="number" class="form-control" name="count" value="1"></td>
              <td>{{ $product->sum }}</td>
              <td class="text-right">
                <form method="POST" action="/basket/{{ $product->id }}" accept-charset="UTF-8" class="btn-delete">
                  <input name="_method" type="hidden" value="DELETE">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-link btn-xs" onclick="return confirm('Удалить запись?')">
                    <img src="/img/close.png" >
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5"></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if ($products->count() > 0)
      <h4 class="text-right"><a href="/clear-cart">Очистить корзину?</a></h4>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Итого: <b>{{ $products->sum('price') }} ₸</b></p>
          <a href="/order" class="btn btn-primary text-uppercase">Оформить заказ</a>
        </div>
      </div>
    @endif
  </div>

@endsection