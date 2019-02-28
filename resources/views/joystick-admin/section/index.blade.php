@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Разделы</h2>

  @include('joystick-admin.partials.alerts')
  <p class="text-right">
    <a href="/admin/section/create" class="btn btn-success btn-sm">Добавить</a>
  </p>
  <div class="table-responsive">
    <table class="table-admin table table-striped table-condensed">
      <thead>
        <tr class="active">
          <th>№</th>
          <th>Название</th>
          <th>Картинка</th>
          <th>Номер</th>
          <th>Статус</th>
          <th class="text-right">Функции</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @forelse ($section as $part)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $part->title }}</td>
            <td>{{ $part->title_description }}</td>
            <td>{{ $part->sort_id }}</td>
            @if ($part->status == 1)
              <td class="text-success">Активен</td>
            @else
              <td class="text-danger">Неактивен</td>
            @endif
            <td class="text-right text-nowrap">
              <a class="btn btn-link btn-xs" href="{{ route('section.edit', $part->id) }}" title="Редактировать"><i class="material-icons md-18">mode_edit</i></a>
              <form class="btn-delete" method="POST" action="{{ route('section.destroy', $part->id) }}" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="DELETE">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-link btn-xs" onclick="return confirm('Удалить запись?')"><i class="material-icons md-18">clear</i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6">Нет записи</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection