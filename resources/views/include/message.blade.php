@foreach($datas as $data)
<div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="{{ route('profile', ['id' => $data->profile_id]) }}">Пользователь №: {{$data->profile_id}}</a></li>
      <li class="list-group-item">Заголовок сообщения: {{ $data->title }}</li>
      <li class="list-group-item">Текст сообщения: {{ $data->message }}</li>
      @if(Auth::user()->id == $user)
      <form method="post" action="{{ route('delete') }}">
        @csrf
        <input type="number" class="d-none" name="messageId" id="{{ $data->id }}" value="{{ $data->id }}">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Удалить комментарий</button>
        </div>
      </form>
      @elseif(Auth::user()->id == $data->profile_id)
      <form method="post" action="{{ route('delete') }}">
        @csrf
        <input type="number" class="d-none" name="messageId" id="{{ $data->id }}" value="{{ $data->id }}">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Удалить комментарий</button>
        </div>
      </form>
      @endif
      <li class="list-group-item">
        <div class="user_profile_mes_form">
          @foreach($data->replies as $reply)
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="{{ route('profile', ['id' => $reply->profile_id]) }}">Пользователь №: {{$reply->profile_id}}</a></li>
              <li class="list-group-item">Заголовок сообщения: {{ $reply->title }}</li>
              <li class="list-group-item">Текст сообщения: {{ $reply->message }}</li>
              @if(Auth::user()->id == $user)
              <form method="post" action="{{ route('delete') }}">
              @csrf
                <input type="number" class="d-none" name="messageId" id="{{ $reply->id }}" value="{{ $reply->id }}">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Удалить комментарий</button>
                </div>
              </form>
              @endif
            </ul>
          </div>
          @endforeach
        </div>
      </li>
    </ul>
    @if(Auth::user())
    <form method="post" action="{{ route('reply', ['messageId' => $data->id]) }}">
      @csrf
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Заголовок сообщения</label>
          <div class="col-sm-10">
            <input name="reply-{{ $data->id }}" type="text" class="form-control{{ $errors->has("reply-{$data->id}") ? ' is-invalid' : '' }}" placeholder="Заголовок сообщения">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Текст сообщения</label>
          <div class="col-sm-10">
            <input name="message" type="text" class="form-control" id="inputPassword3" placeholder="Текст сообщения" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Ответить</button>
          </div>
        </div>
      </form>
  @endif
</div><br>
@endforeach
