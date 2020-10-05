@foreach($datas as $data)
<div class="card">
  <div id="messages">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="{{ route('profile', ['id' => $data->profile_id]) }}">Пользователь №: {{$data->profile_id}}</a></li>
      <li class="list-group-item">Заголовок сообщения: {{ $data->title }}</li>
      <li class="list-group-item">Текст сообщения: {{ $data->message }}</li>
      <li class="list-group-item">
        <div class="user_profile_mes_form">
          @foreach($data->replies as $reply)
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="{{ route('profile', ['id' => $reply->profile_id]) }}">Пользователь №: {{$reply->profile_id}}</a></li>
              <li class="list-group-item">Заголовок сообщения: {{ $reply->title }}</li>
              <li class="list-group-item">Текст сообщения: {{ $reply->message }}</li>
            </ul>
          </div>
          @endforeach
        </div>
    </ul>
  </div>
</div>
@endforeach
