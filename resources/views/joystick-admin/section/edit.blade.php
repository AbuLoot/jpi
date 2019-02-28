@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Редактирование</h2>

  @include('joystick-admin.partials.alerts')
  <p class="text-right">
    <a href="/admin/section" class="btn btn-primary btn-sm">Назад</a>
  </p>
  <form action="{{ route('section.update', $part->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="title">Заголовок сервиса</label>
      <input type="text" class="form-control" id="title" name="title" minlength="2" maxlength="80" value="{{ (old('title')) ? old('title') : $part->title }}" required>
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" minlength="2" maxlength="80" value="{{ (old('slug')) ? old('slug') : $part->slug }}">
    </div>
    <div class="form-group">
      <label for="sort_id">Номер</label>
      <input type="text" class="form-control" id="sort_id" name="sort_id" maxlength="5" value="{{ (old('sort_id')) ? old('sort_id') : $part->sort_id }}">
    </div>
    <?php $data_1 = unserialize($part->data_1); ?>
    <div class="form-group row">
      <div class="col-md-3">
        <label for="image">Выбрать картинку</label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">Выбрать</a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="data[filepath][]" value="{{ $data_1['filepath'] }}">
        </div>
      </div>
      <div class="col-md-1">
        <label for="image">Картинка</label>
        <div class="bg-info">
          <img id="holder" src="<?= (empty($data_1['filepath'])) ? '/img/no-image-mini.png' : $data_1['filepath'] ?>" style="max-height:34px;">
        </div>
      </div>
      <div class="col-md-3">
        <label for="data_1_key">Название</label>
        <input type="text" class="form-control" id="data_1_key" name="data[key][]" maxlength="255" value="{{ $data_1['key'] }}">
      </div>
      <div class="col-md-5">
        <label for="data_1_value">Значение - чтобы разделить значения используйте знак /</label>
        <input type="text" class="form-control" id="data_1_value" name="data[value][]" maxlength="255" value="{{ $data_1['value'] }}">
      </div>
    </div>
    <?php $data_2 = unserialize($part->data_2); ?>
    <div class="form-group row">
      <div class="col-md-3">
        <label for="image">Выбрать картинку</label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm-2" data-input="thumbnail-2" data-preview="holder-2" class="btn btn-default">Выбрать</a>
          </span>
          <input id="thumbnail-2" class="form-control" type="text" name="data[filepath][]" value="{{ $data_2['filepath'] }}">
        </div>
      </div>
      <div class="col-md-1">
        <label for="image">Картинка</label>
        <div class="bg-info">
          <img id="holder-2" src="<?= (empty($data_2['filepath'])) ? '/img/no-image-mini.png' : $data_2['filepath'] ?>" style="max-height:34px;">
        </div>
      </div>
      <div class="col-md-3">
        <label for="data_2_key">Название</label>
        <input type="text" class="form-control" id="data_2_key" name="data[key][]" maxlength="255" value="{{ $data_2['key'] }}">
      </div>
      <div class="col-md-5">
        <label for="data_2_value">Значение - чтобы разделить значения используйте знак /</label>
        <input type="text" class="form-control" id="data_2_value" name="data[value][]" maxlength="255" value="{{ $data_2['value'] }}">
      </div>
    </div>
    <?php $data_3 = unserialize($part->data_3); ?>
    <div class="form-group row">
      <div class="col-md-3">
        <label for="image">Выбрать картинку</label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm-3" data-input="thumbnail-3" data-preview="holder-3" class="btn btn-default">Выбрать</a>
          </span>
          <input id="thumbnail-3" class="form-control" type="text" name="data[filepath][]" value="{{ $data_3['filepath'] }}">
        </div>
      </div>
      <div class="col-md-1">
        <label for="image">Картинка</label>
        <div class="bg-info">
          <img id="holder-3" src="<?= (empty($data_3['filepath'])) ? '/img/no-image-mini.png' : $data_3['filepath'] ?>" style="max-height:34px;">
        </div>
      </div>
      <div class="col-md-3">
        <label for="data_3_key">Название</label>
        <input type="text" class="form-control" id="data_3_key" name="data[key][]" maxlength="255" value="{{ $data_3['key'] }}">
      </div>
      <div class="col-md-5">
        <label for="data_3_value">Значение - чтобы разделить значения используйте знак /</label>
        <input type="text" class="form-control" id="data_3_value" name="data[value][]" maxlength="255" value="{{ $data_3['value'] }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content">Текст</label>
      <textarea class="form-control" id="content" name="content" rows="5" maxlength="2000">{{ (old('content')) ? old('content') : '' }}</textarea>
    </div>
    <div class="form-group">
      <label for="lang">Язык</label>
      <select id="lang" name="lang" class="form-control" required>
        <option value=""></option>
        @foreach($languages as $language)
          @if ($part->lang == $language->slug)
            <option value="{{ $language->slug }}" selected>{{ $language->title }}</option>
          @else
            <option value="{{ $language->slug }}">{{ $language->title }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="status">Статус</label>
      <label>
        @if ($part->status == 1)
          <input type="checkbox" id="status" name="status" checked> Активен
        @else
          <input type="checkbox" id="status" name="status"> Активен
        @endif
      </label>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
  </form>
@endsection

@section('scripts')
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script src='/vendor/laravel-filemanager/js/lfm.js'></script>
  <script>
    /*tinymce.init({
      selector: 'textarea',
      height: 300,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'code undo redo | table insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      // content_css: '//www.tinymce.com/css/codepen.min.css'

    });*/
  </script>
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea",
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'code undo redo | table insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.9,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
    $('#lfm').filemanager('image');
    $('#lfm-2').filemanager('image');
    $('#lfm-3').filemanager('image');
  </script>
@endsection