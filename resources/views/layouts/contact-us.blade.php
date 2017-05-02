
  @if (session('alert'))
    <div class="container">
      <div class="alert {{ session('alert') }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('message') }}
      </div>
    </div>
  @endif

  <div class="modal">
    <h2>Написать нам</h2>
    <form action="/send-app" method="post" class="modal-form">
      {{ csrf_field() }}
      <a href="#" class="close-modal"></a>
      <div class="modal-form-1">
        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
          <input type="text" placeholder="Имя *" name="name" id="name" value="{{ old('name') }}" minlength="2" maxlength="40" required>
          @if ($errors->has('name'))
            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="{{ $errors->has('phone') ? ' has-error' : '' }}">
          <input type="tel" placeholder="Телефона *" name="phone" id="phone" value="{{ old('phone') }}" minlength="5" maxlength="20" required>
          @if ($errors->has('phone'))
            <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
          @endif
        </div>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" placeholder="Email *" name="email" id="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
      </div>
      <div class="modal-form-2">
        <textarea rows="8" placeholder="Сообщение" name="message" required="required"></textarea>
        <input type="submit" value="Отправить">
      </div>
    </form>
  </div>
  <a href="#" class="modal-btn">Написать нам</a>
