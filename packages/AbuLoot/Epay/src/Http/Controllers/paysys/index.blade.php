@extends('layouts')

@section('tabs')

  <ul class="tabs-panel">


  </ul>

@endsection

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Пополнить счет</div>
    <div class="panel-body">

      @include('partials.alerts')

      <dl class="dl-horizontal">
        <dt>Фамилия и Имя:</dt>
        <dd>{{ $user->surname.' '.$user->name }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Аватар</dt>
        <dd>
          <div style="width: 200px; height: 200px;">
            @if(empty($user->profile->avatar))
              <img src="/img/user-default.jpg" class="img-responsive">
            @else
              <img src="/img/users/{{ $user->profile->id . '/' . $user->profile->avatar }}">
            @endif
          </div>
        </dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Email:</dt>
        <dd>{{ $user->email }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Город:</dt>
        <dd>{{ $user->profile->city->title }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Телефон</dt>
        <dd>{{ $user->phone }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Рост:</dt>
        <dd>{{ $user->profile->growth }} см.</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Вес:</dt>
        <dd>{{ $user->profile->weight }} кг.</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Дата рождения:</dt>
        <dd>{{ $user->profile->birthday }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Пол:</dt>
        <dd>{{ ($user->profile->sex == "woman") ? 'Женщина' : 'Мужчина' }}</dd>
      </dl>

      <div class="text-right">
        <a class="btn btn-primary" href="{{ route('profile.edit', $user->id) }}">Изменить</a>
      </div>
    </div>
  </div>

@endsection

@section('styles')
  <link href="/bower_components/jasny-bootstrap/dist/css/fileinput.min.css" rel="stylesheet">
  <link href="/css/jasny-bootstrap.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="/js/jasny-bootstrap.js"></script>
  <script src="/bower_components/jasny-bootstrap/js/fileinput.js"></script>
@endsection