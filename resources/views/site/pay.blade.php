@extends('layout')

@section('content')

  <!-- Модальное окно -->
  @include('layouts.contact-us')

  <div class="container breadcrums">
    <ul>
      <li><a href="/">Главная</a></li>
      <li><a href="/basket">Корзина</a></li>
      <li><a href="#">Оформление заказа</a></li>
    </ul>
  </div>

  <div class="container">

    <div class="panel panel-default">
      <div class="panel-heading">Счет</div>
      <div class="panel-body">
        <form class="form-horizontal" name="SendOrder" method="post" action="https://epay.kkb.kz/jsp/process/logon.jsp">
          <input type="hidden" name="Signed_Order_B64" value="{{ $content }}">
          <input type="hidden" name="Language" value="rus"> <!-- язык формы оплаты rus/eng -->
          <input type="hidden" name="BackLink" value="http://jpi.kz/payment">
          <input type="hidden" name="PostLink" value="http://jpi.kz/postlink">

          <div class="table-responsive">
            <table class="table table-striped table-condensed">
              <thead>
                <tr class="active">
                  <td>Название</td>
                  <td>Цена</td>
                  <td>Количество</td>
                  <td>Сумма</td>
                </tr>
              </thead>
              <tbody>
                <?php $countProducts = unserialize($order->count); ?>
                @forelse ($order->products as $product)
                  <tr>
                    <td>
                      <img src="/img/products/{{ $product->path.'/'.$product->image }}" style="width:80px;height:80px;">
                      <a href="/catalog/{{ $product->category->slug.'/'.$product->slug }}">{{ $product->title }}</a>
                    </td>
                    <td>{{ $product->price }} тг</td>
                    <td style="width:100px;"><input type="number" class="form-control" min="1" max="1000" value="{{ $countProducts[$product->id] }}" disabled></td>
                    <td>
                      <?php echo $countProducts[$product->id] * $product->price; ?> тг
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

          <div class="col-md-offset-2 col-md-8">
            <h4>Данные:</h4>
            <table class="table">
              <tbody>
                <tr>
                  <td>ФИО:</td>
                  <td>{{ $order->name }}</td>
                </tr>
                <tr>
                  <td>Телефон:</td>
                  <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                  <td>E-mail:</td>
                  <td><input type="text" name="email" class="form-control" maxlength="50" value="{{ $order->email }}"></td>
                </tr>
                <tr>
                  <td>Адрес:</td>
                  <td>{{ $order->address }}</td>
                </tr>
                <tr>
                  <td>Итоговая цена:</td>
                  <td>{{ $order->amount }} тг.</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <label><input type="checkbox" required> Со счетом согласен (-а)</label>
                  </td>
                </tr>
              </tbody>
            </table>

            <p class="text-right">
              <input type="submit" name="GotoPay" class="btn btn-primary"  value="Да, перейти к оплате" >&nbsp;
            </p>
          </div>    
        </form>    
      </div>
    </div>
  </div>

@endsection
